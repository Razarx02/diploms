<h1>Редактировать бренд</h1>
 <?php 
    echo $this->Form->create('Brand', array('type' => 'file'));
    echo $this->Form->input('title', array('label' => 'Название'));
    echo $this->Form->input('href', array('label' => 'Ссылка на сайт бренда', 'type' => 'textarea'));
    // echo $this->Form->input('sub_title', array('label' => 'Краткое содержание'));
    echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
    echo $this->Form->end('Сохранить');
 ?>

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

