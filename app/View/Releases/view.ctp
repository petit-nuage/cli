<div class="releases view">
<h2><?php  echo __('Release'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($release['Release']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($release['Project']['name'], array('controller' => 'projects', 'action' => 'view', $release['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($release['Release']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($release['Release']['points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($release['Release']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($release['Release']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contributors'); ?></dt>
		<dd>
			<?php echo h($release['Release']['contributors']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($release['Release']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($release['Release']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($release['Release']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finished'); ?></dt>
		<dd>
			<?php echo h($release['Release']['finished']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Release'), array('action' => 'edit', $release['Release']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Release'), array('action' => 'delete', $release['Release']['id']), null, __('Are you sure you want to delete # %s?', $release['Release']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Releases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Release'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
