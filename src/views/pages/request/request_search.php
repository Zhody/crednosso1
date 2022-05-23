<?php $render('header');  ?>
<h1><?php echo $title_page; ?></h1>
<form method="POST" action="<?php echo $base; ?>/request/search" >
    <div>
        <label>DATA INICIAL</label>
        <input type="date" name="date_initial" id="date_initial" value="<?php echo $date_initial; ?>" /> 
    </div>
    <div>
        <label>DATA FINAL</label>
        <input type="date" name="date_final" id="date_final" value="<?php echo $date_final; ?>" />
    </div>
    <div>
        <input type="submit" value="Pesquisar" id="pesquisar" /> 
    </div>
</form>
<div>
    <button  onclick="functionConfirmChek('<?php echo $base; ?>')" >CONFIRMAR TOTAL</button>
    <button  onclick="openModalConfirmParcial('<?php echo $base; ?>')" >CONFIRMAR PARCIAL</button>
</div>
<div id="msg"></div>
<?php if(isset($requests) && $requests !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td></td>
                <td>ID</td>
                <td>STATUS</td>
                <td>LOTE</td>
                <td>ORIGEM</td>
                <td>DESTINO</td>
                <td>DATA</td>
                <td>R$ 10,00</td>
                <td>R$ 20,00</td>
                <td>R$ 50,00</td>
                <td>R$ 100,00</td>
                <td>TOTAL</td>
                <td>VALOR CONF.</td>
                <td>ALTERAÇÃO</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requests as $req): ?>
                <tr>
                    <td>
                        <input type="checkbox" class="setados" name="setados[]" id="setados" value="<?php echo $req['id']; ?>" />
                    </td>
                    <td><?php echo $req['id']; ?></td>
                    <td><?php echo $req['id_status']; ?></td>
                    <td><?php echo $req['id_batch']; ?></td>
                    <td><?php echo $req['id_origin']; ?></td>
                    <td><?php echo $req['id_destiny']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($req['date_request'])); ?></td>
                    <td><?php echo $req['qt_10']; ?></td>
                    <td><?php echo $req['qt_20']; ?></td>
                    <td><?php echo $req['qt_50']; ?></td>
                    <td><?php echo $req['qt_100']; ?></td>
                    <td><?php echo 'R$ '.number_format($req['value_total'], 2, ',', '.'); ?></td>
                    <td><?php echo 'R$ '.number_format($req['confirmed_value'], 2, ',', '.'); ?></td>
                    <td><?php echo $req['change_in_confirmation']; ?></td>
                    <td>AÇOES</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostrar.</p>
<?php endif; ?>
<!--style="display:none;"-->
<div id="modal" class="modal" >
    <div>
        <a title="Fechar" class="fechar" onclick="closeModal()">x</a>
        <h3>CONFIRMAÇÃO PARCIAL</h3>
        <div>
            <label>R$ 10,00</label>
            <input type="number"
                attr-value="10"
                onchange="generateValueInModal(this)"
                id="modal_10"
                name="modal_10"
                class="input_"
                placeholder="0" />
            <label>R$ </label>
            <input type="text" readonly id="modal_text_10" name="modal_text_10" class="input_modal_text" placeholder="0" />
        </div>
        <div>
            <label>R$ 20,00</label>
            <input type="number" attr-value="20" onchange="generateValueInModal(this)" id="modal_20" name="modal_20" class="input_" placeholder="0" />
            <label>R$ </label>
            <input type="text" readonly id="modal_text_20" name="modal_text_20" class="input_modal_text" placeholder="0" />
        </div>
        <div>
            <label>R$ 50,00</label>
            <input type="number" attr-value="50" onchange="generateValueInModal(this)" id="modal_50" name="modal_50" class="input_" placeholder="0" />
            <label>R$ </label>
            <input type="text" readonly id="modal_text_50" name="modal_text_50" class="input_modal_text" placeholder="0" />
        </div>
        <div>
            <label>R$ 100,00</label>
            <input type="number" attr-value="100" onchange="generateValueInModal(this)" id="modal_100" name="modal_100" class="input_" placeholder="0" />
            <label>R$ </label>
            <input type="text" readonly id="modal_text_100" name="modal_text_100" class="input_modal_text" placeholder="0" />
        </div>
        <div>
            <label>R$</label>
            <input type="text" readonly id="value_total_modal" name="value_total" />
        </div>
        <div>
            <button onclick="functionConfirmPartial('<?php echo $base; ?>')" >SALVAR</button>
        </div>
    </div>
</div>
<?php $render('footer'); ?>