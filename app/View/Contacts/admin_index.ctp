<h1>Контакты</h1>

<!-- <a class="btn btn--add" href="/admin/contacts/add">Добавить</a> -->
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<!-- <th>Фото</th> -->
					<th> Название </th>
                    <th> Значение </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
						<tr>
							<td>
								<?php echo $item['Contact']['id'] ?>
							</td>
							<td>
                                <?php echo $item['Contact']['name'] ?>
							</td>
                            <td>
                                <?php echo $item['Contact']['text'] ?>
							</td>
							<td>
								<a href="/admin/contacts/edit/<?php echo $item['Contact']['id'] ?>">Редактировать</a>
								<?php // echo $this->Form->postLink('Удалить', "/admin/contacts/delete/{$item['Contact']['id']}", array('confirm' => 'Удалить?')) ?>
							</td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

