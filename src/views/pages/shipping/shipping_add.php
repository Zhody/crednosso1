<h1><?php echo $title_page;?></h1>
<form method="POST" action="<?php echo $base; ?>/shipping/add">
    <div>
        <label>ID</label>
        <input type="number" name="id_shipping" id="id_shipping" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_shipping" id="name_shipping" />
    </div>
    <div>
        <label>E-MAILS</label>
        <small>Coloque todos os emails separados por ",".</small>
        <textarea name="emails_shipping" id="emails_shipping" ></textarea>
    </div>
    <div>
        <label>STATUS</label>
        <select name="active_shipping" id="active_shipping">
            <option value="Y" >ATIVO</option>
            <option value="N" >INATIVO</option>
        </select>
    </div>
        <input type="submit" value="Adicionar" />
        <a href="<?php echo $base; ?>/shipping">[VOLTAR]</a>
    </div>
</form>