<div class="builds form">
<?php echo $this->Form->create('Build'); ?>
	<fieldset>
		<legend><?php echo __('Add Build'); ?></legend>
	<?php
		echo $this->Form->input('type_id');
		echo $this->Form->input('build_commands');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Builds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Build Items'), array('controller' => 'build_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Item'), array('controller' => 'build_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
