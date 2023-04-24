<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
include('configServer.php');

// verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha ao conectar ao banco de dados: " . mysqli_connect_error());
}

// obtém o endereço IP do usuário
$ip = $_SERVER['REMOTE_ADDR'];

// verifica se o endereço IP já existe no banco de dados
$result = mysqli_query($conn, "SELECT * FROM visitas WHERE ip = '$ip'");
if (mysqli_num_rows($result) > 0) {
    // atualiza a contagem de visitas para o endereço IP existente
    $row = mysqli_fetch_assoc($result);
    $visitas = $row['visitas'] + 1;
    mysqli_query($conn, "UPDATE visitas SET visitas = '$visitas' WHERE ip = '$ip'");
} else {
    // insere um novo registro para o endereço IP com uma contagem de visitas inicial de 1
    mysqli_query($conn, "INSERT INTO visitas (ip, visitas) VALUES ('$ip', '1')");
    $visitas = 1;
}

// exibe a contagem de visitas na página da web
echo "Este site já recebeu $visitas visitas do endereço IP $ip.";
