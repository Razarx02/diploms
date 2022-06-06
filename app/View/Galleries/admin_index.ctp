<h1>Галерея</h1>

<a class="btn btn--add" href="/admin/galleryes/add">Добавить</a>
<br><br>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th> Картинка </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
						<tr>
							<td>
								<?php echo $item['Gallerye']['id'] ?>
							</td>
						
                            <td>
								<img style="max-width:300px" src="/img/pages/<?= $item['Gallerye']['img'] ?>" alt="">
                                <?php //echo $item['Adventage']['body'] ?>
							</td>
							<td>
							
                            <a href="/admin/galleryes/edit/<?php echo $item['Gallerye']['id'] ?>"> Редактировать </a> || 
                            
                            <?php echo $this->Form->postLink('Удалить', "/admin/galleryes/delete/{$item['Gallerye']['id']}", array('confirm' => 'Удалить?')) ?>
							
                            </td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

