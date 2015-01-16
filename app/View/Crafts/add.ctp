<?php echo $this->Form->create('Image',array('type'=>'file','enctype' => 'multipart/form-data'));?>
<?php echo $this->Form->input('image', array('label' => false, 'type' => 'file', 'multiple')); ?>
<?php echo $this->Form->submit('登録する', array('name' => 'submit'));?>
<?php echo $this->Form->end();?>
