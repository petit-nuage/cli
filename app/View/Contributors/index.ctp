<div class="contributors index">
	<h2><?php echo __('Contributors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('open_id'); ?></th>
			<th><?php echo $this->Paginator->sort('keys'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contributors as $contributor): ?>
	<tr>
		<td><?php echo h($contributor['Contributor']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contributor['Group']['name'], array('controller' => 'groups', 'action' => 'view', $contributor['Group']['id'])); ?>
		</td>
		<td><?php echo h($contributor['Contributor']['username']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['email']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['password']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['open_id']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['keys']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['created']); ?>&nbsp;</td>
		<td><?php echo h($contributor['Contributor']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contributor['Contributor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contributor['Contributor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contributor['Contributor']['id']), null, __('Are you sure you want to delete # %s?', $contributor['Contributor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contributor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
