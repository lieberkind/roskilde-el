<?php
echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
echo $form->input('User.username', array('label' => 'E-mail'));
echo $form->input('User.password', array('label' => 'Adgangskode'));
echo $form->end('Log Ind');
?>