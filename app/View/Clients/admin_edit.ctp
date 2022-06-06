<h1>Редактировать данные</h1>
 <?php 
    echo $this->Form->create('Client', array('type' => 'file'));
    echo $this->Form->input('name', array('label' => 'Имя'));
    echo $this->Form->input('surname', array('label' => 'Фамилия'));
    echo $this->Form->input('number', array('label' => 'Номер', "type" =>'tel'));
    echo $this->Form->input('iin', array('label' => 'ИИН', "type" =>'number'));
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

