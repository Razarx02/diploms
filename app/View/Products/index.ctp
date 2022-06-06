<section class="page catalog-section">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><a >Каталог</a></li>
            </ul>
            <div class="catalog-block">
                <div class="sidebar">
                   
                    <?php if(empty($this->request->params["pass"])) : ?>
                        <form action="/products/index" class="sidebar-form" method="GET">
                    <?php else: ?>
                        <form action="/products/index/<?php 
                            if(!empty($this->request->params["pass"][0])){
                                echo $this->request->params["pass"][0];
                            }
                            if(!empty($this->request->params["pass"][1])){
                                echo "/".$this->request->params["pass"][1];
                            }
                        
                        ?>" class="sidebar-form" method="GET">
                    <?php endif ; ?>

                        <div class="sidebar__title">КАТЕГОРИИ</div>
                        <div class="divselect">
                            <div class="divselect--value">Все</div>
                            <div class="divselect__arrow">
                                <svg width="13" height="7" viewBox="0 0 13 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6L6.5 1L1 6" stroke="#323232" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="divselect-options active">
                                <?php foreach($category as $item) :?>
                                    <?php if(!$this->Common->has_subcategory($item['Category']['id'])) : ?>
                                        <div class="divselect-options__item sub--a">
                                            <span> <?= $item['Category']['title'] ?> </span>
                                            <svg width="13" height="7" viewBox="0 0 13 7" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6L6.5 1L1 6" stroke="#323232" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <ul class="option-ul">
                                                <?php foreach($subcategory as $subitem) : ?>
                                                    <?php if($subitem['Subcategory']["category_id"] == $item["Category"]["id"]) : ?>
                                                        <li> <a href="/products/index/<?= $item['Category']['id']?>/<?=$subitem["Subcategory"]["id"]?>"> <?=$subitem["Subcategory"]["title"]?> </a> </li>
                                                    <?php endif ; ?>
                                                <?php endforeach ; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <a href="/products/index/<?= $item["Category"]["id"] ?>" class="divselect-options__item"><?= $item["Category"]["title"] ?></a>
                                    <?php endif ; ?>
                                <?php  endforeach ;?>
                                <a href="/products/index" class="divselect-options__item">Все</a>
                            </div>


                        </div>

                        <div class="sidebar__title margin--t">ЦЕНА</div>

                        <div class="sidebar-multislider">
                            <div class="multislider--inputs">
                                <input type="number" placeholder="от" id="minvalue" name="price_from">
                                <input type="number" placeholder="до" id="maxvalue" name="price_to">
                            </div>
                            <div class="for-multislider" id="for-multislider"></div>
                        </div>


                        <div class="sidebar__title margin--t">БРЕНДЫ</div>
                        <div class="sidebar-checkbox">
                            <?php foreach($brands as $item) : ?>
                                <div class="sidebar-checkboc__item">
                                    <input type="checkbox" name="brands[]" id="sidebar_<?= $item["Brand"]["id"] ?>" value="<?= $item["Brand"]["id"] ?>" <?=(isset($_GET['brands']) && in_array($item['Brand']['id'], $_GET['brands'])) ? 'checked' : ''?>>
                                    <label for="sidebar_<?= $item["Brand"]["id"] ?>"> <?= $item["Brand"]["title"] ?> </label>
                                </div>
                            <?php endforeach ; ?>
                           

                        </div>


                        <div class="sidebar-button-block">
                            <button class="sidebar__button" type="submit">Применить фильтр</button>
                        </div>

                    </form>
                </div>
                <div class="catalog-right">

                    <!-- <form action="#" class="catalog-form"> -->
                    <?php if(empty($this->request->params["pass"])) : ?>
                        <form action="/products/index" class="catalog-form" method="GET">
                    <?php else: ?>
                        <form action="/products/index/<?php 
                            if(!empty($this->request->params["pass"][0])){
                                echo $this->request->params["pass"][0];
                            }
                            if(!empty($this->request->params["pass"][1])){
                                echo "/".$this->request->params["pass"][1];
                            }
                        
                        ?>" class="sidebar-form" method="GET">
                    <?php endif ; ?>
                        <div class="filtr--block">
                            <div class="filtr--burger">
                                <span></span>
                            </div>  
                            <span class="filtr--block__text">фильтр</span>
                        </div>
                        <div class="date--data"></div>
                        <div class="catalog-form-block">
                            <span>Сортировать по:</span>
                            <select name="price__order" id="" class="select--form">
                                <option value="">Выберите элемент</option>
                                <option value="1" class="btn--order-price" >Возрастанию цены</option>
                                <option value="2" class="btn--order-price">Убыванию  цены</option>
                            </select>
                        </div>
                        <button class="form--price" type="submit" style="display:none;"></button>
                    </form>

                    <div class="catalog-cards">
                        <?php foreach($products as $item) : ?>
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
                                <div class="btns-flex-bottom">
                                     <a data-id="<?= $item["Product"]["id"] ?>" class="cards-btn btn--productsa"   data-img="/img/products/thumbs/<?= $item["Product"]["img"] ?>" data-title="<?= $item["Product"]["title"] ?>" data-price="<?= $item["Product"]["price"] ?> data-code="<?= $item["Product"]["code"] ?>"  data-brand="<?= $item["Product"]["brand"] ? $this->Common->get_from_BrandByid($item["Product"]["brand"]) : "Не указано" ?>" >
                                       
                                                
                                   
                                          
                                     </a>
                                         
                                      <a data-id="<?= $item["Product"]["id"] ?>" class="cards-btn minusa cards--minusa"></a>                 
                                </div>
                   
                            </div>
                        <?php endforeach ; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="pagi">
            <div class="pages">
                
                </div>
                <div class="flex-pagi">
                    <?php echo $this->Paginator->first('< Назад'); ?>
                    <ul class="flex-pagi__item">
                        <?php echo $this->Paginator->numbers(
                            array(
                                'separator' => '',
                                'tag' => 'li',
                                'modulus' => 4
                                )
                        ); ?>
                    </ul>
                    <?php echo $this->Paginator->last('Вперед >'); ?>
                </div>
            </div>		
        </div>
   
      

    