

    <section class="page product-section">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><a href="/products/index">Каталог</a></li>
                <li><a> <?= $product["Product"]["title"] ?> </a></li>
            </ul>
            <div class="products-parent">
                <div class="products-left">
                    <div class="products-main-img">
                        <img data-fancybox="products" class="<?= $product["Product"]["img_type"] ?>" data-src="/img/products/thumbs/<?= $product["Product"]["img"] ?>" src="/img/products/thumbs/<?= $product["Product"]["img"] ?>" alt="">
                    </div>
                    <?php  if($galleries) : ?>
                    <div class="products-images">
                        <?php foreach($galleries as $item): ?>
                            <div>
                                <div class="products-images__item">
                                    <img data-fancybox="products" data-src="/img/galleries/thumbs/<?= $item["Gallery"]["img"] ?>" src="/img/galleries/thumbs/<?= $item["Gallery"]["img"] ?>" alt="">
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </div>
                    <?php endif ; ?>
                </div>
                <div class="products-right">
                        <?php if($product["Product"]["option"]) : ?>
                            <div class="products__action"> <?= $product["Product"]["option"] ?> </div>
                        <?php endif ; ?>
                        <div class="products__title"> <?= $product["Product"]["title"] ?> </div>
                        <div class="products-prices">
                            <?php  if($product["Product"]["old_price"]) : ?>
                                <div class="products-prices__item old"> <?= $product["Product"]["old_price"]  ?> </div>
                            <?php endif ;  ?>
                            <?php  if($product["Product"]["price"]) : ?>
                                <div class="products-prices__item new"> <?= $product["Product"]["price"]  ?> </div>
                            <?php endif ;  ?>
                        </div>
                        <div class="products-text">
                                <?=  $product["Product"]["text"] ?>
                        </div>
                        <div class="products-info">
                            <?php if($product["Product"]["code"]) :  ?>
                                <div class="products-info__first">
                                    Код продукта: <span> <?= $product["Product"]["code"] ?></span>
                                </div> 
                            <?php endif ; ?>
                            <?php if($product["Product"]["stockin"]) :  ?>
                                <div class="products-info__second">
                                    <?= $product["Product"]["stockin"] ?>
                                    <!-- Есть в наличии -->
                                </div>
                            <?php endif ; ?>
                        </div>

                        <div class="products-buttons">
                            <div id="addproduct" class="product__button to--basket active" data-img="/img/products/thumbs/<?= $product["Product"]["img"] ?>" data-title="<?= $product["Product"]["title"] ?>" data-price="<?= $product["Product"]["price"] ?>" data-id="<?= $product["Product"]["id"] ?>" data-code="<?= $product["Product"]["code"] ?>"  data-brend="<?= $product["Product"]["brand"] ? $this->Common->get_from_BrandByid($product["Product"]["brand"]) : "Не указано" ?>" > Добавить в Корзину </div>
                            <div id="show-block" class="product__button has--product"> Товар уже в корзине </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section like-products">
        <div class="container">
            <div class="section__title">Похожие товары</div>
            <div class="like-prodcuts-block">
                <?php foreach($otherProducts as $item) : ?>
                    <div class="cards__item">
                        <a href="/products/view/<?= $item["Product"]["id"] ?>" class="cards__item-img">
                            <img src="/img/products/thumbs/<?= $item["Product"]["img"] ?>" alt="">
                            <?php if($item["Product"]["option"]) : ?>
                                <div class="cards--action">
                                    Акция
                                </div>
                            <?php endif ; ?>
                        </a>
                        <div class="cards-bottom">
                            <a href="/products/view/<?= $item["Product"]["id"] ?>" class="cards__title"> <?= $item["Product"]["title"] ?>  </a>
                            <div class="cards__subtitle"> 
                                <?= $this->Text->truncate(strip_tags($item['Product']['text']), 110, array('ellipsis' => '...', 'exact' => true)) ?> 
                            </div>
                            <div class="cards-price">
                                    <?php if($item["Product"]["old_price"]) :?>
                                    <div class="cards-price__item old"> <?= $item["Product"]["old_price"] ?> ₸ </div>
                                <?php endif ; ?>
                                <?php if($item["Product"]["price"]) :?>
                                    <div class="cards-price__item current"> <?= $item["Product"]["price"] ?> ₸ </div>
                                <?php endif ; ?>
                            
                            </div>
                            <?php if($item["Product"]["stockin"]) :?>
                                <div class="cards--has"> <?= $item["Product"]["stockin"] ?>  </div>
                            <?php endif ; ?>
                        </div>
                        <a  href="/products/view/<?= $item["Product"]["id"] ?>" dart-id="<?= $item["Product"]["id"] ?>" class="cards-btn"></a>
                    </div>
                <?php endforeach ; ?>
              
            </div>
        </div>
    </section>
