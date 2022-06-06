<h1>Комментарии</h1>
<!-- <a class="btn btn--add" href="/admin/comments/add">Добавить</a> -->
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<!-- <th>Фото</th> -->
					<th> Текст </th>

					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
						<tr>
							<td>
								<?php echo $item['Comment']['id'] ?>
							</td>
					
                            <td>
                                <?php echo $item['Comment']['text'] ?>
							</td>
							<td>
								<a href="/admin/comments/edit/<?php echo $item['Comment']['id'] ?>">Редактировать</a> 
								<?php // echo $this->Form->postLink('Удалить', "/admin/comments/delete/{$item['Comment']['id']}", array('confirm' => 'Удалить?')) ?>
							</td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

