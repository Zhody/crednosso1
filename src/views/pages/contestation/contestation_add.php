<h1><?php echo $title_page;?></h1>
<form method="POST" enctype='multipart/form-data' action="<?php echo $base; ?>/contestation/add">
    <div>
        <label>NUMERO CONTESTAÇÃO</label>
        <input type="number" name="num_contestation" id="num_contestation" />
    </div>
    <div>
        <label>NOME</label>
        <input type="text" name="name_contestation" id="name_contestation" />
    </div>
    <div>
        <label>CARTAO</label>
        <input type="number" name="card_contestation" id="card_contestation" />
    </div>
    <div>
        <label>DATA CONTESTAÇÃO</label>
        <input type="date" name="date_contestation" id="date_contestation" />
    </div>
    <div>
        <label>TIPO DE IMAGEM</label>
        <div>
            <label>Video</label>
            <input type="radio" name="type_archive" id="type_video" />
        </div>
        <div>
            <label>PDF</label>
            <input type="radio" name="type_archive" id="type_pdf" />
        </div>
        <div>
            <label>Imagem</label>
            <input type="radio" name="type_archive" id="type_image" />
        </div>
    </div>
    <div>
        <label>IMAGENS</label>
        <input type="file" name="files_contestation[]" id="files_contestation" />
    </div>
    <div>
        <input type="submit" value="ADICIONAR" />
        <a href="<?php echo $base; ?>/contestation">[VOLTAR]</a>
    </div>
</form>