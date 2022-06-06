<h1>Редактировать </h1>
 <?php 
    echo $this->Form->create('Category', array('type' => 'file'));
    echo $this->Form->input('title', array('label' => 'Название'));
    // echo $this->Form->input('sub_title', array('label' => 'Краткое содержание', 'type' => 'textarea'));
    // echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));

    // $options = array('cover' => "cover - Рекомендуется выбирать этот пункт, если ваша картинка в формате jpg/jpeg", 'contain' => 'contain - Рекомендуется выбирать этот пункт, если ваша картинка в формате png');
    // $attributes = array('legend' => "Способы отображения картинок ");
    // echo $this->Form->radio('img_type', $options, $attributes);
	
	echo $this->Form->end('Сохранить');
 ?>

<h1>Подкатегорий</h1>
<hr>
<br>
<a class="btn btn--add" href="/admin/categories/subcategoryadd/<?= $id ?>"> Добавить </a>
<br>
<br>
<table class="table border">
    <thead>
    <tr>
        <th>id</th>
        <th>Название</th>
        <th>Фото</th>
        <th>Операции</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($subcategories as $item) : ?>
        <?php if($item["Subcategory"]["category_id"] == $id) :?>
            <tr>
                <td><?=$item['Subcategory']['id']; ?></td>
                <td> <?=$item['Subcategory']['title']; ?> </td>
                <td> <img src="/img/subcategories/thumbs/<?= $item["Subcategory"]["img"] ?>" style="max-width:180px" alt=""> </td>
                
                <td class="text-middle py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                    <div class="news_del" style="margin-left: 15px">  
                    <a class="btn btn-danger btn-sm" href="/admin/categories/subcategoryedit/<?php echo $item['Subcategory']['id'] ?>">Редактировать</a>
                        <?php echo $this->Form->postLink('Удалить', "/admin/categories/subcategorydelete/{$item['Subcategory']['id']}", array('confirm' => 'Подтвердите удаление','class' => 'btn btn-danger btn-sm')); ?>
                    </div> 
                    </div>
                </td>
            </tr>
        <?php endif ; ?>
    <?php endforeach; ?>
    </tbody>
</table>


<script>
    CKEDITOR.replace( 'editor' );
</script>
<style>
    fieldset legend {
        color:#ee7822;
    }
    input[type=radio] {
        width: 10px;
        margin:0px;
    margin-right: 15px;
    height: 20px;
    }
</style>


