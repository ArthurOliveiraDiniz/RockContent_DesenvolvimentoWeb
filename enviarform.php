<?php
session_start();

include "conn.php";

header("Content-Type: application/json; charset=utf-8");

// Sem sessão, o usuário não pode enviar dados pela atividade anterior.
if (!isset($_SESSION["id"])) {
    http_response_code(401);
    echo json_encode(["estado" => "erro", "mensagem" => "Usuário não autenticado."]);
    exit;
}

$json = file_get_contents("php://input");
$dados = json_decode($json);

if (!$dados || !isset($dados->assunto) || !isset($dados->texto)) {
    echo json_encode(["estado" => "erro"]);
    exit;
}

$idUsuario = (int) $_SESSION["id"];
$assunto = $conn->real_escape_string($dados->assunto);
$texto = $conn->real_escape_string($dados->texto);

/*
 * ETAPA 5:
 * O ID do usuário não é mais fixo. Ele vem da sessão criada no login.
 *
 * IMPORTANTE:
 * Esta consulta pressupõe que a tabela "teste" possua a coluna "id_usuario"
 * e tenha a estrutura: id, id_usuario, assunto, texto.
 */
$sql = "INSERT INTO teste (id, id_usuario, assunto, texto)
        VALUES (NULL, $idUsuario, '$assunto', '$texto')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo json_encode(["estado" => "sucesso"]);
} else {
    http_response_code(500);
    echo json_encode(["estado" => "erro"]);
}
?>
