<?php
require("connLogin.php");

if (isset($_POST["email"]) && isset($_POST["senha"]) && $conn != null) {
    $query = $conn->prepare("SELECT * FROM users WHERE email = ? AND senha = ?");
    $query->execute(array($_POST["email"], $_POST["senha"]));

    if ($query->rowCount()) {
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        session_start();
        $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

        echo json_encode(array("erro" => 0));
    } else {
        echo json_encode(array(
            "erro" => 1,
            "mensagem" =>
            "<span class='mensagem-erro'>Email ou senha incorretos.</span>"
        ));
    }
} else {
    echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno nos servidor."));
}
