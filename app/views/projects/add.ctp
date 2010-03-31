<div class="projects form">
<?php echo $this->Form->create('');?>
	<fieldset>
 		<legend><?php printf(__('Opret %s', true), __('Projekt', true)); ?></legend>
	<?php
		echo $this->Form->input('Project.title', array('label' => 'Navn'));
		echo $this->Form->input('Project.body', array('label' => 'Beskrivelse'));
		//echo $this->Form->input('total_power_usage');
		echo $this->Form->input('Project.total_power_allowance', array('label' => 'Tilladt strømforbrug'));
		//echo $this->Form->input('Project.build_start');
		//echo $this->Form->input('Project.build_end');
		//echo $this->Form->input('Project.items_start');
		//echo $this->Form->input('Project.items_end');
		//echo $this->Form->input('status');
		echo $this->Form->input('Project.group_id', array('label' => 'Gruppe'));
        echo $this->Form->input('User.createNew', array('label' => 'Opret ny projektleder ', 'type' => 'checkbox', 'checked'=>'true', 'class'=>'toggleClass'));
        echo $this->Form->input('User.username', array('label' => 'Angiv projektlederens e-mail'));
        echo $this->Form->input('User.user_id', array('label' => 'Tilknyt en eksisterende projektleder'));
        //echo $this->Form->input('User.password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Opret', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Projects', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Groups', true)), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Group', true)), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Project Items', true)), array('controller' => 'project_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Project Item', true)), array('controller' => 'project_items', 'action' => 'add')); ?> </li>
	</ul>
</div>