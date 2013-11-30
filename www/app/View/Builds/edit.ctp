<div class="builds form">
<?php echo $this->Form->create('Build'); ?>
	<fieldset>
		<legend><?php echo __('Edit Build'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('build_commands');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Build.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Build.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Builds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Build Items'), array('controller' => 'build_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Item'), array('controller' => 'build_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
