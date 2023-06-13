<section>
    <div class="container py-5" style="display: block; margin:auto;">
        <div class="row">
            <div class=" col-lg-4" style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.1); background-color: white; border-radius: 10px;">
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
                        <h5 class="my-3"><?= $pfl['nome']; ?></h5>
                        <p class="text-muted mb-1"><?= $pfl['turma1']; ?></p>
                        <p class="text-muted mb-1"><?= $pfl['turma2']; ?></p>
                        <p class="text-muted mb-4"><?= empty($pfl['turma1']) ? 'Vespertino' : 'Matutino'; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4" style="box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.1); background-color: white; border-radius: 10px;">
                    <form method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" value="<?= $data ? $data['email1'] : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telefone</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="telefone" class="form-control" value="<?= $data ? $data['telefone'] : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Endereço</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="endereco" class="form-control" value="<?= $data ? $data['rua'] : '' ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
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