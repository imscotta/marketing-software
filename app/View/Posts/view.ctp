<div class="posts view">
<h2><?php echo __('Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['Organization']['id'], array('controller' => 'organizations', 'action' => 'view', $post['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($post['Post']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($post['Activity'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Organization Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['organization_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Contact Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['contact_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Interaction Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['interaction_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Task Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['task_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Post Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['post_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Comment Id'); ?></dt>
		<dd>
	<?php echo $post['Activity']['comment_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Object Type'); ?></dt>
		<dd>
	<?php echo $post['Activity']['object_type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Method'); ?></dt>
		<dd>
	<?php echo $post['Activity']['method']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $post['Activity']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $post['Activity']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Activity'), array('controller' => 'activities', 'action' => 'edit', $post['Activity']['id'])); ?></li>
			</ul>
		</div>
	</div>
	