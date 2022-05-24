<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form class="formAddContest" method="POST" enctype='multipart/form-data' action="<?php echo $base; ?>/contestation/add">
    <div>
        <label class="labelTitulos">NUMERO CONTESTAÇÃO</label>
        <input class="form-control" type="number" name="num_contestation" id="num_contestation" />
    </div>
    <div>
        <label class="labelTitulos">NOME</label>
        <input class="form-control" type="text" name="name_contestation" id="name_contestation" />
    </div>
    <div>
        <label class="labelTitulos">CARTAO</label>
        <input class="form-control" type="number" name="card_contestation" id="card_contestation" />
    </div>
    <div>
        <label class="labelTitulos">DATA CONTESTAÇÃO</label>
        <input class="form-control" type="date" name="date_contestation" id="date_contestation" />
    </div>
    <div>
        <label class="labelTitulos">TIPO DE CONTESTAÇÃO</label>
       <select class="formSelect" name="type_contestation" id="type_contestation">
           <option type="mateus">MATEUS</option>
           <option type="bradesco">BRADESCO</option>
       </select>
    </div>
    <div>
        <label lass="labelTitulos">IMAGENS</label>
        <input class="btn btn-secondary btn-sm btnMain" type="file" name="files_contestation[]" id="files_contestation" multiple />
    </div>
    <div>
        <input class="btn btn-secondary btn-sm btnMain" type="submit" value="ADICIONAR" />
        <a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/contestation">VOLTAR</a>
    </div>
</form>
<?php $render('footer'); ?>