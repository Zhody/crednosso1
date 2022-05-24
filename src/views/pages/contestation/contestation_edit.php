<?php $render('header'); ?>
<h1><?php echo $title_page;?></h1>
<form class="formAddContest" method="POST" enctype='multipart/form-data' action="<?php echo $base; ?>/contestation/edit/<?php echo $contestation[0]['id']; ?>">
    <div>
        <label class="labelTitulos">NUMERO CONTESTAÇÃO</label>
        <input class="form-control" type="number" name="num_contestation" id="num_contestation" value="<?php echo $contestation[0]['num_contest_system']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">NOME</label>
        <input class="form-control" type="text" name="name_contestation" id="name_contestation" value="<?php echo $contestation[0]['name']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">CARTAO</label>
        <input class="form-control" type="number" name="card_contestation" id="card_contestation" value="<?php echo $contestation[0]['card']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">DATA CONTESTAÇÃO</label>
        <input class="form-control" type="date" name="date_contestation" id="date_contestation" value="<?php echo $contestation[0]['date']; ?>" />
    </div>
    <div>
        <label class="labelTitulos">TIPO DE CONTESTAÇÃO</label>
       <select class="form-select form-select-lg mb-3 formSelect" name="type_contestation" id="type_contestation">
           <option value="mateus" <?php if($contestation[0]['type'] == 'mateus'){echo 'selected';} ?>>MATEUS</option>
           <option value="bradesco" <?php if($contestation[0]['type'] == 'bradesco'){echo 'selected';} ?>>BRADESCO</option>
       </select>
    </div>
    <div>
        <label class="labelTitulos" >STATUS</label>
       <select class="form-select form-select-lg mb-3 formSelect" name="status_contestation" id="status_contestation">
           <option value="open" <?php if($contestation[0]['status'] == 'open'){echo 'selected';} ?>>ABERTO</option>
           <option value="close" <?php if($contestation[0]['status'] == 'close'){echo 'selected';} ?>>FECHADO</option>
       </select>
    </div>
    <div>
        <label class="labelTitulos" > ATIVO</label>
       <select class="form-select form-select-lg mb-3 formSelect" name="active_contestation" id="active_contestation">
           <option value="Y" <?php if($contestation[0]['active'] == 'Y'){echo 'selected';} ?>>ATIVO</option>
           <option value="N" <?php if($contestation[0]['active'] == 'N'){echo 'selected';} ?>>INATIVO</option>
       </select>
    </div>
    <div>
        <label class="labelTitulos" >IMAGENS</label>
        <input class="btn btn-secondary btn-sm btnMain" type="file" name="files_contestation[]" id="files_contestation" multiple />
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
                                    <input class="btn btn-secondary btn-sm btnMain" type="checkbox" name="images[]" value="<?php echo $image['id']; ?>" />
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        <?php else: ?>
            <p>Nada a mostrar.</p>
        <?php endif; ?>
        <div>
        <input class="btn btn-secondary btn-sm btnMain" type="submit" value="ADICIONAR" />
        <a  class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/contestation">VOLTAR</a>
    </div>
</form>
<?php $render('footer'); ?>