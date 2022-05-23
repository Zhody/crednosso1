<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<div>
    <a>CONFIRMAR LOTE</a>
    <a>EXCLUIR LOTE</a>
</div>
<form method="POST" action="<?php echo $base; ?>/batch/view/">
    <div>
        <label>ID</label>
        <input type="number" readonly name="id_batch" id="id_batch" value="<?php echo $batch[0]['id']; ?>" />
    </div>
    <div>
        <label>LOTE</label>
        <input type="text" readonly name="name_batch" id="name_batch" value="<?php echo $batch[0]['batch']; ?>" />
    </div>
    <div>
        <label>TIPO</label>
        <input type="text" readonly name="type" id="type" value="<?php echo $batch[0]['name_type']; ?>" />
    </div>
    <div>
        <label>DATA</label>
        <input type="date" readonly name="date_batch" id="date_batch" value="<?php echo $batch[0]['date_batch']; ?>" />
    </div>
    <div>
        <div>
            <label>STATUS</label>
            <input type="text" readonly value="<?php echo $batch[0]['name_status'] ?>" />
        </div>
        
        <?php if(isset($all_status) && $all_status !== null): ?>
            <div>
                <small>Ao efetuar qualquer alteração do Lote, será refletido para todos os pedidos contidos. [BETA]</small>
                <select name="id_status" id="id_status" >
                    <?php foreach($all_status as $allstatus): ?>
                        <option value="<?php echo $allstatus['id']; ?>" 
                            <?php if($allstatus['id'] == $batch[0]['status']){echo 'selected';} ?>
                        ><?php echo $allstatus['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <input type="submit" value="Salvar" />
        <a href="<?php echo $base; ?>/batch">[VOLTAR]</a>
    </div>
</form>
<div>
    <?php if(isset($requests) && $requests !== null): ?>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>ORIGEM</td>
                    <td>DESTINO</td>
                    <td>STATUS</td>
                    <td>VALOR TOTAL</td>
                    <td>VALOR CONFIRM.</td>
                    <td>VIZUALIZAR</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($requests as $req): ?>
                    <tr>
                        <td><?php echo $req['id']; ?></td>
                        <td><?php echo $req['name_origin']; ?></td>
                        <td><?php echo $req['name_destiny']; ?></td>
                        <td><?php echo $req['name_status']; ?></td>
                        <td><?php echo 'R$ '.number_format($req['value_total'], 2, ',', '.'); ?></td>
                        <td><?php echo 'R$ '.number_format($req['confirmed_value'], 2, ',', '.'); ?></td>
                        <td><a href="<?php echo $base; ?>/request/view/<?php echo $req['id']; ?>" >[CLIQUE AQUI]</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Lote vazio</p>
    <?php endif; ?>
</div>
<?php $render('footer'); ?>