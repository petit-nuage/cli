<div class="hotfixes view">
<h2><?php  echo __('Hotfix'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotfix['Project']['name'], array('controller' => 'projects', 'action' => 'view', $hotfix['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contributors'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['contributors']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finished'); ?></dt>
		<dd>
			<?php echo h($hotfix['Hotfix']['finished']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotfix'), array('action' => 'edit', $hotfix['Hotfix']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotfix'), array('action' => 'delete', $hotfix['Hotfix']['id']), null, __('Are you sure you want to delete # %s?', $hotfix['Hotfix']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotfixes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotfix'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
