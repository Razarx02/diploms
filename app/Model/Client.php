<?php 


class Client extends AppModel {
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите имя клиента'
		),
		'number' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите номер клиента'
		),

		
	);

}
?>