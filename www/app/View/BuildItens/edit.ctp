<div class="buildItens form">
<?php echo $this->Form->create('BuildIten'); ?>
	<fieldset>
		<legend><?php echo __('Edit Build Iten'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BuildIten.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BuildIten.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Build Itens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Builds'), array('controller' => 'builds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build'), array('controller' => 'builds', 'action' => 'add')); ?> </li>
	</ul>
</div>
