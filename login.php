<?php
session_start();

include "backend/conn.php";

header("Content-Type: application/json; charset=utf-8");

$json = file_get_contents("php://input");
$dados = json_decode($json);

if (!$dados || !isset($dados->email) || !isset($dados->senha)) {
    echo json_encode(["estado" => "erro"]);
    exit;
}

$email = $conn->real_escape_string($dados->email);
$senha = $conn->real_escape_string($dados->senha);

$sql = "SELECT id FROM usuario WHERE email = '$email' AND senha = '$senha'";

$resultado = mysqli_query($conn, $sql);

if ($resultado && mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION["id"] = $usuario["id"];

    echo json_encode([
        "estado" => "sucesso"
    ]);
} else {
    http_response_code(401);

    echo json_encode([
        "estado" => "erro"
    ]);
}
?>
