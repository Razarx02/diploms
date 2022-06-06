<h1>Баннеры</h1>
<a class="btn btn--add" href="/admin/banners/add">Добавить</a>
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th>Фото</th>
					<th> Заголовок </th>
                    <th> Подзаголовок </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
                    <tr>
                        <td>
                            <?php echo $item['Banner']['id'] ?>
                        </td>
                        <td>
                            <img src="/img/banners/thumbs/<?= $item['Banner']['img'] ?>" style="max-width:140px;" alt=""> 
                        </td>
                        <td>
                            <?php echo $item['Banner']['title'] ?>
                        </td>
                        <td>
                            <?php echo $item['Banner']['sub_title'] ?>
                        </td>
                        <td>
                            <a href="/admin/banners/edit/<?php echo $item['Banner']['id'] ?>">Редактировать</a> ||
                            <?php 
                             if($item['Banner']['id']  != 2 ) {
                                 echo $this->Form->postLink('Удалить', "/admin/banners/delete/{$item['Banner']['id']}", array('confirm' => 'Удалить?')) ;
                             } 
                             ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>

            
		</table>  
		</div>	          
	
<?php endif; ?>

