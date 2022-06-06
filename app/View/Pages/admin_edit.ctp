<h1>Редактировать</h1>
 <?php 
    echo $this->Form->create('Page', array('type' => 'file'));
	// echo $this->Form->input('name', array('label' => 'Название'));
	if($id == 5) {
		echo '<h3> Рекомендуется загрузить логотип в формате png </h3>';
		echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));	
	} elseif($id == 9) {

		echo $this->Form->input('title', array('label' => 'Aдрес'));
			echo $this->Form->input('subtitle', array('label' => 'Ссылка (2GIS, google map, yandex map)'));
		
	} else {
		echo $this->Form->input('title', array('label' => 'Ссылка или текст'));
	}
	// echo $this->Form->input('subtitle', array('label' => 'Подзаголовок', 'id' => 'editor_1'));
	// echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
	// echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
	// echo $this->Form->input('date', array('label' => 'Дата', 'type' => 'date'));
	// echo $this->Form->input('meta_title', array('label' => 'Мета заголовок'));
	// echo $this->Form->input('meta_description', array('label' => 'Мета описание'));
	// echo $this->Form->input('meta_keywords', array('label' => 'Ключевые слова'));
	echo $this->Form->end('Сохранить');
 ?>

<script>
    CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor_1' );
</script>