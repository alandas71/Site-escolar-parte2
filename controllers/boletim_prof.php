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
                <th colspan="2">1° unidade</th>
                <th colspan="2">2° unidade</th>
                <th colspan="2">3° unidade</th>
                <th colspan="2">4° unidade</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th></th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Matemática</td>
                <td><input type="number" name="matematica_nota1" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_falta1" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_nota2" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_falta2" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_nota3" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_falta3" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_nota4" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="matematica_falta4" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
            </tr>
            <tr>
                <td>Português</td>
                <td><input type="number" name="portugues_nota1" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_falta1" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_nota2" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_falta2" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_nota3" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_falta3" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_nota4" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
                <td><input type="number" name="portugues_falta4" style="width:50px; -moz-appearance: textfield; appearance: textfield;"></td>
            </tr>
            <!-- adicione as demais matérias -->
        </tbody>
    </table>
    <input type="hidden" name="id_aluno" value="">
    <button type="submit">Salvar</button>
</form>