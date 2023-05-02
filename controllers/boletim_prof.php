<script>
    // recupera o id_aluno do localStorage
    var id_aluno = localStorage.getItem('id_aluno');

    // atribui o valor do ID do aluno ao input
    $('input[name="id_aluno"]').val(id_aluno);
</script>

<form method="post" action="salvar_boletim.php" class="aluno-form">
    <table>
        <thead>
            <tr>
                <th>Matéria</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Faltas</th>
                <th>Resultado Final</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Matemática</td>
                <td><input type="number" name="matematica_nota1"></td>
                <td><input type="number" name="matematica_nota2"></td>
                <td><input type="number" name="matematica_nota3"></td>
                <td><input type="number" name="matematica_faltas"></td>
                <td><input type="text" name="matematica_resultado"></td>
            </tr>
            <tr>
                <td>Português</td>
                <td><input type="number" name="portugues_nota1"></td>
                <td><input type="number" name="portugues_nota2"></td>
                <td><input type="number" name="portugues_nota3"></td>
                <td><input type="number" name="portugues_faltas"></td>
                <td><input type="text" name="portugues_resultado"></td>
            </tr>
            <!-- adicione as demais matérias -->
        </tbody>
    </table>
    <input type="hidden" name="id_aluno" value="">
    <button type="submit">Salvar</button>
</form>