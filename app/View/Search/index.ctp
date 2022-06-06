<section class="section page search-section">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs-block">
                <li> <a href="/<?= $lang ?>"><?=__('Главная')?></a></li>
                <li> <a><?=__('Результаты поиска')?></a></li>
            </ul>
        </div>
    </div>

    <div class="container"> 
       <div class="search-block">
           <div class="search__title"><?=__('Результаты поиска')?></div>
           <div class="search-form">
               <form action="/<?= $lang ?>search" method="GET">
                    <div class="form-select">
                        <div class="form__title"><?=__('Выберите город из списка')?>:</div>
                        <select name="city_id" id="">
                            <option value="" <?= ( !isset($_GET['city_id']) || empty($_GET['city_id']) ) ? 'selected' : '' ?> ><?=__('Выберите город')?></option>
                            <?php if( $cities ): ?>
                                <?php foreach( $cities as $city ): ?>
                                    <option value="<?= $city['City']['id'] ?>" <?= ( isset($_GET['city_id']) && !empty($_GET['city_id']) && $_GET['city_id'] == $city['City']['id'] ) ? 'selected' : '' ?>><?= $city['City']['title_' . $l] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-select">
                        <div class="form__title"><?=__('Выберите жилой комплекс из списка')?>:</div>
                        <select name="house_id" id="">
                            <option value="" <?= ( !isset($_GET['house_id']) || empty($_GET['house_id']) ) ? 'selected' : '' ?> ><?=__('Выберите ЖК')?></option>
                            <?php if( $house_list ): ?>
                                <?php foreach( $house_list as $house_item ): ?>
                                    <option value="<?= $house_item['House']['id'] ?>" <?= ( isset($_GET['house_id']) && !empty($_GET['house_id']) && $_GET['house_id'] == $house_item['House']['id'] ) ? 'selected' : '' ?> data-city="<?= $house_item['House']['city_id'] ?>"><?= $house_item['House']['title'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-input form-two">
                        <div class="form__title"><?=__('Площадь кв.м.')?>:</div>
                        <div class="form-flex-input">
                            <input type="text" placeholder="от" name="min_area" value="<?= ( isset($_GET['min_area']) && !empty($_GET['min_area']) ) ? "{$_GET['min_area']}" : '' ?>">
                            <input type="text" placeholder="до" name="max_area" value="<?= ( isset($_GET['max_area']) && !empty($_GET['max_area']) ) ? "{$_GET['max_area']}" : '' ?>">
                        </div>
                    </div>
                    <div class="form-input form-two">
                        <div class="form__title"><?=__('Стоимость')?>:</div>
                        <div class="form-flex-input">
                            <input type="text" placeholder="от" name="price_min" value="<?= ( isset($_GET['price_min']) && !empty($_GET['price_min']) ) ? "{$_GET['price_min']}" : '' ?>">
                            <input type="text" placeholder="до" name="price_max" value="<?= ( isset($_GET['price_max']) && !empty($_GET['price_max']) ) ? "{$_GET['price_max']}" : '' ?>">
                        </div>
                    </div>
                    <div class="form-radio">
                        <div class="form__title"><?=__('Количество комнат')?>:</div>
                        <div class="radioo">
                            <label for="id_1" class="<?= ( isset($_GET['room']) && !empty($_GET['room']) && $_GET['room'] == 1 ) ? 'active-radio' : '' ?>">
                                <div class="value">1</div>
                                <input name="room" type="radio" value="1" id="id_1"> 
                            </label>
                            <label for="id_2" class="<?= ( isset($_GET['room']) && !empty($_GET['room']) && $_GET['room'] == 2 ) ? 'active-radio' : '' ?>">
                                <div class="value">2</div>
                                <input name="room" type="radio" value="2" id="id_2"> 
                            </label>
                            <label for="id_3" class="<?= ( isset($_GET['room']) && !empty($_GET['room']) && $_GET['room'] == 3 ) ? 'active-radio' : '' ?>">
                                <div class="value">3</div>
                                <input name="room" type="radio" value="3" id="id_3"> 
                            </label>
                            <label for="id_4" class="<?= ( isset($_GET['room']) && !empty($_GET['room']) && $_GET['room'] == '4+' ) ? 'active-radio' : '' ?>">
                                <div class="value">4+</div>
                                <input name="room" type="radio" value="4+" id="id_4"> 
                            </label>
                        </div>
                    </div>
                    <div class="form-select">
                        <div class="form__title"><?=__('Выберите класс')?>:</div>
                        <select name="house_class_id" id="">
                            <option value="" <?= ( !isset($_GET['house_class_id']) || empty($_GET['house_class_id']) ) ? 'selected' : '' ?> disabled=""><?=__('Выберите класс')?></option>
                            <?php if( $house_classes ): ?>
                                <?php foreach( $house_classes as $class ): ?>
                                    <option <?= ( isset($_GET['house_class_id']) && !empty($_GET['house_class_id']) && $_GET['house_class_id'] == $class['HouseClass']['id'] ) ? 'selected' : '' ?> value="<?= $class['HouseClass']['id'] ?>"><?= $class['HouseClass']['title_' . $l] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-input form-two">
                        <div class="form__title"><?=__('Этаж')?>:</div>
                        <div class="form-flex-input">
                            <input type="text" placeholder="от" name="floor_min" value="<?= ( isset($_GET['floor_min']) && !empty($_GET['floor_min']) ) ? "{$_GET['floor_min']}" : '' ?>">
                            <input type="text" placeholder="до" name="floor_max" value="<?= ( isset($_GET['floor_max']) && !empty($_GET['floor_max']) ) ? "{$_GET['floor_max']}" : '' ?>">
                        </div>
                    </div>
                    <button class="form__btn" type="submit"><?=__('Начать поиск')?></button>
               </form>
               <?php if( isset($houses) && $houses ): ?>
                   <div class="zhk-cards">
                    <?php foreach( $houses as $house ): ?>
                        <div class="cards__item">
                            <a href="/<?= $lang ?>house/<?= $house['House']['alias'] ?>">
                                <img src="/img/houses/<?= $house['House']['img'] ?>" alt="">
                            </a>
                            
                           <div class="cards-center">
                               <div class="cards__title"><?= $house['House']['title'] ?></div>
                               <a class="cards__class" href="/<?= $lang ?>apartments?house_id=<?= $house['House']['id'] ?>"><?=__('Смотреть квартиры')?></a>
                               <div class="cards__class">
                                <?php foreach( $house_classes as $class ): ?>
                                    <?php if( $class['HouseClass']['id'] == $house['House']['house_class_id'] ): ?>
                                        <?= $class['HouseClass']['title_' . $l] ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                               </div>
                           </div>
                           <div class="cards-bottom">
                               <div class="cards__adress"><?= $house['House']['address'] ?></div>
                               <div class="cards__price"><?= number_format($house['House']['price'], 0, '.', ' ') ?> тг / кв.м</div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                   </div>

               <?php elseif( isset($apartments) && $apartments ): ?>

                <div class="zhk-cards">
                    <?php foreach( $apartments as $item ): ?>
                        <div class="cards__item">
                            <a href="/<?= $lang ?>apartment/<?= $item['Apartment']['id'] ?>" class="border_a">
                                <img src="/img/apartments/<?= $item['Apartment']['img'] ?>" alt="">
                            </a>
                            <div class="cards-content">
                                <div class="cards-center">
                                    <div class="cards__title"><?= $item['Apartment']['title'] ?></div>
                                </div>
                                <div class="cards-bottom">
                                    <div class="cards__adress views-price-block">от <?= number_format($item['Apartment']['payment'], 0, '.', ' ') ?> <?=__('₸/мес')?></div>
                                    <div class="cards__price"><?= number_format($item['Apartment']['price'], 0, '.', ' ') ?> ₸</div>
                                </div>
                                <div class="views-part">
                                    <div class="views-item">
                                        <div class="views-part__title"><?=__('Этаж')?></div>
                                        <div class="views-part__p"><?= $item['Apartment']['floor'] ?> <?=__('из')?> <?= ($item['House']) ? "{$item['House']['floor']}" : '' ?></div>
                                    </div>
                                    <div class="views-item">
                                        <div class="views-part__title"><?=__('Жилой комплекс')?></div>
                                        <div class="views-part__p"><?= ($item['House']) ? "{$item['House']['title']}" : '' ?></div>
                                    </div>

                                    <div class="views-item">
                                        <div class="views-part__title"><?=__('Площадь')?></div>
                                        <div class="views-part__p"><?= $item['Apartment']['area'] ?> кв. м.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>

                <p><?=__('Ничего не найдено')?>...</p>
            <?php endif; ?>
           </div>
       </div>
    </div>
</section>