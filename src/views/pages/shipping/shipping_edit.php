<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form class="formAddContest" method="POST" action="<?php echo $base; ?>/shipping/edit/<?php echo $shipping[0]['id']; ?>">
    <div>
        <label class="labelTitulos">ID</label>
        <input class="form-control" type="number" name="id_shipping" id="id_shipping" value="<?php echo $shipping[0]['id_shipping']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">NOME</label>
        <input class="form-control" type="text" name="name_shipping" id="name_shipping" value="<?php echo $shipping[0]['name_shipping']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">E-MAILS</label>
        <small>Coloque todos os emails separados por ",".</small>
        <textarea class="form-control areaTexto" name="emails_shipping" id="emails_shipping" ><?php echo $shipping[0]['emails']; ?></textarea>
    </div>
    <div>
        <label class="labelTitulos">STATUS</label>
        <select class="formSelect" name="active_shipping" id="active_shipping">
            <option value="Y" <?php if($shipping[0]['active'] === 'Y'){echo 'selected';} ?>>ATIVO</option>
            <option value="N" <?php if($shipping[0]['active'] === 'N'){echo 'selected';} ?>>INATIVO</option>
        </select>
    </div>
        <input class="btn btn-secondary btn-sm btnMain" type="submit" value="Salvar" />
        <a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/shipping">VOLTAR</a>
    </div>
</form>
<?php $render('footer'); ?>