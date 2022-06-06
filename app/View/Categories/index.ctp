<section class="main">
        <div class="breadcrumbs-parent">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/"> Главная </a></li>
                    <li><a href="/categories"> Каталог </a></li>
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
    <div class="category-block category-one">
        <?php foreach($categories as $item) : ?>
            <?php if ($this->Common->has_subcategory($item["Category"]["id"])) : ?>
                <a href="/categories/subcategory/<?= $item["Category"]["id"] ?>" class="allcategorise__item">
                    <img class="<?= $item["Category"]["img_type"]?>" src="/img/categories/thumbs/<?= $item["Category"]["img"] ?>" alt="">
                    <div class="allcategories__item-title cate"> <span>  <?= $item["Category"]["title"] ?>   </span> </div>
                </a>  
            <?php  else : ?>
                <a href="/products/index/<?= $item["Category"]["id"] ?>" class="allcategorise__item">
                    <img class="<?= $item["Category"]["img_type"]?>" src="/img/categories/thumbs/<?= $item["Category"]["img"] ?>" alt="">
                    <div class="allcategories__item-title cate"> <span>  <?= $item["Category"]["title"] ?>   </span> </div>
                </a> 
            <?php endif ; ?>
        <?php endforeach ; ?>
    </div>
    </div>
</section>