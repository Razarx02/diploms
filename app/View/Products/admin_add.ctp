<h1>Добавить</h1>
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
				<option value="<?= $item["Subcategory"]["id"] ?>" data-parent="<?= $item["Subcategory"]["category_id"] ?>">   <?= $item["Subcategory"]["title"] ?>   </option>
			<?php endforeach ; ?>
		</select>
	</div>
	<div class="input select">
		<label for="ProductSubcategoryId">Бренды</label>
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
	echo $this->Form->end('Добавить');
 ?>
 <textarea id="textarea_1" style="display: none !important"> <?= $subcategoriesJson ?> </textarea>
<script>
    CKEDITOR.replace( 'editor' );

	// const categories = document.querySelector("#ProductCategoryId");
	// const dis = document.querySelector("#ProductSubcategoryId");
	// if(dis.selectedIndex == 0) {
	// 	dis.disabled = true;
	
	// }
	// const subcateries = document.querySelectorAll("#ProductSubcategoryId option");
	// categories.onchange = changeFunction;

	// function changeFunction() {
	// 	dis.disabled = false;
	// 	let value = categories.options[categories.selectedIndex].value
	// 	let subHas = false;
	// 	for(let item of subcateries) {
	// 		if( item.getAttribute("data-parent") !=  value ) {
	// 		item.classList.add("noner")
			
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