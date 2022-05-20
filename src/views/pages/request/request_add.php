<?php $render('header');  ?>
<h1><?php echo $title_page; ?></h1>
<form method="POST" action="<?php echo $base; ?>/request/add">
    <div>
        <label>TIPO DE OPERAÇÃO</label>
        <select name="operation_type" id="operation_type">
            <?php foreach($operation_types as $operation): ?>
                <option value="<?php echo $operation['id']; ?>"><?php echo $operation['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>ORIGEM</label>
        <div>
            <input type="number"  id="input_id_origin" attr-value="search_shipping" />
            <select name="id_origin" id="id_origin">
                <?php foreach($shippings as $shipping): ?>
                    <option value="<?php echo $shipping['id_shipping']; ?>"><?php echo $shipping['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label>DESTINO</label>
        <div>
            <input type="number"  id="input_id_destiny" attr-value="search_shipping" />
            <select name="id_destiny" id="id_destiny">
                <option value="null"></option>
                <?php foreach($shippings as $shipping): ?>
                    <option value="<?php echo $shipping['id_shipping']; ?>"><?php echo $shipping['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label>DATA</label>
        <input type="date" name="date_request" id="date_request" />
    </div>
    <div>
        <label>TIPO DE ORDEM</label>
        <select name="order_request" id="order_request">
            <?php foreach($order_types as $order): ?>
                <option value="<?php echo $order['id']; ?>"><?php echo $order['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>OBSERVAÇÃO</label>
        <textarea name="note_request" id="note_request"></textarea>
    </div>
    <div>
        <label>COMPOSIÇÃO PEDIDO</label>
        <div>
            <label>R$ 10,00</label>
            <input type="number" onchange="generateValue(this)" attr-value="10" name="qt_10" id="qt_10" placeholder="0" />
            <label>R$</label>
            <input type="text" readonly name="qt_10_text" id="qt_10_text" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 20,00</label>
            <input type="number" onchange="generateValue(this)" attr-value="20" name="qt_20" id="qt_20" placeholder="0" />
            <label>R$</label>
            <input type="text" readonly name="qt_20_text" id="qt_20_text" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 50,00</label>
            <input type="number" onchange="generateValue(this)" attr-value="50" name="qt_50" id="qt_50" placeholder="0" />
            <label>R$</label>
            <input type="text" readonly name="qt_50_text" id="qt_50_text" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 100,00</label>
            <input type="number" onchange="generateValue(this)" attr-value="100" name="qt_100" id="qt_100" placeholder="0" />
            <label>R$</label>
            <input type="text" readonly name="qt_100_text" id="qt_100_text" placeholder="0,00" /> 
        </div>
        <div>
            <label>VALOR TOTAL</label>
            <div>
                <label>R$</label>
                <input type="text" readonly name="value_total" id="value_total" />
            </div>
        </div>
    </div>
    <div>
        <a href="#" onclick="saveAndConitnueRequest()">[SALVAR E CONTINUAR]</a>
        <input type="submit" value="SALVAR E FINALIZAR" />
    </div>
</form>
<?php $render('footer'); ?>