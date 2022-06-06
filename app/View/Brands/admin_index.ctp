<h1>Бренды</h1>
<a class="btn btn--add" href="/admin/brands/add">Добавить</a>
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
                            <?php echo $item['Brand']['id'] ?>
                        </td>
                        <td>
                            <img src="/img/brands/thumbs/<?= $item['Brand']['img'] ?>" style="max-width:140px;" alt=""> 
                        </td>
                        <td>
                            <?php echo $item['Brand']['title'] ?>
                        </td>
                       
                        <td>
                            <a href="/admin/brands/edit/<?php echo $item['Brand']['id'] ?>">Редактировать</a> ||
                            <?php  echo $this->Form->postLink('Удалить', "/admin/brands/delete/{$item['Brand']['id']}", array('confirm' => 'Удалить?')) ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>

            
		</table>  
		</div>	          
	
<?php endif; ?>

