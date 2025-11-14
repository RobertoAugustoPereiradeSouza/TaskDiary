<?php

include ('../../connection/conn.php');

$sql = "SELECT *, count(ID) as achou FROM USER WHERE EMAIL = ? AND PASSWORD = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([
   $_POST['EMAIL'],
   $_POST['PASSWORD']
]);

while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
    if ($resultado['achou'] == 1){
        session_start();
        $_SESSION['NAME'] = $resultado['NAME'];
        $_SESSION['EMAIL'] = $resultado['EMAIL'];
        $_SESSION['LEVEL'] = $resultado['LEVEL'];
        $_SESSION['ID'] = $resultado['ID'];
        $dados = array(
            "type" => "success",
            "message" => "Login realizado com sucesso!"
        );
    } else {
        $dados = array(
            "type" => "error",
            "message" => "email ou senha incorretos!"
        );
    }
}

$conn = null;
echo json_encode($dados);