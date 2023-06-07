<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arco-íris</title>
</head>

<body>
    <div>
        <h1 class="title">Criar nova turma</h1>
        <form method="POST">
            <label for="turma">Nome da turma:</label>
            <input type="text" id="turma" name="turma" required>
            <br><br>
            <label for="turno">Turno:</label>
            <select id="turno" name="turno" required>
                <option selected disabled value="">Selecione</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
            </select>
            <br><br>
            <label for="vagas">Limite de vagas:</label>
            <input type="number" id="vagas" name="vagas" required>
            <br><br>
            <input type="submit" name="criar" value="Criar turma">
        </form>

        <h2>Lista de turmas</h2>
        <?php
        if ($result->rowCount() > 0) {
            echo "<div style=' box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto; box-sizing:'>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Turma</th><th>Turno</th><th>Vagas</th><th>Ações</th></tr>";

            $quantidades_turma1 = array();
            if ($result_quantidade_turma1->rowCount() > 0) {
                foreach ($result_quantidade_turma1 as $row_quantidade_turma1) {
                    $quantidades_turma1[$row_quantidade_turma1['turma1']] = $row_quantidade_turma1['quantidade'];
                }
            }

            $quantidades_turma2 = array();
            if ($result_quantidade_turma2->rowCount() > 0) {
                foreach ($result_quantidade_turma2 as $row_quantidade_turma2) {
                    $quantidades_turma2[$row_quantidade_turma2['turma2']] = $row_quantidade_turma2['quantidade'];
                }
            }

            foreach ($result as $row) {
                $quantidade_turma1 = isset($quantidades_turma1[$row["turma"]]) ? $quantidades_turma1[$row["turma"]] : 0;
                $quantidade_turma2 = isset($quantidades_turma2[$row["turma"]]) ? $quantidades_turma2[$row["turma"]] : 0;
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["turma"] . "</td>";
                echo "<td>" . $row["turno"] . "</td>";
                if ($row["turno"] == 'Matutino') {
                    echo "<td>" . $quantidade_turma1 . "/" . $row["vagas"] . "</td>";
                } else {
                    echo "<td>" . $quantidade_turma2 . "/" . $row["vagas"] . "</td>";
                }
                echo "<td><a href='" . BASE_URL . "dashboard/turmas?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza de que deseja excluir a turma?\")'>Excluir</a></td>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "Nenhuma turma cadastrada.";
        }
        ?>
    </div>
    <br>
    <div>
        <h1 class="title">Trocar de turma</h1>
        <br>
        <form method="post">
            Nome:
            <select name="nome" required>
                <option selected disabled value="">Selecione</option>
                <?php
                foreach ($nomes as $row) {
                    echo "<option value='" . $row["nome"] . "'>" . $row["nome"] . "</option>";
                }
                ?>
            </select><br>
            <br>
            Turma:
            <select name="turma" required>
                <option selected disabled value="">Selecione</option>
                <?php
                foreach ($classes as $row) {
                    echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
                }
                ?>
            </select><br>
            <br>
            Turno:
            <select name="turno" required>
                <option selected disabled value="">Selecione</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
            </select><br>
            <br>
            <input type="submit" name="atualizar" value="Atualizar">
        </form>
    </div>
    <footer style="margin: 0; padding: 0; width: 100%; height: 100px; text-align:center;">
        <p>&copy; 2023 Centro Educar Arco-íris</p>
    </footer>
</body>

</html>