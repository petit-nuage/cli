<div class="buildItens view">
<h2><?php  echo __('Build Iten'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Build'); ?></dt>
		<dd>
			<?php echo $this->Html->link($buildIten['Build']['id'], array('controller' => 'builds', 'action' => 'view', $buildIten['Build']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Id'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uuid'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['uuid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($buildIten['BuildIten']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Build Iten'), array('action' => 'edit', $buildIten['BuildIten']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Build Iten'), array('action' => 'delete', $buildIten['BuildIten']['id']), null, __('Are you sure you want to delete # %s?', $buildIten['BuildIten']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Build Itens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build Iten'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Builds'), array('controller' => 'builds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Build'), array('controller' => 'builds', 'action' => 'add')); ?> </li>
	</ul>
</div>
