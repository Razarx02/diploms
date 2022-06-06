<section class="page contacts-section">
        <div class="container">

            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><a>Контакты</a></li>
            </ul>
            <div class="contacts-block">
                <div class="section__title"> Контакты </div>
                <div class="contacts-iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d417.7094119427905!2d69.57398521391694!3d42.351664604512735!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a3dba7bbcaf63e5!2sZerek%20Bala!5e0!3m2!1sru!2skz!4v1633464321887!5m2!1sru!2skz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="contacts-bottom">
                    <div class="contacts-left">
                        <div class="contacts-text">
                            <a href="<?= $pagesData[3]["Page"]["subtitle"] ?>" target="_blank" title="Ссылка на 2GIZ, адрес Zerek Bala">  <?= $pagesData[3]["Page"]["title"] ?> </a>
                            <a href="tel:+<?= preg_replace('/[^0-9]/', '', $pagesData[2]["Page"]["title"] ) ?>" > <?= $pagesData[2]["Page"]["title"] ?> </a>
                            <a href="mailto:<?= $pagesData[6]["Page"]["title"] ?>"> <?= $pagesData[6]["Page"]["title"] ?> </a>
                        </div>
                        <div class="contacts-fact">
                            <div class="contacts-fact__title">
                                Администратор
                            </div>
                            <a href="tel:+<?= preg_replace('/[^0-9]/', '', $pagesData[4]["Page"]["title"] ) ?>" class="contacts-fact__subtitle">
                                <?= $pagesData[4]["Page"]["title"] ?>
                            </a>
                        </div>
                        <div class="contacts-fact">
                            <div class="contacts-fact__title">
                                Менеджер отдела продаж 
                            </div>
                            <a href="tel:+<?= preg_replace('/[^0-9]/', '', $pagesData[5]["Page"]["title"] ) ?>" class="contacts-fact__subtitle">
                                <?= $pagesData[5]["Page"]["title"] ?>
                            </a>
                        </div>
                    </div>
                    <div class="contacts-right">
                        <div class="contacts-timetable">
                            <div class="contacts-timetable__title">График работы:</div>
                            <div class="contacts-timetable-block">
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Понедельник </span>
                                    <span class="contacts-timetable__value-1"> Выходной </span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Вторник </span>
                                    <span class="contacts-timetable__value-1"> 09:30 - 18:30 </span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Среда </span>
                                    <span class="contacts-timetable__value-1"> 09:30 - 18:30</span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Четверг</span>
                                    <span class="contacts-timetable__value-1"> 09:30 - 18:30 </span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Пятница </span>
                                    <span class="contacts-timetable__value-1"> 09:30 - 18:30 </span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Суббота </span>
                                    <span class="contacts-timetable__value-1"> 10:00 - 18:00 </span>
                                </div>
                                <div class="contacts-timetable__item">
                                    <span class="contacts-timetable__value"> Воскресенье </span>
                                    <span class="contacts-timetable__value-1"> 10:00 - 18:00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>