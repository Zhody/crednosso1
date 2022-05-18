<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form method="POST" action="<?php echo $base; ?>/shipping/edit/<?php echo $shipping[0]['id']; ?>">
    <div>
        <label>ID</label>
        <input type="number" name="id_shipping" id="id_shipping" value="<?php echo $shipping[0]['id_shipping']; ?>" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_shipping" id="name_shipping" value="<?php echo $shipping[0]['name_shipping']; ?>" />
    </div>
    <div>
        <label>E-MAILS</label>
        <small>Coloque todos os emails separados por ",".</small>
        <textarea name="emails_shipping" id="emails_shipping" ><?php echo $shipping[0]['emails']; ?></textarea>
    </div>
    <div>
        <label>STATUS</label>
        <select name="active_shipping" id="active_shipping">
            <option value="Y" <?php if($shipping[0]['active'] === 'Y'){echo 'selected';} ?>>ATIVO</option>
            <option value="N" <?php if($shipping[0]['active'] === 'N'){echo 'selected';} ?>>INATIVO</option>
        </select>
    </div>
        <input type="submit" value="Salvar" />
        <a href="<?php echo $base; ?>/shipping">[VOLTAR]</a>
    </div>
</form>
<?php $render('footer'); ?>