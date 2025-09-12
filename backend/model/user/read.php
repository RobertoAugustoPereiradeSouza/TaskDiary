<?php

include ('../../connection/conn.php');

$sql = "SELECT * FROM USER";
$stmt = $conn->prepare($sql);
$stmt -> execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);//faz um looping infinito no statement(stmt), gerando todos os registros 
$conn = null;
echo json_encode($dados);