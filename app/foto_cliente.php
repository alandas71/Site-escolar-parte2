<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("../database/pdo_connection.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}

// Verifica se foi enviado um arquivo
if (isset($_FILES['foto'])) {

    // Configurações do upload
    $targetDir = "../assets/images/clientes/"; // diretório onde as imagens serão salvas
    $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); // obtem a extensão do arquivo
    $fileName = uniqid() . '.' . $extension; // define um nome aleatório para o arquivo
    $targetFilePath = $targetDir . $fileName;

    // Exclui a imagem antiga, se existir
    require("../database/pdo_connection.php");
    $user_id = $_SESSION['usuario'][1];
    $stmt = $conn->prepare("SELECT foto FROM users WHERE id = ?");
    $stmt->execute(array($user_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $oldFilePath = $row['foto'];
    if (!empty($oldFilePath)) {
        unlink($oldFilePath);
    }

    // Verifica se o arquivo é uma imagem
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if (in_array($fileType, $allowTypes)) {

        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {

            // Salva o caminho do novo arquivo na tabela de usuários
            $stmt = $conn->prepare("UPDATE users SET foto = :foto WHERE id = :user_id");
            $stmt->bindParam(':foto', $targetFilePath);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            // Armazena o caminho da imagem em uma variável de sessão
            $_SESSION['caminho_imagem'] = $targetFilePath;

            header("location: album.php");
        } else {
            echo "Ocorreu um erro ao enviar a imagem.";
        }
    } else {
        header("location: album.php");
    }
}
