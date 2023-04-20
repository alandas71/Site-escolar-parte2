<?php
// Conexão com o banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se a conexão é bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $id_album = $_POST["id_album"];
    // Obtém o número de fotos enviadas
    $num_fotos = count($_FILES["nova_foto"]["name"]);

    // Loop para processar cada foto
    for ($i = 0; $i < $num_fotos; $i++) {

        // Obtém o nome original do arquivo
        $nome_original = $_FILES["nova_foto"]["name"][$i];

        // Obtém a extensão do arquivo
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

        // Verifica se a extensão é permitida
        if ($extensao != 'png' && $extensao != 'jpg') {
            // Se a extensão não for permitida, redireciona o usuário para a página de erro
            header('Location: erro.php');
            exit();
        }

        // Gera um identificador único para o arquivo
        $nome_aleatorio = uniqid();

        // Monta o nome do arquivo com o identificador único e a extensão
        $nome_foto = $nome_aleatorio . '.' . $extensao;

        // Move a nova foto para a pasta de uploads
        $caminho_foto = "../assets/images/album/fotos/" . $nome_foto;

        move_uploaded_file($_FILES['nova_foto']['tmp_name'][$i], $caminho_foto);

        // Insere a nova foto no banco de dados
        $sql = "INSERT INTO fotos (id_album, foto, situacao) VALUES ('$id_album', '$nome_foto', '1')";

        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['mensagem'] = "Foto adicionada com sucesso.";
        } else {
            session_start();
            $_SESSION['mensagem'] = "Erro ao adicionar foto: " . $conn->error;
        }
    }

    // Redireciona o usuário de volta para a página do álbum
    header('Location: dashboard.php?view=album');
    exit();
}

// Fecha a conexão com o banco de dados
$conn->close();
