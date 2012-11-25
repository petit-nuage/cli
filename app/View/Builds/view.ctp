<div class="builds view">
<h2><?php  echo __('Build'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($build['Build']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Id'); ?></dt>
		<dd>
			<?php echo h($build['Build']['type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Build Commands'); ?></dt>
		<dd>
			<?php echo h($build['Build']['build_commands']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($build['Build']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($build['Build']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Build'), array('action' => 'edit', $build['Build']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Build'), array('action' => 'delete', $build['Build']['id']), null, __('Are you sure you want to delete # %s?', $build['Build']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Builds'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Build Items'), array('controller' => 'build_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Item'), array('controller' => 'build_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Build Items'); ?></h3>
	<?php if (!empty($build['BuildItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Build Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Uuid'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($build['BuildItem'] as $buildItem): ?>
		<tr>
			<td><?php echo $buildItem['id']; ?></td>
			<td><?php echo $buildItem['build_id']; ?></td>
			<td><?php echo $buildItem['type_id']; ?></td>
			<td><?php echo $buildItem['parent_id']; ?></td>
			<td><?php echo $buildItem['status']; ?></td>
			<td><?php echo $buildItem['uuid']; ?></td>
			<td><?php echo $buildItem['path']; ?></td>
			<td><?php echo $buildItem['created']; ?></td>
			<td><?php echo $buildItem['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'build_items', 'action' => 'view', $buildItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'build_items', 'action' => 'edit', $buildItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'build_items', 'action' => 'delete', $buildItem['id']), null, __('Are you sure you want to delete # %s?', $buildItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Build Item'), array('controller' => 'build_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
