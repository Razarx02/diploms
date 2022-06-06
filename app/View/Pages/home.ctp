<section class="main">
        <div class="container">
            <div class="main-block">
                <div class="main-wrapper">
                    <?php foreach($banners as $item) : ?>
                        <div>
                            <div class="main__item">
                                <div class="main-left">
                                    <div class="main__title">
                                        <?= $item["Banner"]["title"] ?>
                                    </div>
                                    <div class="main__subtitle"> <?= $item["Banner"]["sub_title"] ?> </div>
                                    <a href="/products/index" class="button main-btn"> Посмотреть игрушки </a>
                                </div>
                                <div class="main-right">
                                    <div class="main-img">
                                        <img src="/img/banners/thumbs/<?= $item["Banner"]["img"] ?>" alt="Игрушки Зерек Бала">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ; ?>
                </div>
            </div>
        </div>
        <div class="main-bg">
            <img src="img/bgbig.png" alt="">
        </div>
    </section>
    <section class="section cards">
        <div class="container">
            <div class="section__title">Популярные товары</div>
            <div class="cards-parent">
                <div class="cards-wrapper">
                    <?php foreach($products as $item) : ?>
                        <div>
                            <div class="cards__item">
                                <a href="/products/view/<?= $item["Product"]["id"] ?>" class="cards__item-img">
                                    <img src="/img/products/thumbs/<?= $item["Product"]["img"]?>" alt="<?= $item["Product"]["title"]?>">
                                    <?php if($item["Product"]["option"]) : ?>
                                        <div class="cards--action">
                                            Акция
                                        </div>
                                    <?php endif ; ?>
                                </a>
                                <div class="cards-bottom">
                                    <a href="/products/view/<?= $item["Product"]["id"] ?>" class="cards__title"> <?= $item["Product"]["title"] ?> </a>
                                    <div class="cards__subtitle"> <?= $this->Text->truncate(strip_tags($item['Product']['text']), 64, array('ellipsis' => '...', 'exact' => true)) ?> </div>
                                    <div class="cards-price">
                                        <?php if($item["Product"]["old_price"]) :?>
                                            <div class="cards-price__item old"> <?= $item["Product"]["old_price"] ?> ₸ </div>
                                        <?php endif ; ?>
                                        <?php if($item["Product"]["price"]) :?>
                                            <div class="cards-price__item current"> <?= $item["Product"]["price"] ?> ₸ </div>
                                        <?php endif ; ?>
                                        <!-- <div class="cards-price__item ">33000 ₸</div> -->
                                    </div>
                                    <div class="cards--has">Есть в наличии</div>
                                </div>   
                                <div class="btns-flex-bottom">
                                     <a data-id="<?= $item["Product"]["id"] ?>" class="cards-btn btn--productsa"   data-img="/img/products/thumbs/<?= $item["Product"]["img"] ?>" data-title="<?= $item["Product"]["title"] ?>" data-price="<?= $item["Product"]["price"] ?> data-code="<?= $item["Product"]["code"] ?>"  data-brand="<?= $item["Product"]["brand"] ? $this->Common->get_from_BrandByid($item["Product"]["brand"]) : "Не указано" ?>" >
                                       
                                                
                                   
                                          
                                     </a>
                                         
                                      <a data-id="<?= $item["Product"]["id"] ?>" class="cards-btn minusa cards--minusa"></a>                 
                                </div>
                               
                            </div>
                        </div>
                    <?php endforeach ; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-section">
        <div class="container">
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

    <section class="section payment-section">
        <div class="container">
            <div class="section__title">Способы оплаты</div>
            <div class="payment-block">
                <div class="payment__item">
                    <img src="img/payment.png" alt="">
                </div>
                <div class="payment__item">
                    <img src="img/payment1.png" alt="">
                </div>
                <div class="payment__item">
                    <img src="img/payment2.png" alt="">
                </div>
                <div class="payment__item">  
                    <img src="img/payment3.png" alt="">
                </div>
                <div class="payment__item"> 
                    <img src="img/payment4.png" alt="">  
                </div>
            </div>
        </div>
    </section>