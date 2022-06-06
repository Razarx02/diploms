<div class="page__titles">
        <div class="container">
            <div class="page__titles-wrapper">
                <a href="/" class="way__page">Главная</a>
                <span class="arrow__icon-to-right">></span>
                <span class="page__title">контакты</span>
            </div>
            <div class="page__title-upper">контакты</div>
        </div>
</div>
<section class="contacts">
    <div class="container">
        <div class="contacts__wrapper">
            <div class="contacts__left">
                <div class=" contacts__item"><span class="social-network location"></span><span><?= $data[0]["Contact"]["text"] ?></span></div>
                <div class=" contacts__item"><a href="#" class="social-network phone"></a> <a class="social__link" href="#"><?= $data[1]["Contact"]["text"] ?></a></div>
                <div class=" contacts__item"><a href="#" class="social-network phone_sec"></a> <a class="social__link" href="#"><?= $data[2]["Contact"]["text"] ?></a></div>
                <div class=" contacts__item"><a href="#" class="social-network email"></a> <a class="social__link" href="#"><?= $data[3]["Contact"]["text"] ?></a></div>
            </div>
            <div class="contacts__right">
                <div class="location__card">
                    <img src="/img/PNG/card.png" alt="" class="location__img">
                </div>
            </div>
        </div>
    </div>
</section>