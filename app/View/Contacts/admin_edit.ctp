<h1>Редактировать</h1>
 <?php 
    echo $this->Form->create('Contact', array('type' => 'file'));

	echo $this->Form->input('name', array('label' => 'Название'));
    echo $this->Form->input('text', array('label' => 'Текст', 'type'=> 'textarea'));
    // echo $this->Form->input('type', array('label' => 'Тип'));

	echo $this->Form->end('Сохранить');
 ?>

<script>
    CKEDITOR.replace( 'editor' );
</script>