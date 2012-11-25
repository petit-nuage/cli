<div class="projects view">
<h2><?php  echo __('Project'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($project['Project']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($project['Project']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($project['Project']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($project['Project']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Origin'); ?></dt>
		<dd>
			<?php echo h($project['Project']['origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prod'); ?></dt>
		<dd>
			<?php echo h($project['Project']['prod']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preprod'); ?></dt>
		<dd>
			<?php echo h($project['Project']['preprod']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feature'); ?></dt>
		<dd>
			<?php echo h($project['Project']['feature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Release'); ?></dt>
		<dd>
			<?php echo h($project['Project']['release']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotfix'); ?></dt>
		<dd>
			<?php echo h($project['Project']['hotfix']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($project['Project']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($project['Project']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($project['Project']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archived'); ?></dt>
		<dd>
			<?php echo h($project['Project']['archived']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotfixes'), array('controller' => 'hotfixes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotfix'), array('controller' => 'hotfixes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Releases'), array('controller' => 'releases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Release'), array('controller' => 'releases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Features'); ?></h3>
	<?php if (!empty($project['Feature'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Contributors'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Started'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Feature'] as $feature): ?>
		<tr>
			<td><?php echo $feature['id']; ?></td>
			<td><?php echo $feature['project_id']; ?></td>
			<td><?php echo $feature['status']; ?></td>
			<td><?php echo $feature['points']; ?></td>
			<td><?php echo $feature['name']; ?></td>
			<td><?php echo $feature['description']; ?></td>
			<td><?php echo $feature['contributors']; ?></td>
			<td><?php echo $feature['created']; ?></td>
			<td><?php echo $feature['modified']; ?></td>
			<td><?php echo $feature['started']; ?></td>
			<td><?php echo $feature['finished']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'features', 'action' => 'view', $feature['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'features', 'action' => 'edit', $feature['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'features', 'action' => 'delete', $feature['id']), null, __('Are you sure you want to delete # %s?', $feature['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotfixes'); ?></h3>
	<?php if (!empty($project['Hotfix'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Contributors'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Started'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Hotfix'] as $hotfix): ?>
		<tr>
			<td><?php echo $hotfix['id']; ?></td>
			<td><?php echo $hotfix['project_id']; ?></td>
			<td><?php echo $hotfix['status']; ?></td>
			<td><?php echo $hotfix['points']; ?></td>
			<td><?php echo $hotfix['name']; ?></td>
			<td><?php echo $hotfix['description']; ?></td>
			<td><?php echo $hotfix['contributors']; ?></td>
			<td><?php echo $hotfix['created']; ?></td>
			<td><?php echo $hotfix['modified']; ?></td>
			<td><?php echo $hotfix['started']; ?></td>
			<td><?php echo $hotfix['finished']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotfixes', 'action' => 'view', $hotfix['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotfixes', 'action' => 'edit', $hotfix['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotfixes', 'action' => 'delete', $hotfix['id']), null, __('Are you sure you want to delete # %s?', $hotfix['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotfix'), array('controller' => 'hotfixes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Milestones'); ?></h3>
	<?php if (!empty($project['Milestone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Completion'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Started'); ?></th>
		<th><?php echo __('Finish'); ?></th>
		<th><?php echo __('Due'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Milestone'] as $milestone): ?>
		<tr>
			<td><?php echo $milestone['id']; ?></td>
			<td><?php echo $milestone['project_id']; ?></td>
			<td><?php echo $milestone['name']; ?></td>
			<td><?php echo $milestone['completion']; ?></td>
			<td><?php echo $milestone['points']; ?></td>
			<td><?php echo $milestone['created']; ?></td>
			<td><?php echo $milestone['modified']; ?></td>
			<td><?php echo $milestone['started']; ?></td>
			<td><?php echo $milestone['finish']; ?></td>
			<td><?php echo $milestone['due']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'milestones', 'action' => 'view', $milestone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'milestones', 'action' => 'edit', $milestone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'milestones', 'action' => 'delete', $milestone['id']), null, __('Are you sure you want to delete # %s?', $milestone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pages'); ?></h3>
	<?php if (!empty($project['Page'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Visible'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Version'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Page'] as $page): ?>
		<tr>
			<td><?php echo $page['id']; ?></td>
			<td><?php echo $page['project_id']; ?></td>
			<td><?php echo $page['visible']; ?></td>
			<td><?php echo $page['title']; ?></td>
			<td><?php echo $page['slug']; ?></td>
			<td><?php echo $page['version']; ?></td>
			<td><?php echo $page['content']; ?></td>
			<td><?php echo $page['created']; ?></td>
			<td><?php echo $page['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pages', 'action' => 'view', $page['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pages', 'action' => 'edit', $page['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pages', 'action' => 'delete', $page['id']), null, __('Are you sure you want to delete # %s?', $page['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Releases'); ?></h3>
	<?php if (!empty($project['Release'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Contributors'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Started'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Release'] as $release): ?>
		<tr>
			<td><?php echo $release['id']; ?></td>
			<td><?php echo $release['project_id']; ?></td>
			<td><?php echo $release['status']; ?></td>
			<td><?php echo $release['points']; ?></td>
			<td><?php echo $release['name']; ?></td>
			<td><?php echo $release['description']; ?></td>
			<td><?php echo $release['contributors']; ?></td>
			<td><?php echo $release['created']; ?></td>
			<td><?php echo $release['modified']; ?></td>
			<td><?php echo $release['started']; ?></td>
			<td><?php echo $release['finished']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'releases', 'action' => 'view', $release['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'releases', 'action' => 'edit', $release['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'releases', 'action' => 'delete', $release['id']), null, __('Are you sure you want to delete # %s?', $release['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Release'), array('controller' => 'releases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
