 <h1>Редактировать начисленный бонус ...</h1>
 <?php 
    echo $this->Form->create('Bonus');
    echo $this->Form->input('allbonus', array( "label" => "asd", "type" => "hidden"));
    
    echo $this->Form->input('date', array("label" => "Дата","type" => "date"));
    echo $this->Form->input('money', array('label' => 'Счет на оплату (тг)', "type" =>'number'));
    echo $this->Form->input('percent', array('label' => 'Скидка в процентах (%)', "type" =>'number'));
    echo $this->Form->end('Начислять бонусы');
 ?>