<h1>Преимущество</h1>

<!-- <a class="btn btn--add" href="/admin/adventages/add">Добавить</a> -->
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th> Заголовок  </th>
                    <th> Иконка  </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
						<tr>
							<td>
								<?php echo $item['Adventage']['id'] ?>
							</td>
							<td>
                                <?php echo $item['Adventage']['title'] ?>
							</td>
                            <td>
									<img style="max-width:70px" src="/img/pages/<?= $item['Adventage']['img'] ?>" alt="">
                                <?php //echo $item['Adventage']['body'] ?>
							</td>
							<td>
								<a href="/admin/adventages/edit/<?php echo $item['Adventage']['id'] ?>">Редактировать</a>
								<?php // echo $this->Form->postLink('Удалить', "/admin/adventages/delete/{$item['Adventage']['id']}", array('confirm' => 'Удалить?')) ?>
							</td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

