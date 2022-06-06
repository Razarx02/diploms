<section class="main">
    <div class="breadcrumbs-parent">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="/"> Главная </a></li>
                <li><a href="/categories"> Каталог </a></li>
                <li><a href="/categories/<?= $categories["Category"]["id"] ?>">  <?= $categories["Category"]["title"] ?> </a></li>
            </ul>
            <form action="/products/allsite" class="search-from-site" method="GET">
                <input type="text" name="text" placeholder="Поиск в Магазине">
                <button class="search-btn" type="submit"></button>
            </form>
        </div>
    </div>
</section>
<section class="section category-section last-section">
        <div class="container">
            <div class="category-block">
                <?php foreach($subcategories as $item) : ?>
                    <a href="/products/subview/<?= $item["Subcategory"]["id"] ?>" class="podcategory">
                        <div class="podcategory-img">
                            <img class="<?= $item["Subcategory"]["img_type"] ?>" src="/img/subcategories/thumbs/<?= $item["Subcategory"]["img"] ?>" alt="">
                        </div>
                        <div class="podcategory__title"><?= $item["Subcategory"]["title"] ?></div>
                    </a>
                <?php endforeach ; ?>
            </div>
        </div>
    </section>


