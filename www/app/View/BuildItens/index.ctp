<div class="buildItens index">
	<h2><?php echo __('Build Itens'); ?></h2>
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
	foreach ($buildItens as $buildIten): ?>
	<tr>
		<td><?php echo h($buildIten['BuildIten']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($buildIten['Build']['id'], array('controller' => 'builds', 'action' => 'view', $buildIten['Build']['id'])); ?>
		</td>
		<td><?php echo h($buildIten['BuildIten']['type_id']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['status']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['uuid']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['path']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['created']); ?>&nbsp;</td>
		<td><?php echo h($buildIten['BuildIten']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $buildIten['BuildIten']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $buildIten['BuildIten']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $buildIten['BuildIten']['id']), null, __('Are you sure you want to delete # %s?', $buildIten['BuildIten']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Build Iten'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Builds'), array('controller' => 'builds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build'), array('controller' => 'builds', 'action' => 'add')); ?> </li>
	</ul>
</div>
