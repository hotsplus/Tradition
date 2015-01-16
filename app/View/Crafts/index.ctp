<?php foreach ($data as $key => $val): ?>
<?php echo $this->Html->image('Crafts/'.$val['Image']['filename'],array(
  "url" => array(
    'controller' => 'crafts', 'action' => 'view',$val['Image']['id'])
  ));?>
<?php endforeach; ?>
