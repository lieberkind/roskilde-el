<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php printf(__('Rediger %s', true), __('Profil', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Dit navn'));
		echo $this->Form->input('username', array('label' => 'Din e-mail (dette anvendes som dit login)'));
		echo $this->Form->input('password', array('label' => 'Din adgangskode', 'value' => ''));
		//echo $this->Form->input('role_id', array('label' => 'Rolle'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Gem', true));?>
</div>