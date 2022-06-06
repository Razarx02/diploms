<h1>Просмотр заявки</h1>

<div class="request_view">
	<div>
		<p><b>ФИО:</b> <?= $request['Request']['name'] ?></p>
	</div>

	<div>
		<p><b>Телефон:</b> <?= $request['Request']['phone'] ?></p>
	</div>


	<?php if( $request['Request']['type_text'] ): ?>
	<div>
		<p><b>Заказ</b></p>
		<p><?= $request['Request']['type_text'] ?></p>
	</div>
	<?php endif; ?>
</div>

<style type="text/css">
	.request_view > div{
		margin-bottom: 10px;
		padding-bottom: 10px;
		border-bottom: 1px solid #e7e7e7;
	}
	.request_view > div p:not(:last-child){
		margin-bottom: 10px;
	}
</style>