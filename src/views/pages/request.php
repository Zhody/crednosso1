<?php $render('header');  ?>
<h1><?php echo $title_page; ?></h1>
<a href="<?php  echo $base; ?>/request/add">['NOVO']</a>
<?php if($requests !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>LOTE</td>
                <td>ORIGEM</td>
                <td>DESTINO</td>
                <td>DATA</td>
                <td>TOTAL</td>
                <td>VALOR CONFIRMADO</td>
                <td>STATUS</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requests as $request): ?>
                <tr>
                    <td><?php echo $request['id']; ?></td>
                    <td><?php echo $request['batch']; ?></td>
                    <td><?php echo $request['name_origin']; ?></td>
                    <td><?php echo $request['name_destiny']; ?></td>
                    <td><?php echo $request['date_request']; ?></td>
                    <td><?php echo $request['value_total']; ?></td>
                    <td><?php echo $request['confirmed_value']; ?></td>
                    <td><?php echo $request['name_status']; ?></td>
                    <td>
                        <a href="<?php echo $base; ?>/request/view/<?php echo $request['id']; ?>">[VISUALIZAR]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostrar!</p>
<?php endif; ?>
<?php $render('footer');  ?>