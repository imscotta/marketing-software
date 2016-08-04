<div class="activities index">
	<h2><?php echo __('Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_id'); ?></th>
			<th><?php echo $this->Paginator->sort('interaction_id'); ?></th>
			<th><?php echo $this->Paginator->sort('task_id'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('object_type'); ?></th>
			<th><?php echo $this->Paginator->sort('method'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($activities as $activity): ?>
	<tr>
		<td><?php echo h($activity['Activity']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Organization']['id'], array('controller' => 'organizations', 'action' => 'view', $activity['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Contact']['title'], array('controller' => 'contacts', 'action' => 'view', $activity['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Interaction']['id'], array('controller' => 'interactions', 'action' => 'view', $activity['Interaction']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $activity['Task']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Post']['id'], array('controller' => 'posts', 'action' => 'view', $activity['Post']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Comment']['id'], array('controller' => 'comments', 'action' => 'view', $activity['Comment']['id'])); ?>
		</td>
		<td><?php echo h($activity['Activity']['object_type']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['method']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['created']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $activity['Activity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interactions'), array('controller' => 'interactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interaction'), array('controller' => 'interactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
