<?php if (isset($_FILES['imagem'])) {

    // Verifica se a conexão foi bem sucedida
    include('configServer.php');
    if (!$conn) {
        die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
    }

    $file_name = $_FILES['imagem']['name'];
    $file_size = $_FILES['imagem']['size'];
    $file_tmp = $_FILES['imagem']['tmp_name'];
    $file_type = $_FILES['imagem']['type'];

    // Define os tipos de arquivo permitidos
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');

    if (in_array($file_type, $allowed_types) === false) {
        echo 'O tipo de arquivo não é permitido. Por favor, envie uma imagem no formato JPEG, PNG ou GIF.';
    } elseif ($file_size > 5242880) {
        echo 'O tamanho do arquivo deve ser no máximo 5MB.';
    } else {
        // Move o arquivo para o diretório de destino
        move_uploaded_file($file_tmp, '../assets/images/horarios/' . $file_name);

        // Recupera as informações da turma
        $turma = $_POST['turma'];
        $turno = $_POST['turno'];

        // Verifica se já existe uma imagem para a turma e turno especificados
        $sql_select = "SELECT COUNT(*) FROM horarios WHERE turma = ? AND turno = ?";
        $stmt_select = mysqli_prepare($conn, $sql_select);
        mysqli_stmt_bind_param($stmt_select, "ss", $turma, $turno);
        mysqli_stmt_execute($stmt_select);
        mysqli_stmt_bind_result($stmt_select, $count);
        mysqli_stmt_fetch($stmt_select);
        mysqli_stmt_close($stmt_select);

        if ($count > 0) {
            // Já existe uma imagem para a turma e turno especificados, atualiza-a
            $sql_update = "UPDATE horarios SET horario = ? WHERE turma = ? AND turno = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "sss", $file_name, $turma, $turno);
            if (mysqli_stmt_execute($stmt_update)) {
                header("location: dashboard.php?view=horarios");
            } else {
                header("location: dashboard.php?view=horarios");
            }
            mysqli_stmt_close($stmt_update);
        } else {
            // Não existe uma imagem para a turma e turno especificados, insere uma nova
            $sql_insert = "INSERT INTO horarios (horario, turma, turno) VALUES (?, ?, ?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "sss", $file_name, $turma, $turno);
            if (mysqli_stmt_execute($stmt_insert)) {
                header("location: dashboard.php?view=horarios");
            } else {
                header("location: dashboard.php?view=horarios");
            }
            mysqli_stmt_close($stmt_insert);
        }
        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
    }
}
