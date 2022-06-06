<h1>Редактировать</h1>
 <?php 
    echo $this->Form->create('Product', array('type' => 'file'));

	echo $this->Form->input('title', array('label' => 'Заголовок'));
    echo $this->Form->input('text', array('label' => 'Текст', 'id' => 'editor'));
	echo $this->Form->input('code', array('label' => 'Код продукта (Если есть)' ));
	echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
	$options = array('cover' => "cover - Рекомендуется выбирать этот пункт, если ваша картинка в формате jpg/jpeg", 'contain' => 'contain - Рекомендуется выбирать этот пункт, если ваша картинка в формате png');
    $attributes = array('legend' => "Способы отображения картинок ");
    echo $this->Form->radio('img_type', $options, $attributes);
	echo '<br>';
	echo $this->Form->input('category_id', array(
        'label' => 'Категории',
		'empty' => 'Выберите категорию',
        'options' => $categoryArray
    ));

	echo $this->Form->input('option', array('label' => 'Акция', 'value' => 'Акция', 'type' => 'checkbox'));
	?>	
	<!-- <input type="number" name="data[Product][cartegory_id]" require="required" > -->
	<div class="input select" id="podcat">
		<label for="ProductSubcategoryId">Подкатегории</label>
		<select name="data[Product][subcategory_id]" id="ProductSubcategoryId">
			<option value="">Выберите подкатегорию</option>
			<?php foreach($subcategoriesdata as $item) : ?>
				<option value="<?= $item["Subcategory"]["id"] ?>" data-parent="<?= $item["Subcategory"]["category_id"] ?>" <?php if($item["Subcategory"]["id"] == $data["Product"]["subcategory_id"]){ echo "selected"; }?> >   <?= $item["Subcategory"]["title"]?>   </option>
			<?php endforeach ; ?>
		</select>
	</div>
	<div class="input select">
		<label for="ProductProduct">Бренды</label>
		<select name="data[Product][brand]" id="ProductBrand">
			<option value="">Выберите бренд</option>
			<?php foreach($brandsdata as $item) : ?>
				<option value="<?= $item["Brand"]["id"] ?>" >  <?= $item["Brand"]["title"] ?>   </option>
			<?php endforeach ; ?>
		</select>
	</div>

	<?php 
	
	echo $this->Form->input('price', array('label' => 'Цена', 'type' => 'number'));
	echo $this->Form->input('old_price', array('label' => 'Старая цена, если есть акция (необязательно)', 'type' => 'number'));
	// echo $this->Form->input('brand', array('label' => 'Бренд', 'type' => 'textarea'));
	echo $this->Form->input('stockin', array('label' => 'В наличий', 'value' => 'Есть в наличий')); 
	?>


<?php 
	// echo $this->Form->input('link', array('label' => 'Ссылка', 'type' => 'title'));
    // echo $this->Form->input('href', array('label' => 'Адрес', 'type' => 'title'));
    // echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
	// echo $this->Form->input('date', array('label' => 'Дата', 'type' => 'date'));
	// echo $this->Form->input('meta_title', array('label' => 'Мета заголовок'));
	// echo $this->Form->input('meta_description', array('label' => 'Мета описание'));
	// echo $this->Form->input('meta_keywords', array('label' => 'Ключевые слова'));
	echo $this->Form->end('Сохранить');
 ?>



<h1>Дополнительные картинки</h1>  
<?php 
// array('type' => 'file', 'controller' => 'advans', 'action' => 'add')
    echo $this->Form->create('Gallery', array(
         'type' => 'file', 
         'controller' => 'galleriesa',
         'action' => 'addimg'
        ));
    echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
    echo $this->Form->input('product_id', array(
        'type' => 'hidden',
        'value' => $id
    ));
	$options = array('cover' => "cover - Рекомендуется выбирать этот пункт, если ваша картинка в формате jpg/jpeg", 'contain' => 'contain - Рекомендуется выбирать этот пункт, если ваша картинка в формате png');
    $attributes = array('legend' => "Способы отображения картинок ");
    echo $this->Form->radio('img_type', $options, $attributes);
    echo $this->Form->end('Добавить');
?>

<table class="table border">
          <thead>
            <tr>
              <th>id</th>
              <th>Картина</th>
             
              <th>Операции</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($images as $item) : ?>
				<?php if($item["Gallery"]["product_id"] == $id ) : ?>
					<tr>
						<td><?=$item['Gallery']['id']; ?></td>
						<td>
						<img src="/img/galleries/thumbs/<?=$item['Gallery']['img']; ?>" style="max-width: 200px" alt="">
						</td>
					
						<td class="text-middle py-0 align-middle">
						<div class="btn-group btn-group-sm">
						
							<div class="news_del" style="margin-left: 15px">  
							<?php echo $this->Form->postLink('Удалить', "/admin/galleries/deletimg/{$item['Gallery']['id']}", array('confirm' => 'Подтвердите удаление','class' => 'btn btn-danger btn-sm')); ?>
							</div> 
						</div>
						</td>
					</tr>
				<?php endif ; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

 <textarea id="textarea_1" style="display: none !important"> <?= $subcategoriesJson ?> </textarea>
<script>
    CKEDITOR.replace( 'editor' );
    const categories = document.querySelector("#ProductCategoryId");
	const dis = document.querySelector("#ProductSubcategoryId");

	const textarea_1 = document.querySelector("#textarea_1");
	const podcat = document.querySelector("#podcat");
	const json_textarea = JSON.parse(textarea_1.value)
	console.log(json_textarea)
	
	// dis.innerHTML = "asdsa"
	changeSubcategory()
	function changeSubcategory() {

		let options = ""
		let check_sub = false

		// categories.value
		for(let item of json_textarea){ 
			if(parseInt(item["Subcategory"]["category_id"]) === parseInt(categories.value) ) {
				check_sub =  true
				options = options + `<option value="${item["Subcategory"]["id"]}" data-parent="${categories.value}">  ${item["Subcategory"]["title"]}   </option>`
			}
		}

		if(check_sub == false) {
		  options = `<option value="" disabled> У текущей категории отсутствует подкатегорий</option>`
		  dis.removeAttribute("required")
		  podcat.classList.remove("required")
		} else {
			dis.setAttribute("required","required")
			podcat.classList.add("required")
		}
		dis.innerHTML = options
		// for(json_textarea
		
	}


	categories.onchange = changeSubcategory	
	// const categories = document.querySelector("#ProductCategoryId");
	// const subcateries = document.querySelectorAll("#ProductSubcategoryId option");
	// categories.onchange = changeFunction;
	// // const dis = document.querySelector("#ProductSubcategoryId");
	// // dis.disabled = true;
	// changeFunction_1()
	// function changeFunction_1() {
	// 	let value = categories.options[categories.selectedIndex].value 
	// 	for(let item of subcateries) {
	// 		// item.removeAttribute("selected");
	// 		if( item.getAttribute("value") !=  value ) {
	// 			item.classList.add("noner")
	// 			item.removeAttribute("selected");
	// 			// item.removeAttribute("selected");
	// 		} else {
	// 			// item.classList.remove("noner")    
	// 			// father = true
	// 		}
	// 	}
	// }
	// function changeFunction() {
	// 	// dis.disabled = false;
	// 	let value = categories.options[categories.selectedIndex].value 
	// 	let father = false ;

	// 	for(let item of subcateries) {
	// 		if( item.getAttribute("value") !=  value ) {
	// 			item.classList.add("noner")
	// 			item.removeAttribute("selected");
	// 		} else {
	// 			item.classList.remove("noner")    
	// 			father = true
	// 		}
	// 	}
		
	// 	if(father == true) {
	// 		dis.disabled = false;
	// 	} else {
	// 		dis.disabled = true;
	// 	}

	// }

	// const categories = document.querySelector("#ProductCategoryId");
	// const dis = document.querySelector("#ProductSubcategoryId");
	// if(dis.selectedIndex == 0) {
	// 	dis.disabled = true;
	
	// }
	// // alert()
	// const subcateries = document.querySelectorAll("#ProductSubcategoryId option");
	// categories.onchange = changeFunction;

	// changeFunction()
	// function changeFunction() {
	// 	dis.disabled = false;
	// 	let value = categories.options[categories.selectedIndex].value
	// 	let subHas = false;
	// 	for(let item of subcateries) {
	// 		if( item.getAttribute("data-parent") !=  value ) {
	// 			item.classList.add("noner")
	// 			item.removeAttribute("selected");
	// 		} else {
	// 			subHas = true
	// 			item.classList.remove("noner")  
	// 		}
	// 	}

	// 	if(subHas == true) {
	// 		dis.setAttribute("required","required")
	// 	} else {
	// 		dis.removeAttribute("required","required")
	// 	}

		
	// }


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
	.noner {
		display: none !important;
	}
	.input.checkbox {
	
	justify-content: flex-start;
	}
</style>