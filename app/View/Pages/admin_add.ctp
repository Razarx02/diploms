<h1>Добавление информаций</h1>
 <?php 
    echo $this->Form->create('Page', array('type' => 'file'));
	echo $this->Form->input('name', array('label' => 'Название'));
	echo $this->Form->input('title', array('label' => 'Текст'));
	// echo $this->Form->input('subtitle', array('label' => 'Подзаголовок', 'id' => 'editor_1'));
	// echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
	// echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
	// echo $this->Form->input('date', array('label' => 'Дата', 'type' => 'date'));
	// echo $this->Form->input('meta_title', array('label' => 'Мета заголовок'));
	// echo $this->Form->input('meta_description', array('label' => 'Мета описание'));
	// echo $this->Form->input('meta_keywords', array('label' => 'Ключевые слова'));
	echo $this->Form->end('Добавить');
 ?>

<script>
    CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor_1' );
</script>