<h1> Товары </h1>

<a class="btn btn--add" href="/admin/products/add">Добавить</a>
<br><br>

<hr>
<!-- <h2>Фильтр</h2> -->
<div class="filter">
	<?php foreach($categories as $item) : ?>
		<a href="/admin/products/index/<?= $item["Category"]["id"] ?>" class="filter__item"><?= $item["Category"]["title"] ?></a>
	<?php endforeach ; ?>
	<a href="/admin/products" class="filter__item">Все</a>
	
</div>
<hr>
<style>
	.filter {
		padding: 15px 0px;
		display: flex;
		flex-wrap:wrap;
		margin-top:-10px;
		margin-left:-10px;
		/* margin:0px -10 */
	}
	.filter__item {
		margin:10px;
		padding: 0.6rem 1rem;
		background-color:#05b2d8;
		color:#fff;
		border:1px solid #05b2d8;
		transition:all 0.4s ease;
	}
	.filter__item:hover {
		background-color: transparent;
		/* background-color: transparent !important: */
	}

</style>
<?php if($data): ?>
	<div class="admin_table">
		<table style="min-width: 700px;">
			<thead>
				<tr>
					<th>ID </th>
					<th> Фото </th>
                    <th> Заголовок </th>
                    <th>Текст</th>
					<th> Цена </th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $data as $item ): ?>
						<tr>
							<td>
								<?php echo $item['Product']['id'] ?>
							</td>
							<td>
								<img style="max-width:170px" src="/img/products/thumbs/<?= $item['Product']['img'] ?>" alt="">
                                <?php //echo $item['Adventage']['body'] ?>
							</td>
							
                            <td>
								<?php echo $item['Product']['title'] ?>
							</td>
                            <td>
								<?php echo $item['Product']['text'] ?>
							</td>
							<td>
								<?php echo $item['Product']['price'] ?>
							</td>
							
							<td>
							
                            <a href="/admin/products/edit/<?php echo $item['Product']['id'] ?>"> Редактировать </a> || 
                            
                            <?php echo $this->Form->postLink('Удалить', "/admin/products/delete/{$item['Product']['id']}", array('confirm' => 'Удалить?')) ?>
							
                            </td>
						</tr>
				
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
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