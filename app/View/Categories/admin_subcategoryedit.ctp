<h1>Редактировать (Подкатегория)</h1>
 <?php 
    echo $this->Form->create('Subcategory', array('type' => 'file'));
    echo $this->Form->input('title', array('label' => 'Название'));
    // echo $this->Form->input('sub_title', array('label' => 'Краткое содержание', 'type' => 'textarea'));
    // echo $this->Form->input('img', array('label' => 'Картинка', 'type' => 'file'));
    // // echo $this->Form->input('category_id',array('type'=>'hidden','value' => $id)); 
    
    // $options = array('cover' => "cover - Рекомендуется выбирать этот пункт, если ваша картинка в формате jpg/jpeg", 'contain' => 'contain - Рекомендуется выбирать этот пункт, если ваша картинка в формате png');
    // $attributes = array('legend' => "Способы отображения картинок ");
    // echo $this->Form->radio('img_type', $options, $attributes);
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