<div class="page__titles">
        <div class="container">
            <div class="page__titles-wrapper">
                <a href="/" class="way__page">Главная</a>
                <span class="arrow__icon-to-right">></span>
                <span class="page__title">Наши отрасли</span>
            </div>
            <div class="page__title-upper">наши отрасли</div>
        </div>
    </div>
    <section class="industries industries__page">
        <div class="container">
            <div class="industries__items">
                <?php foreach($industries as $item) : ?>
                    <?php if($item["Industry"]["id"] != 7) : ?>
                        <div class="industries__item way ">
                            <a href="/industries/view/<?= $item["Industry"]["id"] ?>" class="industries__pic">
                                <img src="/img/gallery/<?= $item["Industry"]["img"]?>" alt="" class="industries__img">
                            </a>
                            <a href="/industries/view/<?= $item["Industry"]["id"] ?>" class="industries__title">
                                <?= $item["Industry"]["title"] ?>
                            </a>
                            <div class="industries__text">
                                <?= $item["Industry"]["sub_title"] ?>
                            </div>
                            <div class="projects__industries-more">
                                <a href="/industries/view/<?= $item["Industry"]["id"] ?>" class="industries-more more-sub">подробнее</a>
                                <a href="/industries/view/<?= $item["Industry"]["id"] ?>" class="industries-more-icon more-sub-icon"></a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach ; ?>
            </div>
        </div>
    </section>
    
    