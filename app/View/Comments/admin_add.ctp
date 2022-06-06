<h1>Комментарии</h1>
 <?php 
    echo $this->Form->create('Comment', array('type' => 'file'));

	// echo $this->Form->input('title', array('label' => 'Заголовок'));
    echo $this->Form->input('text', array('label' => 'Текст', 'id' => 'editor'));
	// echo $this->Form->input('short_desc', array('label' => 'Краткое описание'));
	// echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
	// echo $this->Form->input('link', array('label' => 'Ссылка', 'type' => 'title'));
    // echo $this->Form->input('href', array('label' => 'Адрес', 'type' => 'title'));
    // echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
	// echo $this->Form->input('date', array('label' => 'Дата', 'type' => 'date'));
	// echo $this->Form->input('meta_title', array('label' => 'Мета заголовок'));
	// echo $this->Form->input('meta_description', array('label' => 'Мета описание'));
	// echo $this->Form->input('meta_keywords', array('label' => 'Ключевые слова'));
	echo $this->Form->end('Добавить');
 ?>

<script>
    CKEDITOR.replace( 'editor' );
</script>