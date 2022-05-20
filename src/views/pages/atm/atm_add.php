<?php $render('header');  ?>
<h1><?php echo $title_page;  ?></h1>
<form method="POST" action="<?php echo $base; ?>/atm/add">
    <div>
        <label>ID</label>
        <input type="number" name="id_atm" id="id_atm" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_atm" id="name_atm" />
    </div>
    <div>
        <label>NOME REDUZIDO</label>
        <input type="text" name="shortened_atm" id="shortened_atm" />
    </div>
    <div>
        <label>TRANSPORTADORA</label>
        <select name="id_treasury" id="id_treasury">
            <?php foreach($shippings as $shipping): ?>
                <option value="<?php echo $shipping['id_shipping']; ?>" ><?php echo $shipping['name_shipping']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>CONFIGURAÇÃO DOS CASSETES</label>
        <div>
            <label>CASSETE A</label>
            <select name="cass_A" id="cass_A">
                <option value="10" selected>R$ 10,00</option>
                <option value="20">R$ 20,00</option>
                <option value="50">R$ 50,00</option>
                <option value="100">R$ 100,00</option>
            </select>
        </div>
         <div>
            <label>CASSETE B</label>
            <select name="cass_B" id="cass_B">
                <option value="10" >R$ 10,00</option>
                <option value="20" selected>R$ 20,00</option>
                <option value="50">R$ 50,00</option>
                <option value="100">R$ 100,00</option>
            </select>
        </div>
         <div>
            <label>CASSETE C</label>
            <select name="cass_C" id="cass_C">
                <option value="10" >R$ 10,00</option>
                <option value="20">R$ 20,00</option>
                <option value="50" selected>R$ 50,00</option>
                <option value="100">R$ 100,00</option>
            </select>
        </div>
         <div>
            <label>CASSETE D</label>
            <select name="cass_D" id="cass_D">
                <option value="10" >R$ 10,00</option>
                <option value="20">R$ 20,00</option>
                <option value="50">R$ 50,00</option>
                <option value="100" selected>R$ 100,00</option>
            </select>
        </div>
    </div>
    <div>
        <input type="submit" value="Adicionar" />
        <a href="<?php echo $base; ?>/atm">[VOLTAR]</a>
    </div>
</form>

<?php $render('footer');  ?>