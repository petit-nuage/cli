<div class="buildItems index">
	<h2><?php echo __('Build Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('build_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('uuid'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($buildItems as $buildItem): ?>
	<tr>
		<td><?php echo h($buildItem['BuildItem']['id']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['build_id']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['type_id']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['status']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['uuid']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['path']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['created']); ?>&nbsp;</td>
		<td><?php echo h($buildItem['BuildItem']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $buildItem['BuildItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $buildItem['BuildItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $buildItem['BuildItem']['id']), null, __('Are you sure you want to delete # %s?', $buildItem['BuildItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Build Item'), array('action' => 'add')); ?></li>
	</ul>
</div>
