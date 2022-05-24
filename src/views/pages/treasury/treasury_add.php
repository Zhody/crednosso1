<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<div class="formContest">
<div>
    <div>
        <label class="labelTitulos" >ID TRANSPORTADORA</label>
        <input class="formSaldo" type="text" readonly name="id_treasury" id="id_treasury" value="<?php echo $treasury[0]['id_shipping']; ?>" disabled/>
    </div>
    <div>
        <label  class="labelTitulos" for="name_treasury">NOME TRANSPORTADORA</label>
        <input class="formSaldo" type="text" readonly name="name_treasury" id="name_treasury" value="<?php echo $treasury[0]['name_shipping']; ?>" disabled/>
    </div>
    <div>
        <label class="labelTitulos" >SALDO ATUAL</label>
        <div>
            <label class="labelTitulos" for="value-10">R$ 10,00</label>
            <input class="formSaldo" type="number" readonly attr-value="10" name="value-10" id="value-10" value="<?php echo $treasury[0]['a_10']; ?>" disabled/>
            <label class="labelTitulos labelCifra" >R$</label>
            <input class="formSaldo" type="text" readonly name="value-text-10" id="value-text-10" value="<?php echo number_format(($treasury[0]['a_10']*10), 2); ?>" disabled />
        </div>
        <div>
            <label class="labelTitulos " for="value-20">R$ 20,00</label>
            <input class="formSaldo" type="number" readonly attr-value="20" name="value-20" id="value-20" value="<?php echo $treasury[0]['b_20']; ?>" disabled/>
            <label class="labelTitulos labelCifra" >R$</label>
            <input class="formSaldo" type="text" readonly name="value-text-20" id="value-text-20" value="<?php echo number_format(($treasury[0]['b_20']*20), 2); ?>" disabled/>
        </div>
        <div>
            <label class="labelTitulos" for="value-50">R$ 50,00</label>
            <input class="formSaldo" type="number" readonly attr-value="50" name="value-50" id="value-50" value="<?php echo $treasury[0]['c_50']; ?>" disabled/>
            <label class="labelTitulos labelCifra" >R$</label>
            <input class="formSaldo" type="text" readonly name="value-text-50" id="value-text-50" value="<?php echo number_format(($treasury[0]['c_50']*50), 2); ?>" disabled/>
        </div>
        <div>
            <label class="labelTitulos" for="value-100">R$ 100,00</label>
            <input class="formSaldo" type="number" readonly attr-value="100" name="value-100" id="value-100" value="<?php echo $treasury[0]['d_100']; ?>" disabled/>
            <label class="labelTitulos labelCifra" >R$</label>
            <input class="formSaldo" type="text" readonly name="value-text-100" id="value-text-100" value="<?php echo number_format(($treasury[0]['d_100']*100), 2); ?>" disabled/>
        </div>
        <div>
            <label class="labelTitulos" >TOTAL</label>
            <div>
                <label class="labelTitulos" for="value-total">R$</label>
                <input class="formSaldo" type="text" readonly name="value-total" id="value-total" 
                value="<?php echo number_format((($treasury[0]['a_10']*10)+($treasury[0]['b_20']*20)+($treasury[0]['c_50']*50)+($treasury[0]['d_100']*100)), 2); ?>" disabled/>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="<?php echo $base; ?>/treasury/add/<?php echo $treasury[0]['id_shipping']; ?>">
    <h3>MOVIMENTAÇÃO DE SALDO</h3>
    <div>
        <label class="labelTitulos" >R$ 10,00</label>
        <input class="formSaldo" type="number" attr-value="10" name="value_new_10" id="value_new_10" placeholder="0"  />
        <label class="labelTitulos labelCifra" >R$</label>
        <input class="formSaldo" type="text" readonly name="value_new_text_10" id="value_new_text_10" placeholder="0,00"  disabled/>
    </div>
    <div>
        <label class="labelTitulos" >R$ 20,00</label>
        <input class="formSaldo" type="number" attr-value="20" name="value_new_20" id="value_new_20" placeholder="0"  />
        <label class="labelTitulos labelCifra" >R$</label>
        <input class="formSaldo" type="text" readonly name="value_new_text_20" id="value_new_text_20" placeholder="0,00" disabled/>
    </div>
    <div>
        <label class="labelTitulos" >R$ 50,00</label>
        <input class="formSaldo" type="number" attr-value="50" name="value_new_50" id="value_new_50" placeholder="0"  />
        <label class="labelTitulos labelCifra" >R$</label>
        <input class="formSaldo" type="text" readonly name="value_new_text_50" id="value_new_text_50" placeholder="0,00"  disabled/>
    </div>
    <div>
        <label class="labelTitulos" >R$ 100,00</label>
        <input class="formSaldo" type="number" attr-value="100" name="value_new_100" id="value_new_100" placeholder="0"  />
        <label class="labelTitulos labelCifra" >R$</label>
        <input class="formSaldo" type="text" readonly name="value_new_text_100" id="value_new_text_100" placeholder="0,00"  disabled/>
    </div>
    <div>
        <label class="labelTitulos" >TOTAL</label>
        <div>
            <label class="labelTitulos" >R$</label>
            <input class="formSaldo" type="text" readonly name="value_new_text" id="value_new_text" placeholder="0,00" disabled/>
        </div>
    </div>
    <div>
        <label class="labelTitulos" >TIPO</label>
        <select class="form-select form-select-sm formSelect"name="type_move" id="type_move">
            <option value="adc">ADICIONAR</option>
            <option value="sub">SUBTRAIR</option>
        </select>
    </div>
    <div>
        <input class="btn btn-secondary btn-sm btnMain" type="submit" value="Efetuar" />
    </div>
</form>
</div>
<?php $render('footer'); ?>