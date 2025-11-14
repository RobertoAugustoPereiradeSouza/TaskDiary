<?php

session_start();

if(isset($_SESSION['ID']) || ($_SESSION['NAME'])  || ($_SESSION['EMAIL'])  || ($_SESSION['LEVEL'])){
$dados = array(
"type" => "success",
            "message" => "Usuário validado!"
);
} else {
    $dados = array(
        "type" => "error",
        "message" => "Usuário não validado!"
    );
}

echo json_encode($dados);