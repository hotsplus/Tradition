<?php
class CraftsController extends AppController{

  var $uses = array('Craft','Image','Detail');

  public function index(){
    $data = $this->Image->find('all');
    $this->set('data', $data);
  }

  public function add(){
    $limit = 1024 * 1024 * 1024;

    if($this->request->is('post') || $this->request->is('put')){
      if($this->request->data['Image']['image']['size'] > $limit){
        $this->Session->setFlash('10MB以内の画像が登録できます。');
        $this->redirect('index');
      }

/*
    if(!is_uploaded_file($this->request->data['Image']['image']['tmp_name'])){
      $this->Session->setFlash('アップロードされた画像ではありません。');
      $this->redirect('index');
    }
*/

    switch($this->request->data['Image']['image']['type']){

      // jpegの場合
      case'image/jpeg':
      $extention = '.jpeg';
      break;

      // jpgの場合
      case'image/jpg':
      $extention = '.jpg';
      break;

      // gifの場合
      case'image/gif':
      $extention = '.gif';
      break;

      // pngの場合
      case'image/png':
      $extention = '.png';
      break;

      // bmpの場合
      case'image/bmp':
      $extention = '.bmp';
      break;

      // 上記のファイル以外
      default:

      // メッセージの表示
      $this->Session->setFlash(
        '以下の画像を選択してください(jpg,gif,png,bmp)',
        'default',
        array('class'=>'alert alert-danger')
      );

      // リダイレクト処理
      $this->redirect(array('action'=>'index'));
      break;
    }

    $fileName = IMAGES.'Crafts'.DS.$this->request->data['Image']['image']['name'];

    move_uploaded_file($this->request->data['Image']['image']['tmp_name'], $fileName);

    $image = array(
      'Image' => array(
        'filename' => $this->request->data['Image']['image']['name'],
        'image' => $fileName,
      ),
      'Detail' => array(
        'content' => $this->request->data['Detail']['content'],
      )
    );

    if($this->Image->saveAll($image)){
      $this->Session->setFlash('画像をアップロードしました。');
      $this->redirect('index');
    } else {
      $this->Session->setFlash('画像をアップロードできませんでした。');
    }
  }
  }

  public function view($id = null){
    $data = $this->Image->find('first',array('conditions' => array('image.id' => $id)));
    $this->set('data',$data);
  }

}
