<h1>Информация о клиенте</h1>

<div class="request_view">
	<div>
		<p><b>Имя:</b> <?= $clientdata['Client']['name'] ?></p>
	</div>
	<div>
		<p><b>Фамилия:</b> <?= $clientdata['Client']['surname'] ?></p>
	</div>
	<div>
		<p><b>Телефон:</b> <?= $clientdata['Client']['number'] ?></p>
	</div>
	<div>
		<p><b>ИИН:</b> <?= $clientdata['Client']['iin']  ?></p>
	</div>
	<div>
		<p><b>Общий чек клиента:</b> <?= $clientdata['Client']['allsume'] ?></p>
	</div>
	<div>
		<p><b>Текущий бонус:</b> <?= $clientdata['Client']['bonus'] ?></p>
	</div>
</div>

<h1>Начисление бонуса (Кэшбэк) ...</h1>
<div class="wrapper-bonus">
 <?php 
    echo $this->Form->create('Bonus');
    echo $this->Form->input('allbonus', array("value" => $clientdata['Client']['bonus'], "type" => "hidden"));
    echo $this->Form->input('check', array("value" => '+', "type" => "hidden"));
    echo $this->Form->input('client', array("value" => $clientdata['Client']['id'], "type" => "hidden"));
    echo $this->Form->input('date', array("label" => "Дата","type" => "date"));
    echo $this->Form->input('money', array('label' => 'Счет на оплату (тг)', "type" =>'number'));
    echo $this->Form->input('percent', array('label' => 'Скидка в процентах (%)', "type" =>'number'));
    echo $this->Form->end('Начислять бонусы');
 ?>
</div>
<br>	
<br>	
<br>	
<h1>Потратить бонусы  (Кэшбэк) ...</h1>
<div class="wrapper-bonus">
 <?php 
 	
    echo $this->Form->create('Bonus',array('type' => 'get'));
    		
    echo $this->Form->input('check', array("value" => '-', "type" => "hidden"));
    echo $this->Form->input('client', array("value" => $clientdata['Client']['id'], "type" => "hidden"));
    echo $this->Form->input('date', array("label" => "Дата","type" => "date"));
    echo $this->Form->input('bonus', array('label' => 'Потратить бонусы', "type" =>'number'));
  
    echo $this->Form->end('Использовать бонусы');
 ?>

</div>
<br>	
<h1>История начисление бонуса  ...</h1>

<div class="admin_table">
	<table style="min-width: 700px;">
		<thead>
			<tr>
				<th> ID </th>
				<th> Сумма покупки </th>
				<th> Процент </th>
				<th> Бонусы </th>
                <th> Доступно (Бонус)  </th>
                <th> Общая сума после покупки </th>
              	<th> Дата </th>
				<th> Редактирование </th>
			</tr>
		</thead>
		<tbody>
				<?php foreach( $bonusAllData as $item ) : ?>
	                <tr>
	                    <td>
                      	   <?= $item["Bonus"]["id"] ?>
	                    </td>
	                    <td>
                      	   <?= $item["Bonus"]["check"] . $item["Bonus"]["money"] ?> тг
	                    </td>
	                    <td>
                      	   <?=  $item["Bonus"]["percent"] ?> %
	                    </td>
	                    <td>
                      	   <?= $item["Bonus"]["check"] . $item["Bonus"]["bonus"] ?>
	                    </td>
	                    <td>
                      	   <?=  $item["Bonus"]["allbonus"] ?> 
	                    </td>
	                    <td>
                      	   <?=  $item["Bonus"]["aftermoney"] ?> тг
	                    </td>
	                    <td>
                      	   <?= date('d.m.Y', strtotime( $item["Bonus"]["date"]) ) ?> 
	                    </td>
	                   
	                    <td>
	                    	 <?php 
                                echo $this->Form->postLink('Удалить', "/admin/clients/bonusdelete/{$item['Bonus']['id']}", array('confirm' => 'Удалить?')) ;
                            ?>
	                    </td>
	                   
	                </tr>
            	<?php  endforeach ; ?>
		
		</tbody>
	</table>  
</div>

<div class="pagi">
    <div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
    <?php 
    echo $this->Paginator->counter(array(
        'separator' => ' из ',
        
        ));
     ?>
    </div>      
    <div class="pag-bot">
        <div class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></div>
        <ul class="pagination">
        <?php echo $this->Paginator->numbers(
            array(
                'separator' => '',
                'tag' => 'li',
                'modulus' => 4
                )
        ); ?>
        </ul>
        <div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
    </div>  
</div>




<style type="text/css">
	.request_view > div{
		margin-bottom: 10px;
		padding-bottom: 10px;
		border-bottom: 1px solid #e7e7e7;
	}
	.request_view > div p:not(:last-child){
		margin-bottom: 10px;
	}

	.wrapper-bonus {
		padding: 20px;
		background-color: #e8eced;
	}
</style>
