<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\mtrPrint.css" />
    <title>Ficha de Matrícula 2023</title>
</head>

<body>
    <button id="btn_imp">Imprimir</button>
    <div class="content">
        <div class="mtric">
            <img src="<?php echo BASE_URL; ?>assets\images\iconetopo.png" width="200px">
            <h1>➣ Ficha de Matrícula <?php echo $anoAtual ?></h1>
            <div></div>
            <div class=" section-title">1. Identificação do aluno
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Nome:</span>
                    <span class="field-value"><?= $dados['nome']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Endereço:</span>
                    <span class="field-value"><?= $dados['rua']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Nº:</span>
                    <span class="field-value"><?= $dados['n']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Bairro:</span>
                    <span class="field-value"><?= $dados['endereco']; ?></span><br>
                </div>
                <br>
                <div class="field-wrapper">
                    <span class="field-label">Complemento:</span>
                    <span class="field-value"><?= !empty($dados['complemento']) ? $dados['complemento'] : '_______________________________________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Telefone:</span>
                    <span class="field-value"><?= $dados['telefone']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Data de nascimento:</span>
                    <span class="field-value"><?= $dados['dataNascimento']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Sexo:</span>
                    <span class="field-value"><?= $dados['genero']; ?></span>
                </div>
            </div>

            <div class="section-title">2. Dados obrigatórios (salvo exceções): Filiação:</div>
            <div class="section-title">Mãe:</div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Nome:</span>
                    <span class="field-value"><?= $dados['mae']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">R.G.:</span>
                    <span class="field-value"><?= $dados['rg1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">CPF:</span>
                    <span class="field-value"><?= $dados['cpf1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Data de nascimento:</span>
                    <span class="field-value"><?= $dados['dataNascimento1']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Endereço:</span>
                    <span class="field-value"><?= $dados['rua1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Nº:</span>
                    <span class="field-value"><?= $dados['n1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Bairro:</span>
                    <span class="field-value"><?= $dados['bairro1']; ?></span>
                </div>

            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Naturalidade:</span>
                    <span class="field-value"><?= $dados['naturalidade1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Grau de instrução:</span>
                    <span class="field-value"><?= $dados['grau1']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Estado civil:</span>
                    <span class="field-value"><?= $dados['civil1']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Religião:</span>
                    <span class="field-value"><?= !empty($dados['religiao1']) ? $dados['religiao1'] : '______________________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Celular:</span>
                    <span class="field-value"><?= $dados['celular1']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Telefone fixo:</span>
                    <span class="field-value"><?= !empty($dados['telefone1']) ? $dados['telefone1'] : '______________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">E-mail:</span>
                    <span class="field-value"><?= $dados['email1']; ?></span>
                </div>
            </div>

            <div class="section-title">Pai:</div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Nome:</span>
                    <span class="field-value"><?= !empty($dados['pai']) ? $dados['pai'] : '______________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">R.G.:</span>
                    <span class="field-value"><?= !empty($dados['rg2']) ? $dados['rg2'] : '___________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">CPF:</span>
                    <span class="field-value"><?= !empty($dados['cpf2']) ? $dados['cpf2'] : '____________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Data de nascimento:</span>
                    <span class="field-value"><?= !empty($dados['dataNascimento2']) ? $dados['dataNascimento2'] : '___________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Endereço:</span>
                    <span class="field-value"><?= !empty($dados['rua2']) ? $dados['rua2'] : '___________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Nº:</span>
                    <span class="field-value"><?= !empty($dados['n2']) ? $dados['n2'] : '___________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Bairro:</span>
                    <span class="field-value"><?= !empty($dados['bairro2']) ? $dados['bairro2'] : '___________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Naturalidade:</span>
                    <span class="field-value"><?= !empty($dados['naturalidade2']) ? $dados['naturalidade2'] : '___________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Grau de instrução:</span>
                    <span class="field-value"><?= !empty($dados['grau2']) ? $dados['grau2'] : '___________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Estado civil:</span>
                    <span class="field-value"><?= !empty($dados['civil2']) ? $dados['civil2'] : '___________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Religião:</span>
                    <span class="field-value"><?= !empty($dados['religiao2']) ? $dados['religiao2'] : '______________________________________'; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Celular:</span>
                    <span class="field-value"><?= !empty($dados['celular2']) ? $dados['celular2'] : '___________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Telefone fixo:</span>
                    <span class="field-value"><?= !empty($dados['telefone2']) ? $dados['telefone2'] : '______________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">E-mail:</span>
                    <span class="field-value"><?= !empty($dados['email2']) ? $dados['email2'] : '___________________________'; ?></span>
                </div>
            </div>
        </div>
        <br><br>
        <br><br>
        <div class="mtric">
            <div class="section-title">Dados complementares:</div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">1. A gravidez foi desejada?</span>
                    <span class="field-value"><?= $dados['p1']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">2. Fez pré-natal?</span>
                    <span class="field-value"><?= $dados['p2']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">3. Como foi o parto?</span>
                    <span class="field-value"><?= $dados['p3']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">4. Chorou logo ao nascer?</span>
                    <span class="field-value"><?= $dados['p4']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">5. Tem sono tranquilo?</span>
                    <span class="field-value"><?= $dados['p5']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">6. Tem hábito de dormir durante o dia?</span>
                    <span class="field-value"><?= $dados['p6']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">7. Qual horário?</span>
                    <span class="field-value"><?= !empty($dados['sono']) ? $dados['sono'] : '________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <span class="field-label">8. Faz uso de chupeta?</span>
                <span class="field-value"><?= $dados['p8']; ?></span>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">9. Saúde geral da criança:</span>
                    <span class="field-value"><?= $dados['p9']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">10. Tomou todas as vacinas?</span>
                    <span class="field-value"><?= $dados['p10']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">11.possui refluxos?</span>
                    <span class="field-value"><?= $dados['p12']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">12. Possui convênio médico?</span>
                    <span class="field-value"><?= $dados['p13']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">13. A criança faz uso de algum medicamento?</span>
                    <span class="field-value"><?= $dados['p14']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">14. Possui alergia a algum tipo de alimento?</span>
                    <span class="field-value"><?= $dados['p16']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">15.Vacinas que faltam:</span>
                    <span class="field-value"><?= !empty($dados['vacinas']) ? $dados['vacinas'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">16. Doença que já teve:</span>
                    <span class="field-value"><?= !empty($dados['doencas']) ? $dados['doencas'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">17. Atuais problemas de saúde:</span>
                    <span class="field-value"><?= !empty($dados['saude']) ? $dados['saude'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">18. convênio médico</span>
                    <span class="field-value"><?= !empty($dados['medico']) ? $dados['medico'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">19. Medicamentos que utiliza:</span>
                    <span class="field-value"><?= !empty($dados['medicamento']) ? $dados['medicamento'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">20. Tipo sanguíneo:</span>
                    <span class="field-value"><?= !empty($dados['sangue']) ? $dados['sangue'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">21. Alergia a alimentos:</span>
                    <span class="field-value"><?= !empty($dados['alergia']) ? $dados['alergia'] : '___________________________________________'; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">22. Pessoas autorizadas a pegar a criança na escola:</span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Nome:</span>
                    <span class="field-value"><span class="field-value"><?= $dados['autorizados1']; ?></span></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Número:</span>
                    <span class="field-value"><?= $dados['celular3']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-label">Nome:</span>
                    <span class="field-value"><?= $dados['autorizados2']; ?></span>
                </div>
                <div class="field-wrapper">
                    <span class="field-label">Número:</span>
                    <span class="field-value"><?= $dados['celular4']; ?></span>
                </div>
            </div>
            <div class="section-title">Ficha de Autorizações Utilização de Fotos e Imagens:</div>
            <div class="form-group">
                <div class="field-wrapper">
                    <span class="field-value">A escola utiliza fotos e filmagens dos alunos para divulgação na internet, folhetos e outros meios de comunicação, públicos ou privados. Autorizo a publicação de fotos e filmagens do meu filho,</span>
                    <span class="field-value"><b><?= $dados['snimg']; ?></b></span>
                </div>
            </div>
            <span class="field-value"><b>Atenção: Na área restrita do site poderão ser utilizadas fotos de todos os alunos, não apenas das crianças autorizadas.</b></span>
            <br>
            <br>
            <br><br>
            <br><br>
            <div class="bottom0">
                <div class="middle-text">Salvador,______ de _________________ de 2023.</div>
                <br><br>
                <div class="middle-text">_______________________________________________________________________.</div>
                <div class="middle-text">Assinatura do responsável da criança</div>
            </div>
        </div>
    </div>
    <script>
        const btn_imp = document.getElementById("btn_imp");
        const conteudo = document.querySelector('.content').innerHTML;

        btn_imp.addEventListener("click", (evt) => {
            let estilo = "<style>";
            estilo += "@media print { @page {size: A4;margin: 0;padding:0;}}";
            estilo += "body { margin: 0; font-family: Arial, sans-serif; font-size: 12px; }";
            estilo += ".content { width: 100%; max-width: 800px; padding: 30px; background-color: #fff; }";
            estilo += ".mtric { border: 3px solid black; padding: 10px; height: 297mm;}";
            estilo += ".section-title { font-size: 20px; font-weight: bold; margin-top: 20px; margin-bottom: 10px; margin-left: 10px; }";
            estilo += "h1 { margin-left: 10px; }";
            estilo += ".form-group { padding: 5px; }";
            estilo += ".field-wrapper { display: inline-block; padding:2px; }";
            estilo += ".field-label { font-weight: bold; display: inline-block; margin-left: 20px; font-size: 16px; }";
            estilo += ".field-value { display: inline-block; font-size: 14px; }";
            estilo += ".middle-text { text-align: center; }";
            estilo += "</style>";

            const newWindow = window.open('', '', 'height=1000,width=1000');
            newWindow.document.write('<html><head>');
            newWindow.document.write('<title>Matricula Arco-íris</title>');
            newWindow.document.write(estilo);
            newWindow.document.write('</head>');
            newWindow.document.write('<body>');
            newWindow.document.write('<div class="content">' + conteudo + '</div>');
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.focus();
            newWindow.print();
            newWindow.close();
        });
    </script>
</body>

</html>