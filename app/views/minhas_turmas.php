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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#notasModal<?php echo $aluno['id']; ?>" class="edit-notas fas fa-edit" data-aluno="<?php echo $aluno['id']; ?>"></a>
                </td>
            </tr>
            <div class="modal fade modal-notas" id="notasModal<?php echo $aluno['id']; ?>" tabindex="-1" aria-labelledby="notasModalLabel<?php echo $aluno['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="notasContent<?php echo $aluno['id']; ?>"></div>
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
                    <td><img src="<?php echo BASE_URL . 'assets/images/clientes/' . $aluno['foto']; ?>" width="50px" height="50px"></td>
                <?php else : ?>
                    <td><img src="<?php echo BASE_URL; ?>assets/images/user.jpg" width="50px"></td>
                <?php endif; ?>
                <td><?php echo $aluno['nome']; ?></td>
                <td style="text-align: center;">
                    <a href="<?php echo BASE_URL; ?>portalProf/notas/<?php echo $aluno['id']; ?>" data-bs-toggle="modal" data-bs-target="#notasModal<?php echo $aluno['id']; ?>" class="edit-notas fas fa-edit" data-aluno="<?php echo $aluno['id']; ?>"></a>
                </td>
            </tr>
            <div id="notasModal<?php echo $aluno['id']; ?>" class="modal fade modal-notas">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
<script>
    $(document).ready(function() {
        $('#notasModal<?php echo $aluno['id']; ?>').on('show.bs.modal', function() {
            var alunoId = <?php echo $aluno['id']; ?>;
            var url = '<?php echo BASE_URL; ?>portalProf/notas/' + alunoId;

            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $('#notasContent<?php echo $aluno['id']; ?>').html(response);
                }
            });
        });
    });
</script>