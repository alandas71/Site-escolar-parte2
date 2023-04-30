<?php
require("connLogin.php");
include("config_recaptcha.php");
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

        // Verify reCAPTCHA response
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => SECRET_KEY, // Replace with your own reCAPTCHA secret key
            'response' => $_POST['recaptchaResponse']
        );
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if (!$captcha_success->success) {
            echo json_encode(array("erro" => 1, "mensagem" => "Por favor, verifique que você não é um robô."));
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
