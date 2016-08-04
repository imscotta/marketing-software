<div class="contacts view">
<h2><?php echo __('Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contact['Organization']['id'], array('controller' => 'organizations', 'action' => 'view', $contact['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), array(), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interactions'), array('controller' => 'interactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interaction'), array('controller' => 'interactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($contact['Activity'])): ?>
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
	<?php foreach ($contact['Activity'] as $activity): ?>
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
	<h3><?php echo __('Related Interactions'); ?></h3>
	<?php if (!empty($contact['Interaction'])): ?>
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
	<?php foreach ($contact['Interaction'] as $interaction): ?>
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





<!--
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
</div>-->





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dankboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-leaf fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Total Customers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Proposals!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Interactions!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Outstanding Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bullhorn fa-fw"></i> News Feed
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div class="timeline">




<!--<div class="activities index">
	<h2><?php echo __('Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'created', array('direction' => 'desc')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($activities as $activity): ?>
	<tr>
		<?php if ($activity['Activity']['method'] == 'create') {
			$verb = 'created';

		} elseif ($activity['Activity']['method'] == 'edit') {
			$verb = 'edited';

		 } ?>
		<td>

		<?php if ($activity['Activity']['object_type'] == 'Organization') { 

		//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' an ' . $activity['Activity']['object_type'] . ' named ' . $activity['Organization']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'organizations', 'action' => 'view', $activity['Organization']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Contact') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$contactFull = ($activity['Contact']['first_name'] . ' ' . $activity['Contact']['last_name']);
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' named "' . $contactFull  . '"');
				
				echo $this->Html->link($activityText, array('controller' => 'contacts', 'action' => 'view', $activity['Contact']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Interaction') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Interaction']['type'] . ' ' . $activity['Activity']['object_type'] . ' with ' . $activity['Organization']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'interactions', 'action' => 'view', $activity['Interaction']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Post') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' "' . $activity['Post']['comment'] . '"');
				
				echo $this->Html->link($activityText, array('controller' => 'posts', 'action' => 'view', $activity['Post']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Task') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' named ' . $activity['Task']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'tasks', 'action' => 'view', $activity['Task']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Proposal') { 

			 //echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name']);
				//debug($activity);
				echo $this->Html->link($activityText, array('controller' => 'proposals', 'action' => 'view', $activity['Proposal']['id']));

			} ?>

		</td>
		<td><?php echo h($activity['Activity']['created']); ?>&nbsp;</td>


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
</div>-->

	<?php $count = 0; ?>
	<?php foreach ($activities as $activity): ?>
		<?php //debug($activity);
				$ccount = count($activity['Comment']);
				//debug($ccount);
		 ?>
		<?php $count = $count + 1; ?>
		<?php if ($activity['Activity']['method'] == 'create') {
			$verb = 'created';

		} elseif ($activity['Activity']['method'] == 'edit') {
			$verb = 'edited';

		 } ?>

<?php if ($count%2 == 1) { ?> 
<li>
<?php } else { ?>
<li class="timeline-inverted">
	<?php } ?>

		<?php if ($activity['Activity']['object_type'] == 'Organization') {
				echo('<div class="timeline-badge primary"><i class="fa fa-leaf"></i>');
			} elseif ($activity['Activity']['object_type'] == 'Contact') { 
				echo('<div class="timeline-badge primary"><i class="fa fa-user"></i>');

			} elseif ($activity['Activity']['object_type'] == 'Interaction') { 
				echo('<div class="timeline-badge warning"><i class="fa fa-comments"></i>');

			} elseif ($activity['Activity']['object_type'] == 'Post') { 
				echo('<div class="timeline-badge warning"><i class="fa fa-thumb-tack"></i>');

			} elseif ($activity['Activity']['object_type'] == 'Task') { 
				echo('<div class="timeline-badge danger"><i class="fa fa-trophy"></i>');

			} elseif ($activity['Activity']['object_type'] == 'Proposal') { 
				echo('<div class="timeline-badge success"><i class="fa fa-shopping-cart"></i>');
} ?>

     	

                                    	
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">New <?php echo $activity['Activity']['object_type']; ?></h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $this->Time->timeAgoInWords($activity['Activity']['created']); ?></small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">

		<?php if ($activity['Activity']['object_type'] == 'Organization') { 

		//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' an ' . $activity['Activity']['object_type'] . ' named ' . $activity['Organization']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'organizations', 'action' => 'view', $activity['Organization']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Contact') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$contactFull = ($activity['Contact']['first_name'] . ' ' . $activity['Contact']['last_name']);
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' named "' . $contactFull  . '"');
				
				echo $this->Html->link($activityText, array('controller' => 'contacts', 'action' => 'view', $activity['Contact']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Interaction') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Interaction']['type'] . ' ' . $activity['Activity']['object_type'] . ' with ' . $activity['Organization']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'interactions', 'action' => 'view', $activity['Interaction']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Post') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' "' . $activity['Post']['comment'] . '"');
				
				echo $this->Html->link($activityText, array('controller' => 'posts', 'action' => 'view', $activity['Post']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Task') { 

			//echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name'] . ' named ' . $activity['Task']['name']);
				
				echo $this->Html->link($activityText, array('controller' => 'tasks', 'action' => 'view', $activity['Task']['id']));

			} elseif ($activity['Activity']['object_type'] == 'Proposal') { 

			 //echo $this->Html->link($activity['User']['name'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); 
				$activityText = ($activity['User']['name'] . ' ' . $verb . ' a ' . $activity['Activity']['object_type'] . ' for ' . $activity['Organization']['name']);
				//debug($activity);
				echo $this->Html->link($activityText, array('controller' => 'proposals', 'action' => 'view', $activity['Proposal']['id']));

			} ?><br>
			<?php /* $ccount = count($activity['Comment']);
					echo('<b>Comments (' . $ccount . ')</b>');
					echo('<ul>');
					foreach ($activity['Comment'] as $comment) {
					echo('<li>' . $comment['comment']  . '</li>');



					}
					echo('</ul>');

				*/ ?>


			<!--<div class="actions1">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $activity['Activity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?></div>-->

                                        </div>
                                    </div>
                                </li>

<?php endforeach; ?>

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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                  
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>

