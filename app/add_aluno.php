<?php
echo ' <br>';
echo '<h1 class="title">Adicionar aluno</h1>';
echo ' <br>';
echo '<form method="post" action="add_aluno.php">';
echo '  <label for="nome">Nome:</label>';
echo '  <input type="text" id="nome" name="nome" required>';
echo ' <br>';
echo ' <br>';
echo '  <label for="email">E-mail:</label>';
echo '  <input type="email" id="email" name="email" required>';
echo ' <br>';
echo ' <br>';
echo ' <label for="senha">Senha:</label>';
echo '  <input type="password" id="senha" name="senha" required>';
echo '  <br>';
echo ' <br>';
echo ' <label for="turma">Turma:</label>';
echo ' <select id="turma" name="turma" required>';
echo '<option selected disabled value="">Selecione</option>';

if ($result_turmas->num_rows > 0) {
    while ($row = $result_turmas->fetch_assoc()) {
        echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
    }
} else {
    echo "Não foram encontrados registros na tabela turmas.";
}

echo '</select>';
echo '<br>';
echo '<br>';
echo 'Turno:';
echo '<select name="turno">';
echo '<option selected disabled value="">Selecione</option>';
echo '<option value="Matutino">Matutino</option>';
echo '<option value="Vespertino">Vespertino</option>';
echo '</select>';
echo '<br>';
echo '<br>';
echo '<button type="submit">Adicionar Aluno</button>';
echo '</form>';
