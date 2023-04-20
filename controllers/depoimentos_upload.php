<?php
// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {

    // Conexão com o banco de dados
    $dbHost = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'banco-dados';

    $conn = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);

    // Verifica se a conexão foi estabelecida com sucesso
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Diretório para armazenar a imagem
    $diretorio = "../assets/images/depoimentos/";

    // Nome do arquivo
    $nome_arquivo = basename($_FILES['image']['name']);

    // Gera um identificador único para o arquivo
    $nome_aleatorio = uniqid();

    // Obtém a extensão do arquivo
    $extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    // Verifica se a extensão é permitida
    if ($extensao != 'png' && $extensao != 'jpg') {
        // Se a extensão não for permitida, redireciona o usuário para a página de erro
        header('Location: erro.php');
        exit();
    }

    // Monta o nome do arquivo com o identificador único e a extensão
    $nome_arquivo = $nome_aleatorio . '.' . $extensao;

    // Caminho completo do arquivo
    $caminho_arquivo = $diretorio . $nome_arquivo;

    // Move o arquivo para o diretório de imagens
    if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

        // Insere o nome do arquivo no banco de dados
        $sql = "INSERT INTO depoimentos (depoimento, situacao) VALUES ('$nome_arquivo', '2')";

        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION['mensagem'] = "depoimento adicionado com sucesso.";
        }
    }
    // Redireciona o usuário para a página de painel
    header('Location: dashboard.php?view=site');
    exit();

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
