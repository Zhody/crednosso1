<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/assets/css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <input type="checkbox" id="menuLateral">
            <label class="btnPush"for="menuLateral">
                <img src="<?php echo $base; ?>./assets/icons/btnMenuIcon.svg">
            </label>
        <h1>CREDNOSSO</h1>
        <nav>
            <ul>
                <li><a class="menuLateral" href="<?php echo $base; ?>/shipping">TRANSPORTADORAS</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/contestation">CONTESTAÇÕES</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/supplie">ABASTECIMENTOS</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/batch">LOTE</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/treasury">SALDOS</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/request">PEDIDOS</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/atm">ATMS</a></li>
                <li><a class="menuLateral" href="<?php echo $base; ?>/config">CONFIGURAÇÕES</a></li>
            </ul>
        </nav>


