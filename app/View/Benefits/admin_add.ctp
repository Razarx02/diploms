<h1>Добавить преимущество</h1>
 <?php 
    echo $this->Form->create('Benefit', array('type' => 'file'));
    echo $this->Form->input('title', array('label' => 'Название'));
    echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
    echo $this->Form->end('Добавить');
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

