<?php

include('../connection/conn.php');

if (empty($_REQUEST['NAME']) || empty($_REQUEST['EMAIL']) || empty($_REQUEST
['PASSWORD']) || empty($_REQUEST['LEVEL'])){
    $dados = array(
"type" => "error",
"message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
} else {
    try{
$sql = "INSERT INTO USER (NAME, EMAIL, PASSWORD, LEVEL) VALUES (?, ?, ?, ?)";
$stmt = $conn ->prepare($sql);// STATEMENT 
$stmt -> execute([
$_REQUEST['NAME'],
$_REQUEST['EMAIL'],
$_REQUEST['PASSWORD'],
$_REQUEST['LEVEL']
]);
$dados = array(
    "type" => "success",
    "message" => "Registro salvo com sucesso!"
        );
    } catch (PDOException $e){
        $dados = array(
            "type" => "error",
            "message" => "Erro ao salvar o registro: ".$e ->getMessage()
                );
    }
}

$conn = null;
echo json_encode($dados);