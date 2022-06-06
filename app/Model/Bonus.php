<?php 


class Bonus extends AppModel {
	public $validate = array(
		'money' => array(
			'rule' => 'notEmpty',
			'message' => 'Укажите суму'
		),
		'percent' => array(
			'rule' => 'notEmpty',
			'message' => 'Укажите скидку (%)'
		),

		
	);

}
?>