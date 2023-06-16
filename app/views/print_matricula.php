<div class="formularios">
    <h1 class="title">Postar vagas de matrícula</h1>
    <br>
    <form method="post">
        Turma: <select name="nova_vaga">
            <?php
            if ($classes->rowCount() > 0) {
                echo '<option selected disabled value="">Selecione</option>';
                foreach ($classes as $row) {
                    echo "<option value='" . $row['turma'] . "'>" . $row['turma'] . "</option>";
                }
            }
            ?>
        </select><br><br>
        Disponibilidade de vagas na pré-matrícula:<br>
        <?php
        if ($vagas->rowCount() > 0) {
            echo "<select name='vaga'>";
            echo '<option selected disabled value="">Selecione</option>';
            foreach ($vagas as $row) {
                echo "<option value='" . $row['vaga'] . "'>" . $row['vaga'] . "</option>";
            }
            echo "</select>";
            echo " <input type='submit' name='excluir' value='Excluir' onclick='return confirm(\"Tem certeza de que deseja excluir a disponibilidade de vaga?\")' style='background-color: #B30000;'>";
        } else {
            echo "Nenhuma vaga encontrada.";
        }
        ?>
        <br>
        <input type="submit" name="inserir" value="Inserir vaga">
    </form>
    <br>
</div>
<div style='overflow-x: auto; overflow-y: auto;'>
    <table>
        <thead>
            <tr>
                <th>Situação</th>
                <th>Excluir</th>
                <th>Turma</th>
                <th>Turno</th>
                <th>Nome</th>
                <th>Rua</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Data de Nascimento</th>
                <th>Gênero</th>
                <th>Telefone</th>
                <th>Mãe</th>
                <th>RG1</th>
                <th>CPF1</th>
                <th>Data de Nascimento1</th>
                <th>Rua1</th>
                <th>Bairro1</th>
                <th>Número1</th>
                <th>Complemento1</th>
                <th>Naturalidade1</th>
                <th>Grau1</th>
                <th>Civil1</th>
                <th>Religião1</th>
                <th>Celular1</th>
                <th>Telefone1</th>
                <th>Email1</th>
                <th>Pai</th>
                <th>RG2</th>
                <th>CPF2</th>
                <th>Data de Nascimento2</th>
                <th>Rua2</th>
                <th>Bairro2</th>
                <th>Número2</th>
                <th>Complemento2</th>
                <th>Naturalidade2</th>
                <th>Grau2</th>
                <th>Civil2</th>
                <th>Religião2</th>
                <th>Celular2</th>
                <th>Telefone2</th>
                <th>Email2</th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>P4</th>
                <th>P5</th>
                <th>P6</th>
                <th>Sono</th>
                <th>P8</th>
                <th>P9</th>
                <th>P10</th>
                <th>P12</th>
                <th>P13</th>
                <th>P14</th>
                <th>P16</th>
                <th>Vacinas</th>
                <th>Doenças</th>
                <th>Saúde</th>
                <th>Médico</th>
                <th>Medicamento</th>
                <th>Tipo Sanguíneo</th>
                <th>Alergia</th>
                <th>Celular3</th>
                <th>Celular4</th>
                <th>Autorizados1</th>
                <th>Autorizados2</th>
                <th>SNIMG</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($mtr->rowCount() > 0) {
                foreach ($mtr as $row) {
                    echo "<tr>";
                    $email = $row['email1'];
                    $nome = $row['nome'];
                    $turma = $row['turma'];
                    $turno = $row['turno'];
                    $id =  $row['id'];

                    if ($emails->fetch(PDO::FETCH_ASSOC) > 0) {
                        echo "<td id='situacao_aluno'>Aluno</td>";
                    } else {
                        echo "<td><a href=' " . BASE_URL . "dashboard/matriculas?email=$email&nome=$nome&turma=$turma&turno=$turno'>Cadastrar</a></td>";
                    }
                    echo "<td><a href='" . BASE_URL . "dashboard/matriculas/" . $row['id'] . "' onclick='return confirm(\" Tem certeza de que deseja excluir o pré-registro?\")'><i class='fas fa-trash-alt' style='color: #B30000; text-align: center;'></i></a></td>";
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
                echo "<tr>
                <td colspan='41'>Nenhum registro encontrado.</td>
              </tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";

            ?>