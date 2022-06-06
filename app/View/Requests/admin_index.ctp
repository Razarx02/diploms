<h1>Список заявок</h1>

<?php if($requests): ?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>ФИО</th>
				<th>Телефон</th>
				<!-- <th>Комментарии</th> -->
				<!-- <th>Документ</th> -->
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $requests as $request ): ?>
			<tr>
				<td><?php echo $request['Request']['id'] ?></td>
				<td><?php echo $request['Request']['name'] ?></td>
				<td>
					<?= ($request['Request']['phone']) ? "{$request['Request']['phone']}" : '-' ?>
				</td>
				
				<td>
					<a href="/admin/requests/view/<?php echo $request['Request']['id'] ?>">Просмотр</a> |
					<?php  echo $this->Form->postLink('Удалить', "/admin/requests/delete/{$request['Request']['id']}", array('confirm' => 'Удалить заявку?')) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<?php else: ?>
	<h3>Список заявок пуст</h3>
<?php endif; ?>


<div class="pagi">
	<div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
	<?php 
	echo $this->Paginator->counter(array(
	    'separator' => ' из ',
	    
	    ));
	 ?>
	</div>		
	<div class="pag-bot">
		<div class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></div>
		<ul class="pagination">
		<?php echo $this->Paginator->numbers(
		    array(
		        'separator' => '',
		        'tag' => 'li',
		        'modulus' => 4
		        )
		); ?>
    	</ul>
		<div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
	</div>	
</div>