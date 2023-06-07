<div class="header">
    <div class="div1">
        <p class="titulo title">Formulário de pré-matrícula</p>
        <div class="conteudo2">
            <div class="box">
                <form id="formMatr" class="formMatr" type="post" method="post">
                    <fieldset class=full>
                        <div>O preenchimento do formulário não garante a matrícula,
                            para saber sobre disponibilidades de vagas entre em contato pelo nosso
                            <a class="whatsapp-link" href="https://wa.me/557182662374" target="_blank">Whatsapp</a>
                        </div>
                        <Br>

                        <legend><strong>1- Identificação da criança</strong></legend>
                        <hr>
                        <br><Br>
                        <label for="turma">Turma</label>
                        <select id="turma" name="turma" required>
                            <option selected disabled value="">Selecione</option>
                            <?php
                            foreach ($vagas as $vaga) {
                                echo "<option value=\"" . $vaga['vaga'] . "\">" . $vaga['vaga'] . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        <label for="turno">Turno</label>
                        <select id="turno" name="turno" required>
                            <option selected disabled value="">Selecione</option>
                            <option>Matutino</option>
                            <option>Vespertino</option>
                        </select>
                        <br>
                        <br>
                        <div class="inputbox">
                            <input type="text" name="nome" id="nome" class="inputuser" minlength="3" maxlength="40" required>
                            <label for="nome" class="labelinput">Nome completo</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="rua" id="rua" class="inputuser" minlength="4" maxlength="30" required>
                            <label for="rua" class="labelinput">Endereço</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="bairro" id="bairro" class="inputuser" minlength="4" maxlength="30" required>
                            <label for="bairro" class="labelinput">Bairro</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="number" name="n" id="n" class="inputuser" min="1" max="9999" required>
                            <label for="n" class="labelinput">Nº</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="complemento" id="complemento" class="inputuser" maxlength="20" placeholder="Complemento">
                            <label for="complemento"></label>
                        </div><br>
                        <div class="inputbox">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                            <div class="inputbox">
                                <p>Sexo:</p>
                                <input type="radio" name="genero" value="feminino" id="feminino" required>
                                <label for="feminino">Feminino</label>
                                <input type="radio" name="genero" value="masculino" id="masculino" required>
                                <label for="masculino">Masculino</label><br><br>
                                <div class="inputbox">
                                    <input type="tel" name="telefone" id="telefone" minlength="8" maxlength="15" class="inputuser telefone" required>
                                    <label for="telefone" class="labelinput">Celular</label>
                                </div><br><br>
                    </fieldset><br>
            </div>

            <div class="box1">
                <fieldset class=full>
                    <legend><strong>2- Identificação da mãe</strong></legend>
                    <br>
                    <div class="titulo"></div><Br>
                    <div class="inputbox">
                        <input type="text" name="mae" id="mae" class="inputuser" minlength="3" maxlength="40" required>
                        <label for="mae" class="labelinput">Nome completo</label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="rg1" id="rg1" class="inputuser" minlength="10" maxlength="13" pattern="[0-9-/.]+$" required>
                        <label for="rg1" class="labelinput">R.G</label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="cpf1" id="cpf1" class="inputuser cpf" minlength="11" maxlength="14" pattern="[0-9-/.]+$" required>
                        <label for="cpf1" class="labelinput">CPF</label>
                    </div><br>
                    <div class="inputbox">
                        <label for="data_nascimento1">Data de nascimento</label>
                        <input type="date" name="data_nascimento1" id="data_nascimento1" required>
                    </div><br>
                    <div class="inputbox">
                        <div class="inputbox">
                            <input type="text" name="rua1" id="rua1" class="inputuser" minlength="3" maxlength="30" required>
                            <label for="rua1" class="labelinput">Endereço</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="bairro1" id="bairro1" class="inputuser" minlength="3" maxlength="30" required>
                            <label for="bairro1" class="labelinput">Bairro</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="number" name="n1" id="n1" class="inputuser" min="1" max="9999" required>
                            <label for="n1" class="labelinput">Nº</label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="complemento1" id="complemento1" class="inputuser" maxlength="20" placeholder="Complemento">
                            <label for="complemento1"></label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="naturalidade1" id="naturalidade1" class="inputuser" minlength="3" maxlength="15" required>
                            <label for="naturalidade1" class="labelinput">Naturalidade</label>
                        </div><br>
                        <label for="grau1">Grau de instrução:</label>
                        <select id="grau1" name="grau1" required>
                            <option selected disabled value="">Selecione</option>
                            <option>Analfabeto</option>
                            <option>Ensino fundamental incompleto</option>
                            <option>Ensino fundamental completo</option>
                            <option>Ensino médio incompleto</option>
                            <option>Ensino médio completo</option>
                            <option>Superior completo</option>
                            <option>Pós-graduação</option>
                            <option>Mestrado</option>
                            <option>Doutorado</option>
                            <option>Pós-doutorado</option>
                        </select>
                    </div><br>
                    <label for="civil1">Estado civil:</label>
                    <select id="civi1" name="civil1" required>
                        <option selected disabled value="">Selecione</option>
                        <option>Solteira</option>
                        <option>Casada</option>
                        <option>Divorciada</option>
                        <option>Viúva</option>
                    </select><br><br>
                    <div class="inputbox">
                        <input type="text" name="religiao1" id="religiao1" class="inputuser" maxlength="15" placeholder="Religião">
                        <label for="religiao1"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="tel" name="celular1" id="celular1" class="inputuser" minlength="11" maxlength="15" required>
                        <label for="celular1" class="labelinput">Celular</label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="telefone1" id="telefone1" class="inputuser" minlength="8" maxlength="14" placeholder="Telefone fixo">
                        <label for="telefone1"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="email1" id="email1" class="inputuser" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}+$" maxlength="30" required>
                        <label for="email1" class="labelinput">Email</label>
                    </div><br>
                </fieldset>
            </div>


            <div class="box2">
                <fieldset class=full>
                    <legend><strong>3- Identificação do pai</strong></legend>
                    <div class="titulo"></div><Br><br>
                    <div class="inputbox">
                        <input type="text" name="pai" id="pai" class="inputuser" maxlength="40" placeholder="Nome completo">
                        <label for="pai"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="rg2" id="rg2" class="inputuser" minlength="10" maxlength="13" pattern="[0-9-/.]+$" placeholder="R.G">
                        <label for="rg1"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="cpf2" id="cpf2" class="inputuser cpf" minlength="11" maxlength="14" pattern="[0-9-/.]+$" placeholder="CPF">
                        <label for="cpf2"></label>
                    </div><br>
                    <div class="inputbox">
                        <label for="data_nascimento2">Data de nascimento</label>
                        <input type="date" name="data_nascimento2" id="data_nascimento2">
                    </div><br>
                    <div class="inputbox">
                        <div class="inputbox">
                            <input type="text" name="rua2" id="rua2" class="inputuser" maxlength="30" placeholder="Endereço">
                            <label for="rua2"></label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="bairro2" id="bairro2" class="inputuser" maxlength="30" placeholder="Bairro">
                            <label for="bairro2"></label>
                        </div><br>
                        <div class="inputbox">
                            <input type="number" name="n2" id="n2" class="inputuser" min="1" max="9999" placeholder="N°">
                            <label for="n2"></label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="complemento2" id="complemento2" class="inputuser" maxlength="15" placeholder="Complemento">
                            <label for="complemento2"></label>
                        </div><br>
                        <div class="inputbox">
                            <input type="text" name="naturalidade2" id="naturalidade2" class="inputuser" maxlength="15" placeholder="Naturalidade">
                            <label for="naturalidade2"></label>
                        </div><br>
                        <label for="grau2">Grau de instrução:</label>
                        <select id="grau2" name="grau2">
                            <option selected disabled value="">Selecione</option>
                            <option>Analfabeto</option>
                            <option>Ensino fundamental incompleto</option>
                            <option>Ensino fundamental completo</option>
                            <option>Ensino médio incompleto</option>
                            <option>Ensino médio completo</option>
                            <option>Superior completo</option>
                            <option>Pós-graduação</option>
                            <option>Mestrado</option>
                            <option>Doutorado</option>
                            <option>Pós-doutorado</option>
                        </select>
                    </div><br>
                    <label for="civil2">Estado civil:</label>
                    <select id="civil2" name="civil2">
                        <option selected disabled value="">Selecione</option>
                        <option>Solteiro</option>
                        <option>Casado</option>
                        <option>Divorciado</option>
                        <option>Viúvo</option>
                    </select><br><br>
                    <div class="inputbox">
                        <input type="text" name="religiao2" id="religiao2" class="inputuser" maxlength="15" placeholder="Religião">
                        <label for="religiao2"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="tel" name="celular2" id="celular2" class="inputuser" minlength="11" maxlength="15" placeholder="Celular">
                        <label for="celular2"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="tel" name="telefone2" id="telefone2" class="inputuser" minlength="8" maxlength="14" placeholder="Telefone fixo">
                        <label for="telefone2"></label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="email2" id="email2" class="inputuser" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}+$" maxlength="30" placeholder="Email">
                        <label for="email2"></label>
                    </div><br>
                </fieldset>
            </div>

            <div class="box3">
                <fieldset class=full>
                    <legend><strong>4- Dados complementares</strong></legend><br>
                    <div class="box31">
                        <p>*1. A gravidez foi desejada?</p>
                        <input type="radio" name="1" id="sn11" value="Sim" required>
                        <label for="sn11">Sim</label>
                        <input type="radio" name="1" id="sn12" value="Nao" required>
                        <label for="sn12">Não</label><br><br>
                        <p>*2. Fez pré-natal?</p>
                        <input type="radio" name="2" id="sn21" value="Sim" required>
                        <label for="sn21">Sim</label>
                        <input type="radio" name="2" id="sn22" value="Nao" required>
                        <label for="sn22">Não</label><br><br>
                        <p>*3. Como foi o parto?</p>
                        <input type="radio" name="3" id="sn31" value="Normal" required>
                        <label for="sn31">Normal</label>
                        <input type="radio" name="3" id="sn32" value="Cesária" required>
                        <label for="sn32">Cesária</label><br><br>
                        <input type="radio" name="3" id="sn33" value="Forceps" required>
                        <label for="sn33">Forceps</label><br><br>
                        <p>*4. Chorou logo ao nascer?</p>
                        <input type="radio" name="4" id="sn41" value="Sim" required>
                        <label for="sn41">Sim</label>
                        <input type="radio" name="4" id="sn42" value="Nao" required>
                        <label for="sn42">Não</label><br><br>
                        <p>*5. Tem sono tranquilo?</p>
                        <input type="radio" name="5" id="sn51" value="Sim" required>
                        <label for="sn51">Sim</label>
                        <input type="radio" name="5" id="sn52" value="Nao" required>
                        <label for="sn52">Não</label><br><br>
                        <p>*6. Tem hábito de dormir durante o dia?</p>
                        <input type="radio" name="6" id="sn61" value="Sim" required>
                        <label for="sn61">Sim</label>
                        <input type="radio" name="6" id="sn62" value="Nao" required>
                        <label for="sn62">Não</label><br><br>
                        <label for="time">Qual horário?</label>
                        <input type="time" name="sono" id="time" class="inputuser">
                        <p>*7. Faz uso de chupeta?</p>
                        <input type="radio" name="8" id="sn81" value="Sim" required>
                        <label for="sn81">Sim</label>
                        <input type="radio" name="8" id="sn82" value="Nao" required>
                        <label for="sn82">Não</label><br><br>
                    </div>
                    <div class="box32">
                        <p>*8. Saúde geral da criança:</p>
                        <input type="radio" name="9" id="boa" value="Boa" required>
                        <label for="boa">Boa</label>
                        <input type="radio" name="9" id="regular" value="Regular" required>
                        <label for="regular">Regular</label><br><br>
                        <input type="radio" name="9" id="ruim" value="Ruim" required>
                        <label for="ruim">Ruim</label><br><br>
                        <p>*9. Tomou todas as vacinas?</p>
                        <input type="radio" name="10" id="sn101" value="Sim" required>
                        <label for="sn101">Sim</label>
                        <input type="radio" name="10" id="sn102" value="Nao" required>
                        <label for="sn102">Não</label><br><br>
                        <p>*10.possui refluxos?</p>
                        <input type="radio" name="12" id="sn121" value="Sim" required>
                        <label for="sn121">Sim</label>
                        <input type="radio" name="12" id="sn122" value="Nao" required>
                        <label for="sn122">Não</label><br><br>
                        <p>*11. Possui convênio médico?</p>
                        <input type="radio" name="13" id="sn131" value="Sim" required>
                        <label for="sn131">Sim</label>
                        <input type="radio" name="13" id="sn132" value="Nao" required>
                        <label for="sn132">Não</label><br><br>
                        <p>*12. A criança faz uso de algum medicamento?</p>
                        <input type="radio" name="14" id="sn141" value="Sim" required>
                        <label for="sn141">Sim</label>
                        <input type="radio" name="14" id="sn142" value="Nao" required>
                        <label for="sn142">Não</label><br><br>
                        <p>*13. Possui alergia a algum tipo de alimento?</p>
                        <input type="radio" name="16" id="sn161" value="Sim" required>
                        <label for="sn161">Sim</label>
                        <input type="radio" name="16" id="sn162" value="Nao" required>
                        <label for="sn162">Não</label><br><br>
                </fieldset>
            </div>
            <div class="box4">
                <fieldset class=full><br><br>
                    <label for="vacinas">Vacinas que faltam:</label>
                    <input type="text" name="vacinas" id="vacinas" class="inputuser" maxlength="30" placeholder="Se houver">
                    <br><br>
                    <label for="doencas">Doenças que já teve:</label>
                    <input type="text" name="doencas" id="doencas" class="inputuser" maxlength="30" placeholder="Se houver">
                    <br><br>
                    <label for="saude">Atuais problemas de saúde:</label>
                    <input type="text" name="saude" id="saude" class="inputuser" maxlength="30" placeholder="Se houver">
                    <br><br>
                    <label for="medico">Convênio médico:</label>
                    <input type="text" name="medico" id="medico" class="inputuser" maxlength="15" placeholder="Se houver">
                    <br><br>
                    <label for="medicamento">Medicamentos que utiliza:</label>
                    <input type="text" name="medicamento" id="medicamento" class="inputuser" maxlength="30" placeholder="Se houver">
                    <br><br>
                    <label for="sangue">Tipo sanguíneo:</label>
                    <select id="sangue" name="sangue" required>
                        <option selected disabled value="">Selecione</option>
                        <option>A+</option>
                        <option>B+</option>
                        <option>AB+</option>
                        <option>O+</option>
                        <option>A-</option>
                        <option>B-</option>
                        <option>AB-</option>
                        <option>O-</option>
                    </select>
                    <br><br>
                    <label for="alergia">Alergia a alimentos:</label>
                    <input type="text" name="alergia" id="alergia" class="inputuser" maxlength="15" placeholder="Se houver">
                    <br><br><br><br>
                    <p>*Telefone de parentes ou amigos, caso não conseguirmos falar com o responsável:</p>
                    <div class="inputbox">
                        <input type="tel" name="celular3" id="celular3" class="inputuser" minlength="8" maxlength="15" required>
                        <label for="celular3" class="labelinput">Celular</label>
                    </div><br>
                    <div class="inputbox">
                        <input type="tel" name="celular4" id="celular4" class="inputuser" minlength="8" maxlength="15" required>
                        <label for="celular4" class="labelinput">Celular</label>
                    </div><br>
                    <p>*Pessoas autorizadas a pegar a criança na escola:</p>
                    <div class="inputbox">
                        <input type="text" name="autorizados1" id="autorizados1" class="inputuser" maxlength="15" required>
                        <label for="autorizados1" class="labelinput">Nome</label>
                    </div><br>
                    <div class="inputbox">
                        <input type="text" name="autorizados2" id="autorizados2" class="inputuser" maxlength="15" required>
                        <label for="autorizados2" class="labelinput">Nome</label>
                    </div><br>
                    <p><strong>Ficha de Autorizações Utilização de Fotos e Imagens:</strong> </p>
                    <p>A escola utiliza fotos e filmagens dos alunos para divulgação na internet, folhetos e outros meios de
                        comunicação, públicos ou privados. Autorizo a publicação de fotos e filmagens do meu filho.</p>
                    <input type="radio" name="snimg" id="snimg1" value="Sim" required>
                    <label for="snimg1">Sim</label>
                    <input type="radio" name="snimg" id="snimg2" value="Nao" required>
                    <label for="snimg2">Não</label><br><br>
                </fieldset>
            </div>
        </div>
        <button class="botao" id="submit" name="submit" type="submit" onclick="removerMensagemSair(); return confirm('Enviar o formulário? Após o envio, entraremos em contato.');">Enviar</button>
        </form>
    </div>
</div>
<svg class=" wavesMtr" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
    </defs>
    <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
    </g>
</svg>
</div>
<footer class="main-footer">
    <div class="center" id="insta"><a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><img src="assets/images/insta.png" width="30px" height="30px" />
        </a></div>
    <div class="center" id="whats"><a href="https://wa.me/557182662374" target="_blank"><img src="assets/images/whats.png" width="30px" height="30px" />
        </a></div>
</footer>
<script src="assets/js/formulario.js"></script>
<script>
    function removerMensagemSair() {
        window.onbeforeunload = null;
    }
</script>
<script src="assets/js/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.aluno-login').click(function() {
            window.location.href = 'login_aluno.php';
        });

        $('.professor-login').click(function() {
            window.location.href = 'login_prof.php';
        });

        $('.diretor-login').click(function() {
            window.location.href = 'login.php';
        });

        $('.login-menu').click(function() {
            $('.sub-menu').toggle();
            if ($('.sub-menu').is(':visible')) {
                $('.login-menu i').removeClass('fa-caret-down').addClass('fa-caret-up');
            } else {
                $('.login-menu i').removeClass('fa-caret-up').addClass('fa-caret-down');
            }
        });
    });
</script>
</body>

</html>