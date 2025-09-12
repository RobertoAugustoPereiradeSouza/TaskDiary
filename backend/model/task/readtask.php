<?php

include('../../connection/conn.php');

$sql = "SELECT * FROM TASK";
$stmt = $conn->prepare($sql);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;
echo json_encode($dados);