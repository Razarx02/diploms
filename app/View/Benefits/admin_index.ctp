<h1> Преимущества  </h1>
<!-- <a class="btn btn--add" href="/admin/benefits/add">Добавить</a> -->
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th>Фото</th>
					<th> Заголовок </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
                    <tr>
                        <td>
                            <?php echo $item['Benefit']['id'] ?>
                        </td>
                        <td>
                            <img src="/img/benefits/thumbs/<?= $item['Benefit']['img'] ?>" style="max-width:100px;" alt=""> 
                        </td>
                        <td>
                            <?php echo $item['Benefit']['title'] ?>
                        </td>
                        <td>
                            <a href="/admin/benefits/edit/<?php echo $item['Benefit']['id'] ?>">Редактировать</a> ||
                            <?php  //echo $this->Form->postLink('Удалить', "/admin/benefits/delete/{$item['Benefit']['id']}", array('confirm' => 'Удалить?')) ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>

            
		</table>  
		</div>	          
	
<?php endif; ?>

