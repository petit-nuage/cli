<div class="milestones form">
<?php echo $this->Form->create('Milestone'); ?>
	<fieldset>
		<legend><?php echo __('Edit Milestone'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('name');
		echo $this->Form->input('completion');
		echo $this->Form->input('points');
		echo $this->Form->input('started');
		echo $this->Form->input('finish');
		echo $this->Form->input('due');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Milestone.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Milestone.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
