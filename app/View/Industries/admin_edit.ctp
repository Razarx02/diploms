<h1>Редактировать </h1>
 <?php 
    echo $this->Form->create('Industry', array('type' => 'file'));
    echo $this->Form->input('title', array('label' => 'Заголовок'));
    echo $this->Form->input('sub_title', array('label' => 'Краткое содержание', 'type' => 'textarea'));
    echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
    echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
	echo $this->Form->end('Сохранить');
 ?>

<script>
    CKEDITOR.replace( 'editor' );
</script>