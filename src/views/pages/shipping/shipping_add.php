<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form class="formAddContest" method="POST" action="<?php echo $base; ?>/shipping/add">
    <div>
        <label class="labelTitulos" >ID</label>
        <input class="form-control" type="number" name="id_shipping" id="id_shipping" />
    </div>
    <div>
        <label class="labelTitulos">NOME</label>
        <input class="form-control" type="text" name="name_shipping" id="name_shipping" />
    </div>
    <div>
        <label class="labelTitulos">E-MAILS</label>
        <small>Coloque todos os emails separados por ",".</small>
        <textarea class="form-control areaTexto" name="emails_shipping" id="emails_shipping" ></textarea>
    </div>
    <div>
        <label class="labelTitulos">STATUS</label>
        <select class="formSelect" name="active_shipping" id="active_shipping">
            <option value="Y" >ATIVO</option>
            <option value="N" >INATIVO</option>
        </select>
    </div>
        <input class="btn btn-secondary btn-sm btnMain" type="submit" value="Adicionar" />
        <a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/shipping">VOLTAR</a>
    </div>
</form>
<?php $render('footer'); ?>