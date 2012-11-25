<div class="hotfixes index">
	<h2><?php echo __('Hotfixes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('points'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('contributors'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('started'); ?></th>
			<th><?php echo $this->Paginator->sort('finished'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($hotfixes as $hotfix): ?>
	<tr>
		<td><?php echo h($hotfix['Hotfix']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotfix['Project']['name'], array('controller' => 'projects', 'action' => 'view', $hotfix['Project']['id'])); ?>
		</td>
		<td><?php echo h($hotfix['Hotfix']['status']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['points']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['name']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['description']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['contributors']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['created']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['modified']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['started']); ?>&nbsp;</td>
		<td><?php echo h($hotfix['Hotfix']['finished']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hotfix['Hotfix']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hotfix['Hotfix']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hotfix['Hotfix']['id']), null, __('Are you sure you want to delete # %s?', $hotfix['Hotfix']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hotfix'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
