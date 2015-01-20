<?php foreach ($data as $key => $val): ?>

<div class="row">
  <div class="span6">
    <ul class="thumbnails">
    <li class="span3">
        <div class="thumbnail">
          <?php echo $this->Html->image('Crafts/'.$val['Image']['filename'],array(
            "url" => array(
              'controller' => 'crafts', 'action' => 'view',$val['Image']['id'])
            ));
            ?>
          <div class="caption">
            <h5>Test</h5>
            <p>Value</p>
          </div>
        </div>
      </li>
      <div class="span6">
      </div>
    </div>
  </div>

<?php endforeach; ?>

<!--
<?php echo $this->Html->image('Crafts/kaga.jpg'); ?>
<?php foreach ($data as $key => $val): ?>

<div class="well">
<?php echo $this->Html->image('Crafts/'.$val['Image']['filename'],array(
  "url" => array(
    'controller' => 'crafts', 'action' => 'view',$val['Image']['id'])
  ));
?>
<button type="button" class="btn btn-info">View</button>
</div>

<?php endforeach; ?>

-->
