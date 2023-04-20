<?php
include('configServer.php');
// Verificar se o usuário já existe
$sql = "SELECT * FROM users WHERE email = '$email'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Usuário já existe
    echo "<td>Aluno</td>";
} else {
    // Usuário não existe
    echo "<td><a href='add_user.php?email=$email&nome=$nome'>Em espera</a></td>";
}
