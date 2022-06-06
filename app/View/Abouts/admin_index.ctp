<h1>О нас</h1>

<!-- <a  class="btn btn--add" href="/admin/abouts/add">Добавить</a> -->
<br><br>
<?php if($data): ?>
	<div class="admin_table">
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
						<tr>
							<td>
								<?php echo $item['About']['id'] ?>
							</td>
							<td>
								<img src="/img/abouts/thumbs/<?= $item['About']['img'] ?>" style="max-width:300px;" alt=""> 
							</td>
							<td>
                                <?php echo $item['About']['title'] ?>
							</td>
                            <td>
                                <?php echo $item['About']['text'] ?>
							</td>
							<td>
								<a href="/admin/abouts/edit/<?php echo $item['About']['id'] ?>">Редактировать</a>
								<?php // echo $this->Form->postLink('Удалить', "/admin/abouts/delete/{$item['About']['id']}", array('confirm' => 'Удалить?')) ?>
							</td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

