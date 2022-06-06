<h1>Отрасли</h1>

<a class="btn btn--add" href="/admin/industries/add">Добавить</a>
<br><br>
<?php if($data): ?>
	<div class="admin_table">
    <div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
	<?php 
	echo $this->Paginator->counter(array(
	    'separator' => ' из ',
	    
	    ));
	 ?>
	</div>	
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th>Фото</th>
					<th> Заголовок  </th>
                    <th> Текст  </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
				<?php if($item['Industry']['id'] != 7) : ?>
                    <tr>
                        <td>
                            <?php echo $item['Industry']['id'] ?>
                        </td>
                        <td>
                            <img src="/img/gallery/thumbs/<?= $item['Industry']['img'] ?>" style="max-width:300px;" alt=""> 
                        </td>
                        <td>
                            <?php echo $item['Industry']['title'] ?>
                        </td>
                        <td>
                            <?php echo $item['Industry']['body'] ?>
                        </td>
                        <td>
                            <a href="/admin/industries/edit/<?php echo $item['Industry']['id'] ?>">Редактировать</a> ||
                            <?php  echo $this->Form->postLink('Удалить', "/admin/industries/delete/{$item['Industry']['id']}", array('confirm' => 'Удалить?')) ?>
                        </td>
                    </tr>
				<?php endif ; ?>
				<?php endforeach; ?>
			</tbody>            
		</table>            
	</div>
<?php endif; ?>

<div class="pagi">
	<div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
			
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

	<br>
	<br>
	<h3>Карточка "Смотреть все отрасли" </h3>
	<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
				
					<th> Заголовок  </th>
                    <th> Текст  </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
                    <tr>
                        <td>
                            <?php echo $data7['Industry']['id'] ?>
                        </td>
                        <td>
                            <?php echo $data7['Industry']['title'] ?>
                        </td>
                        <td>
                            <?php echo $data7['Industry']['sub_title'] ?>
                        </td>
                        <td>
                            <a href="/admin/industries/edit/<?php echo $data7['Industry']['id'] ?>">Редактировать</a> 
                            <?php // echo $this->Form->postLink('Удалить', "/admin/industries/delete/{$data7['Industry']['id']}", array('confirm' => 'Удалить?')) ?>
                        </td>
                    </tr>
		
			</tbody>            
		</table> 
</div>