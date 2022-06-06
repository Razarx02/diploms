<section class="page">
        <div class="container">
            <ul class="breadcrumbs margin-bottom-b">
                <li><a href="/">Главная</a></li>
                <li><a >О нас</a></li>
            </ul>
            <div class="section__title">
            <?= $about["About"]["title"] ?>
            </div>
        </div>
        <div class="about-relative">
            <div class="about-img-absolute">
                    <img src="/img/bgabout.png" alt="Игрушки Зерек бала">
            </div>
        </div>
        <div class="container">
            <div class="about-block">
                <div class="about-img">
                 <img src="/img/abouts/thumbs/<?= $about["About"]["img"] ?>" alt="Zerek Bala">
                </div>
                <div class="about-text">
                    <?= $about["About"]["text"] ?>
                </div>
            </div>
        </div>
    </section>


    <section class="section adventages-section">
        <div class="container">
            <div class="section__title">
                Направления нашей деятельности. Продажа:
            </div>
            <div class="advetages-parent">
                 <?php foreach($benefits as $item) :?>
                    <div class="adventages__item">
                        <div class="adventages__item--img">
                            <img src="/img/benefits/<?=$item["Benefit"]["img"]?>" alt="Преимущества zerek bala">
                        </div>
                        <div class="adventages-text">
                            <?=$item["Benefit"]["title"]?>
                        </div>
                    </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </section>
    <section class="section instagram-section">
        <div class="container">
            <div class="section__title">Следите за нашей страницей в Instagram !</div>
            <div class="instagram-block">
                <div class="instagram-block__item">
                    <img src="/img/instagram1.jpg" alt="">
                </div>
                <div class="instagram-block__item">
                    <img src="/img/instagram2.jpg" alt="">
                </div>
                <div class="instagram-block__item">
                    <img src="/img/instagram3.jpg" alt="">
                </div>
            </div>
            <a href="https://www.instagram.com/zerekbala_store/?hl=ru" class="button instagram--btn" target="_blank"> Перейти в Instagram </a>
        </div>
    </section>
    <section class="section partners-section">
        <div class="container">
            <div class="section__title">Наши бренды</div>
            <div class="partner-wrapper">
                <?php foreach($brands as $item) : ?>
                    <div>
                        <a href="<?= $item["Brand"]["href"] ? $item["Brand"]["href"] : '#'  ?>" class="partner__item">
                            <div class="partner-img">
                                <img src="/img/brands/thumbs/<?= $item["Brand"]["img"] ?>" alt="<?= $item["Brand"]["title"] ?>">
                            </div>
                        </a>
                    </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </section>