<p class="title">Minhas turmas</p>
<br>
<h2>Matutino</h2>
<div style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto;">
    <table>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Notas</th>
        </tr>
        <?php foreach ($alunos_turma1 as $aluno) : ?>
            <tr>
                <?php if ($aluno['foto']) : ?>
                    <td><img src="<?php echo BASE_URL . 'assets/images/clientes/' . $aluno['foto']; ?>" width="50px" height="50px"></td>
                <?php else : ?>
                    <td><img src="<?php echo BASE_URL; ?>assets/images/user.jpg" width="50px"></td>
                <?php endif; ?>
                <td><?php echo $aluno['nome']; ?></td>
                <td style="text-align: center;">
                    <a href="<?php echo BASE_URL; ?>portalProf/notas/<?php echo $aluno['id']; ?>" data-toggle='modal' data-target='#notasModal<?php echo $aluno['id']; ?>' class="edit-notas fas fa-edit" data-aluno="<?php echo $aluno['id']; ?>"></a>
                </td>
            </tr>
            <div id="notasModal<?php echo $aluno['id']; ?>" class="modal-notas fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Notas de <?php echo $aluno['nome']; ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </table>
</div>

<h2>Vespertino</h2>
<div style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto;">
    <table>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Notas</th>
        </tr>
        <?php foreach ($alunos_turma2 as $aluno) : ?>
            <tr>
                <?php if ($aluno['foto']) : ?>
                    <td><img src="<?php echo BASE_URL . 'assets/images/clientes/' . $aluno['foto']; ?>" width="50px"></td>
                <?php else : ?>
                    <td><img src="<?php echo BASE_URL; ?>assets/images/user.jpg" width="50px"></td>
                <?php endif; ?>
                <td><?php echo $aluno['nome']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>portalProf/notas/<?php echo $aluno['id']; ?>" data-toggle='modal' data-target='#notasModal<?php echo $aluno['id']; ?>' class="edit-notas fas fa-edit" data-aluno="<?php echo $aluno['id']; ?>"></a>
                </td>
            </tr>
            <div id="notasModal<?php echo $aluno['id']; ?>" class="modal-notas fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Notas de <?php echo $aluno['nome']; ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </table>
</div>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.1.min.js"></script>
<script>
    $('.edit-notas').click(function(event) {
        event.preventDefault();
        var alunoId = $(this).data('aluno');

        localStorage.setItem('id_aluno', alunoId);
    });
</script>
<script>
    $('#btn-salvar').click(function() {
        // recupera o id_aluno do localStorage
        var id_aluno = localStorage.getItem('id_aluno');

        // envia a requisição AJAX para salvar as notas
        $.ajax({
            url: '<?= BASE_URL; ?>portalProf/notas',
            type: 'POST',
            data: {
                id_aluno: id_aluno
            },
            success: function(response) {
                window.location.href = '<?= BASE_URL; ?>portalProf/minhasTurmas';
            },
            error: function(error) {
                console.log(error);
                alert('Erro ao enviar requisição AJAX!');
            }
        });
    });
</script>