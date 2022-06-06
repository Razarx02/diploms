<h1>Редактирование пользователя</h1>

<?php 

echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => 'Имя пользователя'));
echo $this->Form->input('password', array('label' => 'Пароль'));
echo $this->Form->end('Редактировать');
?>