<h1>Элементы</h1>
<!-- <a  class="btn btn--add" href="/admin/pages/add">Добавить</a> -->
<?php if($data	): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th>Ссылка или Текст</th>
					<th>Фото</th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
					<tr>
						<td >
							<?= $item['Page']['id'] ?>
						</td>
						<td >
							<?= $item['Page']['name'] ?>
						</td>
						<td >
							<?= $item['Page']['title'] ?>
						</td>
					
						<td>
							<img src="/img/pages/thumbs/<?= $item['Page']['img'] ?>" style="max-width:150px;" alt="">
						</td>
						<td>
							<a href="/admin/pages/edit/<?php echo $item['Page']['id'] ?>"> Редактировать </a>  
							 <!-- <?php // echo $this->Form->postLink('Удалить', "/admin/pages/delete/{$item['Page']['id']}", array('confirm' => 'Удалить?')) ?>  -->
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

