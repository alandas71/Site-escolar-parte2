<?php
require("connLogin.php");

class Login
{

    private $con = null;

    public function __construct($conn)
    {
        $this->con = $conn;
    }
    public function send()
    {
        if (empty($_POST) || $this->con == null) {
            echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno nos servidor."));
            return;
        }

        switch (true) {
            case (isset($_POST["email"]) && isset($_POST["senha"])):
                echo $this->login($_POST["email"], $_POST["senha"]);
                break;
        }
    }

    public function login($email, $senha)
    {
        $conn = $this->con;

        $query = $conn->prepare("SELECT * FROM users WHERE email = ? AND senha = ?");
        $query->execute(array($email, $senha));

        if ($query->rowCount()) {
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

            return json_encode(array("erro" => 0));
        } else {
            return json_encode(array(
                "erro" => 1,
                "mensagem" =>
                "<span class='mensagem-erro'>Email ou senha incorretos.</span>"
            ));
        }
    }
}
$conn = new Conexao();
$classe = new Login($conn->conectar());
$classe->send();
