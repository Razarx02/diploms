<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/myslider.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    <meta name="title" content="Магазин детских товаров Zerek-Bala. Все для детей в Шымкенте">
    <meta name="keywords" content="ZEREK BALA, zerekbala, Игрушки шымкент, игрушки в Шымкенте, Игрушки купить в Шымкенте, Развиваюшие игрушки, Игрушки и игры, Спортивно-игровые детские комплексы, Игрушки для умных детей">
    <meta name="description" content="ZEREK BALA - Магазин детских игрушек в Шымкенте, игрушки в Шымкенте, качественные детские игрушки по низкой цене! Игрушки для Мальчиков ✓ Игрушки для Девочек ✓   Игрушки для Малышей ✓ Развиваюшие игрушки ✓">
    <link rel="stylesheet" href="/css/style.css?v=1.37">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87052564, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87052564" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <title>Zerek Bala - Игрушки в Шымкенте, игрушки для умных детей</title>
</head>
<body>
    <div class="alert--fixed box-size <?=( isset($_SESSION['Message']) && !empty($_SESSION['Message']) ) ? 'alert--active' : '';?>">
        <div class="alert--content alert--width alert--block box-size">
            <div class="alert--img">
                <div class="alert--img__item active box-size">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 329.954 329.954" style="enable-background:new 0 0 329.954 329.954;" xml:space="preserve">
                        <path id="XMLID_89_" d="M99.85,299.045c2.813,2.813,6.629,4.393,10.607,4.393c3.979,0,7.794-1.581,10.606-4.393L325.56,94.548
                            c2.814-2.813,4.394-6.628,4.394-10.606c0-3.979-1.58-7.794-4.394-10.607l-42.427-42.426c-5.857-5.857-15.355-5.858-21.213,0
                            L110.461,182.37l-42.428-42.428c-2.813-2.813-6.629-4.394-10.607-4.394s-7.793,1.581-10.606,4.394L4.393,182.369
                            c-5.857,5.858-5.857,15.355,0,21.213L99.85,299.045z"/>
                    </svg>
                </div>
            </div>
            <div class="alert-text box-size">
                <div class="alert--title box-size">
                    <?php echo $this->Session->flash('good'); ?>
                    <?php echo $this->Session->flash('bad'); ?>
                </div>
            </div>
            <div class="alert--x alert--close box-size">
                <svg class="box-size" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 284.559 284.559" style="enable-background:new 0 0 284.559 284.559;" xml:space="preserve">
                    <path id="XMLID_90_" d="M4.394,237.739l42.427,42.427c2.812,2.813,6.629,4.394,10.606,4.394c3.978,0,7.794-1.581,10.606-4.394
                        l74.246-74.246l74.246,74.246c2.813,2.813,6.629,4.394,10.606,4.394c3.978,0,7.794-1.581,10.607-4.394l42.427-42.427
                        c5.858-5.858,5.858-15.355,0-21.213L205.92,142.28l74.245-74.247c2.814-2.813,4.394-6.628,4.394-10.606
                        c0-3.979-1.58-7.794-4.394-10.607L237.739,4.393c-5.857-5.858-15.356-5.858-21.213,0.001L142.28,78.639L68.033,4.394
                        c-5.857-5.858-15.356-5.858-21.213,0L4.394,46.82C1.58,49.633,0,53.448,0,57.426c0,3.978,1.58,7.793,4.394,10.606l74.245,74.247
                        L4.394,216.526C-1.465,222.384-1.465,231.881,4.394,237.739z"/>
                </svg>
            </div>
        </div>
        <div class="alert--bg alert--close box-size"></div>
        <?php if(isset($_SESSION['Message'])){unset($_SESSION['Message']);} ?>
    </div>
    <?php echo $this-> element('header'); ?>
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('footer'); ?>
    <div class="form--block" style="display: none;" id="form--block">
        <form action="/requests/send" method="POST">
            <div class="form--title"> Оформление заказа </div>
            <div class="form--subtitle"> Мы свяжемся с вами в ближайшее время </div>
            <input type="text" placeholder="Имя" name="name">
            <input type="tel" placeholder="Телефон" name="phone"> 
            <!-- <input type="text" placeholder="Ваша деятельность" name="text"> -->
            <textarea name="type_text" id="" cols="30" rows="10" class="textarea--class" style="display: none !important;"></textarea>
            <button class="button form--btn" type="submit" > Подвердить заказ </button>
        </form>
    </div>
    <div class="form--block" style="display: none;" id="form--block">
        <form action="/requests/send" method="POST">
            <div class="form--title"> Оформление заказа </div>
            <div class="form--subtitle"> Мы свяжемся с вами в ближайшее время </div>
            <input type="text" placeholder="Имя" name="name" required>
            <input type="tel" placeholder="Телефон" name="phone" required> 
            <!-- <input type="text" placeholder="Ваша деятельность" name="text"> -->
            <textarea name="type_text" id="" cols="30" rows="10" class="textarea--class" style="display: none !important;"></textarea>
            <button class="button form--btn" type="submit" > Подвердить заказ </button>
        </form>
    </div>
    <script src="/js/jquery-3.0.0.min.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/ion.rangeSlider.min.js"></script>
    <script src="/js/masked.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/myslider.js"></script>
    <script src="/js/basket.js?v=1.32"></script>
     <script src="/js/newbasket.js?v=1.32"></script>
    <script src="/js/script.js?v=1.3"></script>
</body>
</html>