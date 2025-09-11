// colocar dentro da pasta user em model

<?php

include('../../connection/conn.php');

if (empty($_POST['NAME']) || empty($_POST['EMAIL']) || empty($_POST
['PASSWORD']) || empty($_POST['LEVEL'] || empty($_POST['ID'])){
    $dados = array(
"type" => "error",
"message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
 } else {
       try{
$sql = "UPDATE USER SET NAME = ?, EMAIL = ?, PASSWORD = ?, LEVEL = ? WHERE ID = ?";
$stmt = $conn ->prepare($sql);// STATEMENT 
$stmt -> execute([
$_POST['NAME'],
$_POST['EMAIL'],
$_POST['PASSWORD'],
$_POST['LEVEL'],
$_POST['ID']
]);
$dados = array(
    "type" => "success",
    "message" => "Registro alterado com sucesso!"
        );
    } catch (PDOException $e){
        $dados = array(
            "type" => "error",
            "message" => "Erro ao atualizar o registro: ".$e ->getMessage()
                );
    }
 }
 $conn = null;
 echo json_encode($dados);