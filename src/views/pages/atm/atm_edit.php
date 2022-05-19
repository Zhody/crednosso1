<?php $render('header');  ?>
<h1><?php echo $title_page;  ?></h1>
<form>
    <div>
        <label>ID</label>
        <input type="number" name="id_atm" id="id_atm" value="<?php echo $atm[0]['id_atm']; ?>" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_atm" id="name_atm" value="<?php echo $atm[0]['name_atm']; ?>" />
    </div>
    <div>
        <label>NOME REDUZIDO</label>
        <input type="text" name="shortened_atm" id="shortened_atm" value="<?php echo $atm[0]['shortened_name_atm']; ?>" />
    </div>
    <div>
        <label>TRANSPORTADORA</label>
        <select name="id_treasury" id="id_treasury">
            <?php foreach($shippings as $shipping): ?>
                <option value="<?php echo $shipping['id_shipping']; ?>" <?php if($shipping['id_shipping'] == $atm[0]['id_treasury']){ echo 'selected';} ?> >
                <?php echo $shipping['name_shipping']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>STATUS</label>
        <select name="status_atm" id="status_atm">
                <option value="Y" <?php if($atm[0]['status'] == 'Y'){ echo 'selected';} ?> >ATIVO</option>
                <option value="N" <?php if($atm[0]['status'] == 'N'){ echo 'selected';} ?> >INATIVO</option>
        </select>
    </div>
    <div>
        <label>CONFIGURAÇÃO CASSETES</label>
        <div>
            <label>CASSETE A</label>
            <select name="cass_A" id="cass_A">
                <option value="10" <?php if($atm[0]['cass_A'] == 10){echo 'selected';} ?>>R$ 10,00</option>
                <option value="20" <?php if($atm[0]['cass_A'] == 20){echo 'selected';} ?>>R$ 20,00</option>
                <option value="50" <?php if($atm[0]['cass_A'] == 50){echo 'selected';} ?>>R$ 50,00</option>
                <option value="100" <?php if($atm[0]['cass_A'] == 100){echo 'selected';} ?>>R$ 100,00</option>
            </select>
        </div>
        <div>
            <label>CASSETE B</label>
            <select name="cass_B" id="cass_B">
                <option value="10" <?php if($atm[0]['cass_B'] == 10){echo 'selected';} ?>>R$ 10,00</option>
                <option value="20" <?php if($atm[0]['cass_B'] == 20){echo 'selected';} ?>>R$ 20,00</option>
                <option value="50" <?php if($atm[0]['cass_B'] == 50){echo 'selected';} ?>>R$ 50,00</option>
                <option value="100" <?php if($atm[0]['cass_B'] == 100){echo 'selected';} ?>>R$ 100,00</option>
            </select>
        </div>
        <div>
            <label>CASSETE C</label>
            <select name="cass_C" id="cass_C">
                <option value="10" <?php if($atm[0]['cass_C'] == 10){echo 'selected';} ?>>R$ 10,00</option>
                <option value="20" <?php if($atm[0]['cass_C'] == 20){echo 'selected';} ?>>R$ 20,00</option>
                <option value="50" <?php if($atm[0]['cass_C'] == 50){echo 'selected';} ?>>R$ 50,00</option>
                <option value="100" <?php if($atm[0]['cass_C'] == 100){echo 'selected';} ?>>R$ 100,00</option>
            </select>
        </div>
        <div>
            <label>CASSETE D</label>
            <select name="cass_D" id="cass_D">
                <option value="10" <?php if($atm[0]['cass_D'] == 10){echo 'selected';} ?>>R$ 10,00</option>
                <option value="20" <?php if($atm[0]['cass_D'] == 20){echo 'selected';} ?>>R$ 20,00</option>
                <option value="50" <?php if($atm[0]['cass_D'] == 50){echo 'selected';} ?>>R$ 50,00</option>
                <option value="100" <?php if($atm[0]['cass_D'] == 100){echo 'selected';} ?>>R$ 100,00</option>
            </select>
        </div>
    </div>
    <div>
        <input type="submit" value="ALTERAR" />
        <a href="<?php echo $base; ?>/atm">[VOLTAR]</a>
    </div>
</form>
<?php $render('footer');  ?>