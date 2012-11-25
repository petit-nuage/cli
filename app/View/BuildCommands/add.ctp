<div class="buildCommands form">
<?php echo $this->Form->create('BuildCommand'); ?>
	<fieldset>
		<legend><?php echo __('Add Build Command'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('command');
		echo $this->Form->input('active');
		echo $this->Form->input('available');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Build Commands'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type Id'), array('controller' => 'types', 'action' => 'add')); ?> </li>
	</ul>
</div>
