<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<div>
    <div>
        <label>ID TRANSPORTADORA</label>
        <input type="text" readonly name="id_treasury" id="id_treasury" value="<?php echo $treasury[0]['id_shipping']; ?>" />
    </div>
    <div>
        <label>NOME TRANSPORTADORA</label>
        <input type="text" readonly name="name_treasury" id="name_treasury" value="<?php echo $treasury[0]['name_shipping']; ?>" />
    </div>
    <div>
        <label>SALDO ATUAL</label>
        <div>
            <label>R$ 10,00</label>
            <input type="number" readonly attr-value="10" name="value-10" id="value-10" value="<?php echo $treasury[0]['a_10']; ?>" />
            <label>R$</label>
            <input type="text" readonly name="value-text-10" id="value-text-10" value="<?php echo number_format(($treasury[0]['a_10']*10), 2); ?>" />
        </div>
        <div>
            <label>R$ 20,00</label>
            <input type="number" readonly attr-value="20" name="value-20" id="value-20" value="<?php echo $treasury[0]['b_20']; ?>" />
            <label>R$</label>
            <input type="text" readonly name="value-text-20" id="value-text-20" value="<?php echo number_format(($treasury[0]['b_20']*20), 2); ?>" />
        </div>
        <div>
            <label>R$ 50,00</label>
            <input type="number" readonly attr-value="50" name="value-50" id="value-50" value="<?php echo $treasury[0]['c_50']; ?>" />
            <label>R$</label>
            <input type="text" readonly name="value-text-50" id="value-text-50" value="<?php echo number_format(($treasury[0]['c_50']*50), 2); ?>" />
        </div>
        <div>
            <label>R$ 100,00</label>
            <input type="number" readonly attr-value="100" name="value-100" id="value-100" value="<?php echo $treasury[0]['d_100']; ?>" />
            <label>R$</label>
            <input type="text" readonly name="value-text-100" id="value-text-100" value="<?php echo number_format(($treasury[0]['d_100']*100), 2); ?>" />
        </div>
        <div>
            <label>TOTAL</label>
            <div>
                <label>R$</label>
                <input type="text" readonly name="value-total" id="value-total" 
                value="<?php echo number_format((($treasury[0]['a_10']*10)+($treasury[0]['b_20']*20)+($treasury[0]['c_50']*50)+($treasury[0]['d_100']*100)), 2); ?>" />
            </div>
        </div>
    </div>
</div>
<form method="POST" action="<?php echo $base; ?>/treasury/add/<?php echo $treasury[0]['id_shipping']; ?>">
    <h3>MOVIMENTAÇÃO DE SALDO</h3>
    <div>
        <label>R$ 10,00</label>
        <input type="number" attr-value="10" name="value_new_10" id="value_new_10" placeholder="0"  />
        <label>R$</label>
        <input type="text" readonly name="value_new_text_10" id="value_new_text_10" placeholder="0,00"  />
    </div>
    <div>
        <label>R$ 20,00</label>
        <input type="number" attr-value="20" name="value_new_20" id="value_new_20" placeholder="0"  />
        <label>R$</label>
        <input type="text" readonly name="value_new_text_20" id="value_new_text_20" placeholder="0,00"  />
    </div>
    <div>
        <label>R$ 50,00</label>
        <input type="number" attr-value="50" name="value_new_50" id="value_new_50" placeholder="0"  />
        <label>R$</label>
        <input type="text" readonly name="value_new_text_50" id="value_new_text_50" placeholder="0,00"  />
    </div>
    <div>
        <label>R$ 100,00</label>
        <input type="number" attr-value="100" name="value_new_100" id="value_new_100" placeholder="0"  />
        <label>R$</label>
        <input type="text" readonly name="value_new_text_100" id="value_new_text_100" placeholder="0,00"  />
    </div>
    <div>
        <label>TOTAL</label>
        <div>
            <label>R$</label>
            <input type="text" readonly name="value_new_text" id="value_new_text" placeholder="0,00" />
        </div>
    </div>
    <div>
        <label>TIPO</label>
        <select name="type_move" id="type_move">
            <option value="adc">ADICIONAR</option>
            <option value="sub">SUBTRAIR</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Efetuar" />
    </div>
</form>
<?php $render('footer'); ?>