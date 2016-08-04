<div class="organizations view">
<h2><?php echo __('Organization'); ?></h2>
<?php debug($organization); ?>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['User']['name'], array('controller' => 'users', 'action' => 'view', $organization['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street 2'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['street_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lead Status'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['lead_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timeframe'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['timeframe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), array(), __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($organization['Activity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Contact Id'); ?></th>
		<th><?php echo __('Interaction Id'); ?></th>
		<th><?php echo __('Task Id'); ?></th>
		<th><?php echo __('Post Id'); ?></th>
		<th><?php echo __('Comment Id'); ?></th>
		<th><?php echo __('Object Type'); ?></th>
		<th><?php echo __('Method'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Activity'] as $activity): ?>
		<tr>
			<td><?php echo $activity['id']; ?></td>
			<td><?php echo $activity['user_id']; ?></td>
			<td><?php echo $activity['organization_id']; ?></td>
			<td><?php echo $activity['contact_id']; ?></td>
			<td><?php echo $activity['interaction_id']; ?></td>
			<td><?php echo $activity['task_id']; ?></td>
			<td><?php echo $activity['post_id']; ?></td>
			<td><?php echo $activity['comment_id']; ?></td>
			<td><?php echo $activity['object_type']; ?></td>
			<td><?php echo $activity['method']; ?></td>
			<td><?php echo $activity['created']; ?></td>
			<td><?php echo $activity['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'activities', 'action' => 'view', $activity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'activities', 'action' => 'edit', $activity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'activities', 'action' => 'delete', $activity['id']), array(), __('Are you sure you want to delete # %s?', $activity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>


	<div class="related">
	<h3><?php echo __('Related Contacts'); ?></h3>
	<?php if (!empty($organization['Contact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Contact'] as $contact): ?>
		<tr>
			<td><?php echo $contact['id']; ?></td>
			<td><?php echo $contact['organization_id']; ?></td>
			<td><?php echo $contact['first_name']; ?></td>
			<td><?php echo $contact['last_name']; ?></td>
			<td><?php echo $contact['title']; ?></td>
			<td><?php echo $contact['email']; ?></td>
			<td><?php echo $contact['phone']; ?></td>
			<td><?php echo $contact['city']; ?></td>
			<td><?php echo $contact['description']; ?></td>
			<td><?php echo $contact['notes']; ?></td>
			<td><?php echo $contact['created']; ?></td>
			<td><?php echo $contact['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contacts', 'action' => 'edit', $contact['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contacts', 'action' => 'delete', $contact['id']), array(), __('Are you sure you want to delete # %s?', $contact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Interactions'); ?></h3>
	<?php if (!empty($organization['Interaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Contact Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Interaction'] as $interaction): ?>
		<tr>
			<td><?php echo $interaction['id']; ?></td>
			<td><?php echo $interaction['user_id']; ?></td>
			<td><?php echo $interaction['organization_id']; ?></td>
			<td><?php echo $interaction['contact_id']; ?></td>
			<td><?php echo $interaction['type']; ?></td>
			<td><?php echo $interaction['notes']; ?></td>
			<td><?php echo $interaction['created']; ?></td>
			<td><?php echo $interaction['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'interactions', 'action' => 'view', $interaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'interactions', 'action' => 'edit', $interaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'interactions', 'action' => 'delete', $interaction['id']), array(), __('Are you sure you want to delete # %s?', $interaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Interaction'), array('controller' => 'interactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($organization['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td><?php echo $post['organization_id']; ?></td>
			<td><?php echo $post['comment']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array(), __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Proposals'); ?></h3>
	<?php if (!empty($organization['Proposal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Interested Components'); ?></th>
		<th><?php echo __('Timeframe'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Proposal'] as $proposal): ?>
		<tr>
			<td><?php echo $proposal['id']; ?></td>
			<td><?php echo $proposal['user_id']; ?></td>
			<td><?php echo $proposal['organization_id']; ?></td>
			<td><?php echo $proposal['name']; ?></td>
			<td><?php echo $proposal['description']; ?></td>
			<td><?php echo $proposal['interested_components']; ?></td>
			<td><?php echo $proposal['timeframe']; ?></td>
			<td><?php echo $proposal['created']; ?></td>
			<td><?php echo $proposal['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proposals', 'action' => 'view', $proposal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proposals', 'action' => 'edit', $proposal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proposals', 'action' => 'delete', $proposal['id']), array(), __('Are you sure you want to delete # %s?', $proposal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proposal'), array('controller' => 'proposals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($organization['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Contact Id'); ?></th>
		<th><?php echo __('Interaction Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Priority'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Eta'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['user_id']; ?></td>
			<td><?php echo $task['organization_id']; ?></td>
			<td><?php echo $task['contact_id']; ?></td>
			<td><?php echo $task['interaction_id']; ?></td>
			<td><?php echo $task['name']; ?></td>
			<td><?php echo $task['priority']; ?></td>
			<td><?php echo $task['type']; ?></td>
			<td><?php echo $task['notes']; ?></td>
			<td><?php echo $task['eta']; ?></td>
			<td><?php echo $task['created']; ?></td>
			<td><?php echo $task['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
