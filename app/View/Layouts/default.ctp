<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Панель Администратора</title>
		<meta name="description" content=""/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="/img/favicon.png" />
		<link rel="stylesheet" href="/css/cake.generic.css" />
		<?php echo $this -> Html -> script('ckeditor/ckeditor.js') ?>
		<!-- <link rel="shortcut icon" href="/img/favicon.png" />
		<link rel="stylesheet" href="/css/style.css" />
		<link rel="stylesheet" href="/css/slick.css" />
		<link rel="stylesheet" href="/css/jquery.fancybox.css" /> -->
	</head>
	<body>		  
		<?php if(isset($login) && !empty($login)): ?>

		<div class="wrapper">	
			<div class="sidebar">
				<div class="sidebar-top">
					<a href="#" class="sidebar-top__heading"> ZEREK BALA </a>				
				</div>
				<ul class="menu">
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin">Панель администратора</a>
					</li>				
					<hr>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/categories"> Категория </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/products"> Продукты</a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/pages"> Элементы </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/abouts"> Информация о нас </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/banners"> Баннеры </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/brands"> Бренды </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/benefits"> Преимущества </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/requests"> Заявки </a>
					</li>
					<li class=" menu__li feedback-ico">
						<a class="menu-item" href="/admin/clients"> Клиенты </a>
					</li>
					<hr>
					<li class="menu__li feedback-ico">
						<a class="menu-item" href="/admin/users/logout">Выход</a>
					</li>			
				</ul>
			</div>
			<div class="content-right">				
				<header class="header">
					<div class="mob-start">
						<span class="menu1"></span>
						<span class="menu2"></span>
						<span class="menu3"></span>
					</div>
					<span class="header__left"><a href="/admin">Панель администратора</a></span>		
					<a class="header__link" href="/">Перейти на сайт</a>
				</header>
				<div class="content">					
					<?php echo $this->Session->flash('good'); ?>
					<?php echo $this->Session->flash('bad'); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	
	<?php else: ?>

				<div class="login-page">
				  <div class="form">
				   <?php echo $this->Session->flash('good'); ?>
					<?php echo $this->Session->flash('bad'); ?>
					<?php echo $this->fetch('content'); ?>
				  </div>
			</div>

	<?php endif ?>

		<script src="/js/jquery-3.0.0.min.js"></script>
		<!-- <script src="/js/slick.min.js"></script>	 -->
		<!-- <script src="/js/jquery.waypoints.min.js"></script> -->
		<script src="/js/jquery.maskedinput.min.js"></script>
		<script src="/js/admin_script.js?v=1.1"></script>	
		<!-- <script src="/js/jquery.fancybox.min.js"></script>	 -->
	</body>
</html>





