<?php

include('../../connection/conn.php');

if (empty($_POST['ID'])) {
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
} else {
    try {
        $sql = "DELETE FROM TASK WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['ID']
        ]);
        $dados = array(
            "type" => "success",
            "message" => "Tarefa excluída com sucesso!"
        );
    } catch (PDOException $e) {
        $dados = array(
            "type" => "error",
            "message" => "Erro ao excluir a tarefa: " . $e->getMessage()
        );
    }
}
$conn = null;
echo json_encode($dados);