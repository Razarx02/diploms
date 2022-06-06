<h1>Категории</h1>
<a class="btn btn--add" href="/admin/categories/add">Добавить</a>
<br><br>
<?php if($data): ?>
	<div class="admin_table">

	
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th> Название </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
                    <tr>
                        <td>
                            <?php echo $item['Category']['id'] ?>
                        </td>
                        <td>
                            <?php echo $item['Category']['title'] ?>
                        </td>
                      
                        <td>
                            <a href="/admin/categories/edit/<?php echo $item['Category']['id'] ?>">Редактировать</a> ||
                            <?php  echo $this->Form->postLink('Удалить', "/admin/categories/delete/{$item['Category']['id']}", array('confirm' => 'Удалить?')) ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>

            
		</table>  
		</div>	          
	
<?php endif; ?>

