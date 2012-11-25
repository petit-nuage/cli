<div class="contributors view">
<h2><?php  echo __('Contributor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contributor['Group']['name'], array('controller' => 'groups', 'action' => 'view', $contributor['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open Id'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['open_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keys'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['keys']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contributor['Contributor']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contributor'), array('action' => 'edit', $contributor['Contributor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contributor'), array('action' => 'delete', $contributor['Contributor']['id']), null, __('Are you sure you want to delete # %s?', $contributor['Contributor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contributors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contributor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
