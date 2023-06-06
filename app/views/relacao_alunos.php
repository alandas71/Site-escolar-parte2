<h2>Matutino</h2>
<div style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto;">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_turma1 as $row_turma1) : ?>
                <tr>
                    <td><?php echo $row_turma1['nome']; ?></td>
                    <td><?php echo $row_turma1['turma1']; ?></td>
                    <td><?php echo $row_turma1['email']; ?></td>
                    <td><span class="senha" data-senha="<?php echo $row_turma1['senha']; ?>">Mostrar senha</span></td>
                    <td>
                        <form method="post" action="<?php BASE_URL ?>estudantes/<?php echo $row_turma1['id']; ?>">
                            <button type="submit" name="remover_aluno" value="<?php echo $row_turma1['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover este aluno?')">Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<h2>Vespertino</h2>
<div style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto;">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_turma2 as $row_turma2) :  ?>
                <tr>
                    <td><?php echo $row_turma2['nome']; ?></td>
                    <td><?php echo $row_turma2['turma2']; ?></td>
                    <td><?php echo $row_turma2['email']; ?></td>
                    <td><span class="senha" data-senha="<?php echo $row_turma2['senha']; ?>">Mostrar senha</span></td>
                    <td>
                        <form method="POST" action="<?php BASE_URL ?>estudantes/<?php echo $row_turma2['id']; ?>">
                            <button type="submit" name="remover_aluno" value="<?php echo $row_turma2['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover este aluno?')">Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<h1 class="title">Adicionar aluno</h1>
<br>
<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <br>
    <br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <br>
    <br>
    <label for="turma">Turma:</label>
    <select id="turma" name="turma" required>
        <option selected disabled value="">Selecione</option>
        <?php
        foreach ($result_turmas as $row) {
            echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
        }
        ?>
    </select>
    <br>
    <br>
    Turno:
    <select name="turno">
        <option selected disabled value="">Selecione</option>
        <option value="Matutino">Matutino</option>
        <option value="Vespertino">Vespertino</option>
    </select>
    <br>
    <br>
    <button type="submit" name="adicionar_aluno">Adicionar Aluno</button>
</form>
<footer style="margin-top: 50px; padding: 0; width: 100%; height: 100px; text-align:center;">
    <p>&copy; 2023 Centro Educar Arco-íris</p>
</footer>
<script>
    var spansSenha = document.querySelectorAll('.senha');

    spansSenha.forEach(function(span) {
        span.addEventListener('click', function() {
            var senha = this.getAttribute('data-senha');
            this.textContent = senha;
        });
    });
</script>