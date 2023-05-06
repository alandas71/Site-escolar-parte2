<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
include('criar_vagas.php');
echo "<br>";
// Conecte-se ao banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupere as informações de matrícula
$sql = "SELECT * FROM matricula";
$result = $conn->query($sql);

// Crie a tabela HTML
echo "<div style='overflow-x: auto; overflow-y: auto;'>";
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Situação</th>";
echo "<th>Excluir</th>"; // Adiciona uma coluna para exclusão
echo "<th>Turma</th>";
echo "<th>Turno</th>";
echo "<th>Nome</th>";
echo "<th>Rua</th>";
echo "<th>Endereço</th>";
echo "<th>Número</th>";
echo "<th>Complemento</th>";
echo "<th>Data de Nascimento</th>";
echo "<th>Gênero</th>";
echo "<th>Telefone</th>";
echo "<th>Mãe</th>";
echo "<th>RG1</th>";
echo "<th>CPF1</th>";
echo "<th>Data de Nascimento1</th>";
echo "<th>Rua1</th>";
echo "<th>Bairro1</th>";
echo "<th>Número1</th>";
echo "<th>Complemento1</th>";
echo "<th>Naturalidade1</th>";
echo "<th>Grau1</th>";
echo "<th>Civil1</th>";
echo "<th>Religião1</th>";
echo "<th>Celular1</th>";
echo "<th>Telefone1</th>";
echo "<th>Email1</th>";
echo "<th>Pai</th>";
echo "<th>RG2</th>";
echo "<th>CPF2</th>";
echo "<th>Data de Nascimento2</th>";
echo "<th>Rua2</th>";
echo "<th>Bairro2</th>";
echo "<th>Número2</th>";
echo "<th>Complemento2</th>";
echo "<th>Naturalidade2</th>";
echo "<th>Grau2</th>";
echo "<th>Civil2</th>";
echo "<th>Religião2</th>";
echo "<th>Celular2</th>";
echo "<th>Telefone2</th>";
echo "<th>Email2</th>";
echo "<th>P1</th>";
echo "<th>P2</th>";
echo "<th>P3</th>";
echo "<th>P4</th>";
echo "<th>P5</th>";
echo "<th>P6</th>";
echo "<th>Sono</th>";
echo "<th>P8</th>";
echo "<th>P9</th>";
echo "<th>P10</th>";
echo "<th>P12</th>";
echo "<th>P13</th>";
echo "<th>P14</th>";
echo "<th>P16</th>";
echo "<th>Vacinas</th>";
echo "<th>Doenças</th>";
echo "<th>Saúde</th>";
echo "<th>Médico</th>";
echo "<th>Medicamento</th>";
echo "<th>Tipo Sanguíneo</th>";
echo "<th>Alergia</th>";
echo "<th>Celular3</th>";
echo "<th>Celular4</th>";
echo "<th>Autorizados1</th>";
echo "<th>Autorizados2</th>";
echo "<th>SNIMG</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Itere sobre cada registro de matrícula e adicione uma linha à tabela HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $email = $row['email1'];
        $nome = $row['nome'];
        $turma = $row['turma'];
        $turno = $row['turno'];
        // Verificar se o usuário já existe
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result2 = $conn->query($sql);
        if ($result2->num_rows > 0) {
            // User already exists
            echo "<td id='situacao_aluno'>Aluno</td>";
        } else {
            // User does not exist
            echo "<td><a href='add_user.php?email=$email&nome=$nome&turma=$turma&turno=$turno'>Cadastrar</a></td>";
        }
        echo "<td><a href='excluir_mtr.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza de que deseja excluir o pré-registro?\")'>Excluir</a></td>";
        echo "<td>" . $row['turma'] . "</td>";
        echo "<td>" . $row['turno'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['rua'] . "</td>";
        echo "<td>" . $row['endereco'] . "</td>";
        echo "<td>" . $row['n'] . "</td>";
        echo "<td>" . $row['complemento'] . "</td>";
        echo "<td>" . $row['dataNascimento'] . "</td>";
        echo "<td>" . $row['genero'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['mae'] . "</td>";
        echo "<td>" . $row['rg1'] . "</td>";
        echo "<td>" . $row['cpf1'] . "</td>";
        echo "<td>" . $row['dataNascimento1'] . "</td>";
        echo "<td>" . $row['rua1'] . "</td>";
        echo "<td>" . $row['bairro1'] . "</td>";
        echo "<td>" . $row['n1'] . "</td>";
        echo "<td>" . $row['complemento1'] . "</td>";
        echo "<td>" . $row['naturalidade1'] . "</td>";
        echo "<td>" . $row['grau1'] . "</td>";
        echo "<td>" . $row['civil1'] . "</td>";
        echo "<td>" . $row['religiao1'] . "</td>";
        echo "<td>" . $row['celular1'] . "</td>";
        echo "<td>" . $row['telefone1'] . "</td>";
        echo "<td>" . $row['email1'] . "</td>";
        echo "<td>" . $row['pai'] . "</td>";
        echo "<td>" . $row['rg2'] . "</td>";
        echo "<td>" . $row['cpf2'] . "</td>";
        echo "<td>" . $row['dataNascimento2'] . "</td>";
        echo "<td>" . $row['rua2'] . "</td>";
        echo "<td>" . $row['bairro2'] . "</td>";
        echo "<td>" . $row['n2'] . "</td>";
        echo "<td>" . $row['complemento2'] . "</td>";
        echo "<td>" . $row['naturalidade2'] . "</td>";
        echo "<td>" . $row['grau2'] . "</td>";
        echo "<td>" . $row['civil2'] . "</td>";
        echo "<td>" . $row['religiao2'] . "</td>";
        echo "<td>" . $row['celular2'] . "</td>";
        echo "<td>" . $row['telefone2'] . "</td>";
        echo "<td>" . $row['email2'] . "</td>";
        echo "<td>" . $row['p1'] . "</td>";
        echo "<td>" . $row['p2'] . "</td>";
        echo "<td>" . $row['p3'] . "</td>";
        echo "<td>" . $row['p4'] . "</td>";
        echo "<td>" . $row['p5'] . "</td>";
        echo "<td>" . $row['p6'] . "</td>";
        echo "<td>" . $row['sono'] . "</td>";
        echo "<td>" . $row['p8'] . "</td>";
        echo "<td>" . $row['p9'] . "</td>";
        echo "<td>" . $row['p10'] . "</td>";
        echo "<td>" . $row['p12'] . "</td>";
        echo "<td>" . $row['p13'] . "</td>";
        echo "<td>" . $row['p14'] . "</td>";
        echo "<td>" . $row['p16'] . "</td>";
        echo "<td>" . $row['vacinas'] . "</td>";
        echo "<td>" . $row['doencas'] . "</td>";
        echo "<td>" . $row['saude'] . "</td>";
        echo "<td>" . $row['medico'] . "</td>";
        echo "<td>" . $row['medicamento'] . "</td>";
        echo "<td>" . $row['sangue'] . "</td>";
        echo "<td>" . $row['alergia'] . "</td>";
        echo "<td>" . $row['celular3'] . "</td>";
        echo "<td>" . $row['celular4'] . "</td>";
        echo "<td>" . $row['autorizados1'] . "</td>";
        echo "<td>" . $row['autorizados2'] . "</td>";
        echo "<td>" . $row['snimg'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='41'>Nenhum registro encontrado.</td></tr>";
}
echo "</tbody>";
echo "</table>";

$conn->close();
