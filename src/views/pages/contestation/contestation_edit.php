<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form method="POST" enctype='multipart/form-data' action="<?php echo $base; ?>/contestation/edit/<?php echo $contestation[0]['id']; ?>">
    <div>
        <label>NUMERO CONTESTAÇÃO</label>
        <input type="number" name="num_contestation" id="num_contestation" value="<?php echo $contestation[0]['num_contest_system']; ?>" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_contestation" id="name_contestation" value="<?php echo $contestation[0]['name']; ?>" />
    </div>
    <div>
        <label>CARTAO</label>
        <input type="number" name="card_contestation" id="card_contestation" value="<?php echo $contestation[0]['card']; ?>" />
    </div>
    <div>
        <label>DATA CONTESTAÇÃO</label>
        <input type="date" name="date_contestation" id="date_contestation" value="<?php echo $contestation[0]['date']; ?>" />
    </div>
    <div>
        <label>TIPO DE CONTESTAÇÃO</label>
       <select name="type_contestation" id="type_contestation">
           <option value="mateus" <?php if($contestation[0]['type'] == 'mateus'){echo 'selected';} ?>>MATEUS</option>
           <option value="bradesco" <?php if($contestation[0]['type'] == 'bradesco'){echo 'selected';} ?>>BRADESCO</option>
       </select>
    </div>
    <div>
        <label>STATUS</label>
       <select name="status_contestation" id="status_contestation">
           <option value="open" <?php if($contestation[0]['status'] == 'open'){echo 'selected';} ?>>ABERTO</option>
           <option value="close" <?php if($contestation[0]['status'] == 'close'){echo 'selected';} ?>>FECHADO</option>
       </select>
    </div>
    <div>
        <label> ATIVO</label>
       <select name="active_contestation" id="active_contestation">
           <option value="Y" <?php if($contestation[0]['active'] == 'Y'){echo 'selected';} ?>>ATIVO</option>
           <option value="N" <?php if($contestation[0]['active'] == 'N'){echo 'selected';} ?>>INATIVO</option>
       </select>
    </div>
    <div>
        <label>IMAGENS</label>
        <input type="file" name="files_contestation[]" id="files_contestation" multiple />
    </div>
        <h3>IMAGENS</h3>
        <?php if($contestation[0]['images'] !== null): ?>
                <table width="100%" border="1">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>PASTA</td>
                            <td>NOME</td>
                            <td>HASH</td>
                            <td>ATIVA</td>
                            <td>EXCLUIR</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contestation[0]['images'] as $image): ?>
                            <tr>
                                <td><?php echo $image['id']; ?></td>
                                <td><?php echo $image['path']; ?></td>
                                <td><?php echo $image['path_image']; ?></td>
                                <td><?php echo $image['hash']; ?></td>
                                <td><?php echo $image['active']; ?></td>
                                <td>
                                    <input type="checkbox" name="images[]" value="<?php echo $image['id']; ?>" />
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        <?php else: ?>
            <p>Nada a mostrar.</p>
        <?php endif; ?>
        <div>
        <input type="submit" value="ADICIONAR" />
        <a href="<?php echo $base; ?>/contestation">[VOLTAR]</a>
    </div>
</form>
<?php $render('footer'); ?>