<div class="buildItems view">
<h2><?php  echo __('Build Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Build Id'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['build_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Id'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uuid'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['uuid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($buildItem['BuildItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Build Item'), array('action' => 'edit', $buildItem['BuildItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Build Item'), array('action' => 'delete', $buildItem['BuildItem']['id']), null, __('Are you sure you want to delete # %s?', $buildItem['BuildItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Build Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Item'), array('action' => 'add')); ?> </li>
	</ul>
</div>
