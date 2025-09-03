<?php

include('../connection/conn.php');

if (empty($_REQUEST['NAME']) || empty($_REQUEST['EMAIL']) || empty($_REQUEST
['PASSWORD']) || empty($_REQUEST['LEVEL'])){
    $dados = array(
"type" => "error",
"message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
}