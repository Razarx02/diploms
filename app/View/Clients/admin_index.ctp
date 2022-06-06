

<!-- <form action="/admin/products/index" method="GET">
    <input type="text" name="name" placeholder="Искать по имени">
    <input type="tel" name="number" placeholder="Искать по номеру телефона">
</form>
 -->
<h2>Поиск клиента</h2>
<br>
<br>
 <?php 
    echo $this->Form->create('Client', array("action" => "index"));
    echo $this->Form->input('search', array('label' => 'Имя - Фамилия'));
    echo $this->Form->end('Искать');
 ?>
<?php 
    echo $this->Form->create('Client', array("action" => "index"));
    echo $this->Form->input('search', array('label' => 'Поиск по номеру телефона', "type" => "tel"));
    echo $this->Form->end('Искать');
 ?>

<h1>Клиенты</h1>
<a class="btn btn--add" href="/admin/clients/add">Добавить клиента в базу</a>
<br><br>

 <?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th> ID </th>
					<th> Имя </th>
					<th> Фамилия </th>
                    <th> Номер </th>
                    <th> Общая сума </th>
                    <th> Текщ.бонус </th>
					<th> Редактирование </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
                    <tr>
                        <td>
                            <?php echo $item['Client']['id'] ?>
                        </td>
                        <td>
                            <?php echo $item['Client']['name'] ?>
                        </td>
                        <td>
                            <?php echo $item['Client']['surname'] ?>
                        </td>
                        <td>
                            <?php echo $item['Client']['number'] ?>
                        </td>
                        <td>
                            <?php echo $item['Client']['allsume'] ?>
                        </td>
                        
                        <td>
                            <?php echo $item['Client']['bonus'] ?>
                        </td>
                        <td>
                          <a href="/admin/clients/bonus/<?php echo $item['Client']['id'] ?>">Бонусы</a>   || <a href="/admin/clients/edit/<?php echo $item['Client']['id'] ?>">Редактировать</a> ||
                            <?php 
                                echo $this->Form->postLink('Удалить', "/admin/clients/delete/{$item['Client']['id']}", array('confirm' => 'Удалить?')) ;
                            ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>
		</table>  
	</div>	          
<?php endif; ?>

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
                'modulus' => 10
                )
        ); ?>
        </ul>
        <div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
    </div>  
</div>

