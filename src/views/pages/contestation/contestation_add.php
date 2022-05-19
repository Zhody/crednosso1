<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form method="POST" enctype='multipart/form-data' action="<?php echo $base; ?>/contestation/add">
    <div>
        <label>NUMERO CONTESTAÇÃO</label>
        <input type="number" name="num_contestation" id="num_contestation" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_contestation" id="name_contestation" />
    </div>
    <div>
        <label>CARTAO</label>
        <input type="number" name="card_contestation" id="card_contestation" />
    </div>
    <div>
        <label>DATA CONTESTAÇÃO</label>
        <input type="date" name="date_contestation" id="date_contestation" />
    </div>
    <div>
        <label>TIPO DE CONTESTAÇÃO</label>
       <select name="type_contestation" id="type_contestation">
           <option type="mateus">MATEUS</option>
           <option type="bradesco">BRADESCO</option>
       </select>
    </div>
    <div>
        <label>IMAGENS</label>
        <input type="file" name="files_contestation[]" id="files_contestation" multiple />
    </div>
    <div>
        <input type="submit" value="ADICIONAR" />
        <a href="<?php echo $base; ?>/contestation">[VOLTAR]</a>
    </div>
</form>
<?php $render('footer'); ?>