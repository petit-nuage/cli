<div class="buildItems form">
<?php echo $this->Form->create('BuildItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Build Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('build_id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('status');
		echo $this->Form->input('uuid');
		echo $this->Form->input('path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BuildItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BuildItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Build Items'), array('action' => 'index')); ?></li>
	</ul>
</div>
