<?php $render('header');  ?>
<h1><?php echo $title_page; /*print_r($shippings);*/ ?></h1>
<div>
    <a href="<?php echo $base; ?>/request/search">[TELA DE PESQUISA]</a>
</div>
<form method="POST" action="<?php echo $base; ?>/request/view/edit/<?php echo $request[0]['id']; ?>">
    <div>
        <label>ID</label>
        <input type="number" readonly name="id_requet" id="id_request" value="<?php echo $request[0]['id']; ?>" />
    </div>
    <div>
        <label>TIPO DE OPERAÇÃO</label>
        <select name="operation_type" id="operation_type" class="element" >
            <?php foreach($operation_types as $operation): ?>
                <option value="<?php echo $operation['id']; ?>"
                    <?php if($operation['id'] == $request[0]['id_operation_type']){echo 'selected';} ?>
                ><?php echo $operation['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>ORIGEM</label>
        <div>
            <input type="number"  id="input_id_origin" attr-value="origin" onchange="getShippingById(this)"  value="<?php echo $request[0]['id_origin']; ?>" />
            <select name="id_origin" id="id_origin" class="element">
                <?php foreach($shippings as $shipping): ?>
                    <option value="<?php echo $shipping['id_shipping']; ?>"
                        <?php if($shipping['id_shipping'] == $request[0]['id_origin']){ echo 'selected';} ?>
                    ><?php echo $shipping['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label>DESTINO</label>
        <div>
            <input type="number"  id="input_id_destiny" attr-value="destiny" onchange="getShippingById(this)" value="<?php echo $request[0]['id_destiny']; ?>" />
            <select name="id_destiny" id="id_destiny" class="element" >
                <option value="0"></option>
                <?php foreach($shippings as $shipping): ?>
                    <option value="<?php echo $shipping['id_shipping']; ?>"
                    <?php if($shipping['id_shipping'] == $request[0]['id_destiny']){ echo 'selected';} ?>
                    ><?php echo $shipping['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div>
        <label>DATA</label>
        <input type="date" name="date_request" id="date_request" class="element" value="<?php echo $request[0]['date_request']; ?>" />
    </div>
    <div>
        <label>TIPO DE ORDEM</label>
        <select name="order_request" id="order_request" class="element">
            <?php foreach($order_types as $order): ?>
                <option value="<?php echo $order['id']; ?>"
                    <?php if($order['id'] == $request[0]['id_order_type']){ echo 'selected';} ?>
                ><?php echo $order['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>OBSERVAÇÃO</label>
        <textarea name="note_request" id="note_request"><?php echo $request[0]['note']; ?></textarea>
    </div>
    <div>
        <label>COMPOSIÇÃO PEDIDO</label>
        <div>
            <label>R$ 10,00</label>
            <input type="number" class="element" onchange="generateValue(this)" attr-value="10" name="qt_10" id="qt_10" placeholder="0" value="<?php echo $request[0]['qt_10']; ?>" />
            <label>R$</label>
            <input type="text" class="input_text" readonly name="qt_text_10" id="qt_text_10" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 20,00</label>
            <input type="number" class="element" onchange="generateValue(this)" attr-value="20" name="qt_20" id="qt_20" placeholder="0" value="<?php echo $request[0]['qt_20']; ?>" />
            <label>R$</label>
            <input type="text" class="input_text" readonly name="qt_text_20" id="qt_text_20" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 50,00</label>
            <input type="number" class="element" onchange="generateValue(this)" attr-value="50" name="qt_50" id="qt_50" placeholder="0" value="<?php echo $request[0]['qt_50']; ?>" />
            <label>R$</label>
            <input type="text" class="input_text" readonly name="qt_text_50" id="qt_text_50" placeholder="0,00" /> 
        </div>
         <div>
            <label>R$ 100,00</label>
            <input type="number" class="element" onchange="generateValue(this)" attr-value="100" name="qt_100" id="qt_100" placeholder="0" value="<?php echo $request[0]['qt_100']; ?>" />
            <label>R$</label>
            <input type="text" class="input_text" readonly name="qt_text_100" id="qt_text_100" placeholder="0,00" /> 
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
        <input type="submit" value="Alterar" />
    </div>
</form>
<?php $render('footer');  ?>