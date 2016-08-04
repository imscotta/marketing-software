<div class="interactions form">
<?php echo $this->Form->create('Interaction', array(
	    'inputDefaults' => array(
	        'class' => 'form-control',
	    ))); ?>
	<fieldset>
		<legend><?php echo __('Add Interaction'); ?></legend>
	<?php
		echo $this->Form->hidden('user_id', array('value' => $userId));
		echo $this->Form->hidden('organization_id', array('value' => $organizationId));
		//echo $this->Form->input('contact_id'); //array('required' => false, 'default' => NULL)); ?>
		<div>
		<?php
		echo $this->Form->label('Type');
		$options = array('Email' => 'Email', 'Phone' => 'Phone', 'In Person' => 'In Person');
		echo $this->Form->select('type', $options, array('default' => 'Email'));
		?>
		</div>

		<?php
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Interactions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
