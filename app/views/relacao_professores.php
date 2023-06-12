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
                    <td><?php echo $row_turma1['nome'] ?></td>
                    <td><?php echo $row_turma1['turma1'] ?></td>
                    <td><?php echo $row_turma1["email"] ?></td>
                    <td><span class="senha" data-senha="<?php echo $row_turma1["senha"] ?>">Mostrar senha</span></td>
                    <td>
                        <form method="post" action="<? echo BASE_URL ?>dashboard/professores/<?php echo $row_turma1['id']; ?>" style="text-align:center;">
                            <button type="submit" name="remover_prof" value="<?php echo $row_turma1['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover este prof?')" style='background-color: #B30000;'>Remover</button>
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
            <?php foreach ($result_turma2 as $row_turma2) : ?>
                <tr>
                    <td><?php echo $row_turma2['nome'] ?></td>
                    <td><?php echo $row_turma2['turma2'] ?></td>
                    <td><?php echo $row_turma2["email"] ?></td>
                    <td><span class="senha" data-senha="<?php echo $row_turma2["senha"] ?>">Mostrar senha</span></td>
                    <td>
                        <form method="POST" action="<?php echo BASE_URL ?>dashboard/professores/<?php echo $row_turma2['id']; ?>" style="text-align:center;">
                            <button type="submit" name="remover_prof" value="<?php echo $row_turma2['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover este prof?')" style='background-color: #B30000;'>Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div style="width: 700px;">
    <h1 class="title">Adicionar professor</h1>
    <br>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <label for="turma">Turma:</label>
        <select id="turma" name="turma" required>
            <option selected disabled value="">Selecione</option>
            <?php
            foreach ($result_turmas as $row) {
                echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
            }
            ?>
        </select>
        Turno:
        <select name="turno">
            <option selected disabled value="">Selecione</option>
            <option value="Matutino">Matutino</option>
            <option value="Vespertino">Vespertino</option>
        </select>
        <br>
        <button type="submit" name="adicionar_prof">Adicionar professor</button>
    </form>
</div>

<footer style="margin-top: 50px; padding: 0; width: 100%; height: 100px; text-align:center;">
    <p>&copy; 2022 Centro Educar Arco-íris</p>
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