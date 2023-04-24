<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
// Conexão com o banco de dados
include('configServer.php');
// Verifica se a conexão é bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome_album = $_POST["nome_album"];
    $capa_album = $_FILES["capa_album"]["name"];
    $nome_album = str_replace(" ", "", $nome_album);

    // Gera um nome de arquivo único baseado no horário atual
    $nome_unico = uniqid();

    // Obtém a extensão do arquivo
    $extensao = strtolower(pathinfo($_FILES['capa_album']['name'], PATHINFO_EXTENSION));

    // Verifica se a extensão é permitida
    if ($extensao != 'png' && $extensao != 'jpg') {
        // Se a extensão não for permitida, fecha a aplicação
        header('Location: dashboard.php?view=album');
        exit();
    }


    // Concatena o nome único e a extensão para criar o nome de arquivo completo
    $nome_arquivo = $nome_unico . "." . $extensao;

    // Faz upload da capa para a pasta de uploads com o novo nome de arquivo
    $target_dir = "../assets/images/album/";
    $target_file = $target_dir . $nome_arquivo;
    move_uploaded_file($_FILES["capa_album"]["tmp_name"], $target_file);

    // Insere o novo álbum no banco de dados com o novo nome de arquivo
    $sql = "INSERT INTO albuns (id_album, capa, situacao) VALUES ('$nome_album', '$nome_arquivo', '1')";
    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php?view=album');
        exit();
    } else {
        header('Location: dashboard.php?view=album');
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
