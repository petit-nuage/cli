<div class="buildCommands view">
<h2><?php  echo __('Build Command'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Command'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['command']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Available'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['available']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($buildCommand['BuildCommand']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Build Command'), array('action' => 'edit', $buildCommand['BuildCommand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Build Command'), array('action' => 'delete', $buildCommand['BuildCommand']['id']), null, __('Are you sure you want to delete # %s?', $buildCommand['BuildCommand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Build Commands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Command'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type Id'), array('controller' => 'types', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Types'); ?></h3>
	<?php if (!empty($buildCommand['type_id'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $buildCommand['type_id']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $buildCommand['type_id']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $buildCommand['type_id']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $buildCommand['type_id']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Type Id'), array('controller' => 'types', 'action' => 'edit', $buildCommand['type_id']['id'])); ?></li>
			</ul>
		</div>
	</div>
	