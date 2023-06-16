<section>
    <div class="container py-5" style="display: block;  margin:auto;">
        <div class="row">
            <div class=" col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <form method="post" enctype="multipart/form-data" id="myForm">
                            <div class='img_dashboard'>
                                <label for="foto"></label>
                                <br>
                                <img class='client_foto' src='<?php echo isset($foto['foto']) ? BASE_URL . 'assets/images/clientes/' . $foto['foto'] : BASE_URL . 'assets/images/user.jpg' ?>' width='100px' height='100px' id='foto-preview'>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="submitForm()" style="opacity: 0; position: absolute; z-index: -1;">
                            </div>
                            <input type="hidden" id="cropped-image" name="cropped-image">
                        </form>
                        <h5 class="my-3"><?= $nome ?></h5>
                        <p class="text-muted mb-1"><?= $turma1 ?></p>
                        <p class="text-muted mb-1"><?= $turma2 ?></p>
                        <p class="text-muted mb-4"><?= empty($turma1) ? 'Vespertino' : 'Matutino'; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $data ? $data['email1'] : 'Indefinido'; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telefone:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $data ? $data['telefone'] : 'Indefinido'; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Endereço:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $data ? $data['rua'] : 'Indefinido'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Desempenho</span>
                    </p>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <?php if ($notas_materias1[0]['media'] != '') {
                                    foreach ($notas_materias1 as $materia) :

                                        $width = $materia['media'] * 10;
                                        $colorClass = '';

                                        if ($width < 60) {
                                            $colorClass = 'red';
                                        } elseif ($width < 80) {
                                            $colorClass = 'blue';
                                        } else {
                                            $colorClass = 'green';
                                        }
                                ?>
                                        <p class="mb-1" style="font-size: 14px;"><?php echo $materia['nome']; ?></p>
                                        <div class="progress rounded" style="height: 10px;">
                                            <div class="progress-bar <?php echo $colorClass; ?>" role="progressbar" style="width: <?php echo $width; ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php endforeach;
                                } else { ?>
                                    <p class="mb-1" style="font-size: 14px;">Matemática</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-1" style="font-size: 14px;">Português</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-1" style="font-size: 14px;">História</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-1" style="font-size: 14px;">Ciências</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <?php if ($notas_materias2[0]['media'] != '') {
                                    foreach ($notas_materias2 as $materia) :

                                        $width = $materia['media'] * 10;
                                        $colorClass = '';

                                        if ($width < 60) {
                                            $colorClass = 'red';
                                        } elseif ($width < 80) {
                                            $colorClass = 'blue';
                                        } else {
                                            $colorClass = 'green';
                                        }
                                ?>
                                        <p class="mb-1" style="font-size: 14px;"><?php echo $materia['nome']; ?></p>
                                        <div class="progress rounded" style="height: 10px;">
                                            <div class="progress-bar <?php echo $colorClass; ?>" role="progressbar" style="width: <?php echo $width; ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php endforeach;
                                } else { ?>
                                    <p class="mb-1" style="font-size: 14px;">Geografia</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-1" style="font-size: 14px;">Artes</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-1" style="font-size: 14px;">Inglês</p>
                                    <div class="progress rounded" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color red"></div>
                        <span>Baixo</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color blue"></div>
                        <span>Satisfatório</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color green"></div>
                        <span>Excelente</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const fotoInput = document.querySelector('#foto');
    const fotoPreview = document.querySelector('#foto-preview');

    fotoPreview.addEventListener('click', () => {
        fotoInput.click();
    });

    fotoInput.addEventListener('change', () => {
        const file = fotoInput.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            fotoPreview.src = reader.result;
        };
    });
</script>
<script>
    function submitForm() {
        document.forms[0].submit();
    }
</script>