<div class="page__titles">
    <div class="container">
        <div class="page__titles-wrapper">
            <a href="/" class="way__page">Главная</a>
            <span class="arrow__icon-to-right">></span>
            <a href="/industries/index" class="way__page">Наши отрасли</a>
            <span class="arrow__icon-to-right">></span>
            <span class="page__title"><?= $data["Industry"]["title"]?></span>
        </div>
    </div>
</div>
<section class="industries-inside">
    <div class="container">
        <div class="industries__items">
            <div class="industries-inside__item ">
                <div class="industries-inside__pic">
                    <img src="/img/gallery/<?= $data["Industry"]["img"]?>" alt="" class="industries__img">
                </div>
                <div class="industries-item__wrapper">
                    <div class="industries-inside__title"><?= $data["Industry"]["title"]?></div>
                    <div class="industries-inside__text">
                        <?= $data["Industry"]["body"]?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    