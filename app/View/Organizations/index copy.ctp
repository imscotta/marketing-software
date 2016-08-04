<div class="organizations index">
	<h2><?php echo __('Organizations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('lead_status'); ?></th>
			<th><?php echo $this->Paginator->sort('timeframe'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($organizations as $organization): ?>
	<tr>
		<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organization['User']['name'], array('controller' => 'users', 'action' => 'view', $organization['User']['id'])); ?>
		</td>
		<td><?php echo h($organization['Organization']['street']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['street_2']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['city']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['zip']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['state']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['email']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['phone']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['notes']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['lead_status']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['timeframe']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organization['Organization']['id']), array(), __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interactions'), array('controller' => 'interactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interaction'), array('controller' => 'interactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proposals'), array('controller' => 'proposals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proposal'), array('controller' => 'proposals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
