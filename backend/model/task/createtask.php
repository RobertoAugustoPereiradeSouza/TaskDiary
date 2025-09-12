<?php

include('../../connection/conn.php');

if (empty($_POST['DATE_TIME']) || empty($_POST['TITLE']) || empty($_POST['DESCRIPTION']) || empty($_POST['STATUS']) || empty($_POST['USER_ID'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
} else {
    try {
        $sql = "INSERT INTO TASK (DATE_TIME, TITLE, DESCRIPTION, STATUS, USER_ID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['DATE_TIME'],
            $_POST['TITLE'],
            $_POST['DESCRIPTION'],
            $_POST['STATUS'],
            $_POST['USER_ID']
        ]);
        $dados = array(
            "type" => "success",
            "message" => "Tarefa cadastrada com sucesso!"
        );
    } catch (PDOException $e) {
        $dados = array(
            "type" => "error",
            "message" => "Erro ao salvar a tarefa: " . $e->getMessage()
        );
    }
}

$conn = null;
echo json_encode($dados);