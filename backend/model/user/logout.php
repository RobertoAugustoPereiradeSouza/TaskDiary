<?php

session_start();
session_destroy();

$dados = array(
    "type" => "success",
    "message" => "Sessão finalizada!"
    );

echo json_encode($dados);