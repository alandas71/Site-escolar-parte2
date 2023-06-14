<?php

class matriculaController extends Controller
{
    public function index()
    {
        $matriculaModel = new MatriculaModel;

        if (isset($_POST['submit'])) {

            function aplicarFiltro($valor)
            {
                $valor = filter_var($valor, FILTER_SANITIZE_SPECIAL_CHARS);
                return $valor;
            }

            function filtrarEmail($email)
            {
                $emailFiltrado = filter_var($email, FILTER_VALIDATE_EMAIL);
                return $emailFiltrado;
            }


            // Dados do filho
            $turma = aplicarFiltro($_POST['turma']);
            $turno = aplicarFiltro($_POST['turno']);
            $nome = aplicarFiltro($_POST['nome']);
            $rua = aplicarFiltro($_POST['rua']);
            $endereco = aplicarFiltro($_POST['bairro']);
            $n = aplicarFiltro($_POST['n']);
            $complemento = aplicarFiltro($_POST['complemento']);
            $dataNascimento = aplicarFiltro($_POST['data_nascimento']);
            $dataNascimento = date('d/m/Y', strtotime($dataNascimento));
            $genero = aplicarFiltro($_POST['genero']);
            $telefone = aplicarFiltro($_POST['telefone']);

            // Dados da mãe
            $mae = aplicarFiltro($_POST['mae']);
            $rg1 = aplicarFiltro($_POST['rg1']);
            $cpf1 = aplicarFiltro($_POST['cpf1']);
            $dataNascimento1 = aplicarFiltro($_POST['data_nascimento1']);
            $dataNascimento1 = date('d/m/Y', strtotime($dataNascimento1));
            $rua1 = aplicarFiltro($_POST['rua1']);
            $bairro1 = aplicarFiltro($_POST['bairro1']);
            $n1 = aplicarFiltro($_POST['n1']);
            $complemento1 = aplicarFiltro($_POST['complemento1']);
            $naturalidade1 = aplicarFiltro($_POST['naturalidade1']);
            $grau1 = aplicarFiltro($_POST['grau1']);
            $civil1 = aplicarFiltro($_POST['civil1']);
            $religiao1 = aplicarFiltro($_POST['religiao1']);
            $celular1 = aplicarFiltro($_POST['celular1']);
            $telefone1 = aplicarFiltro($_POST['telefone1']);
            $email1 = filtrarEmail($_POST['email1']);

            // Dados do pai
            $pai = aplicarFiltro($_POST['pai']);
            $rg2 = aplicarFiltro($_POST['rg2']);
            $cpf2 = aplicarFiltro($_POST['cpf2']);
            $dataNascimento2 = aplicarFiltro($_POST['data_nascimento2']);
            $dataNascimento2 = date('d/m/Y', strtotime($dataNascimento2));
            $rua2 = aplicarFiltro($_POST['rua2']);
            $bairro2 = aplicarFiltro($_POST['bairro2']);
            $n2 = aplicarFiltro($_POST['n2']);
            $complemento2 = aplicarFiltro($_POST['complemento2']);
            $naturalidade2 = aplicarFiltro($_POST['naturalidade2']);
            $grau2 = isset($_POST["grau2"]) && $_POST["grau2"] != "" ? aplicarFiltro($_POST["grau2"]) : null;
            $civil2 = isset($_POST["civil1"]) && $_POST["civil1"] != "" ? aplicarFiltro($_POST["civil1"]) : null;
            $religiao2 = aplicarFiltro($_POST['religiao2']);
            $celular2 = aplicarFiltro($_POST['celular2']);
            $telefone2 = aplicarFiltro($_POST['telefone2']);
            $email2 = filtrarEmail($_POST['email2']);

            // Dados adicionais
            $p1 = aplicarFiltro($_POST['1']);
            $p2 = aplicarFiltro($_POST['2']);
            $p3 = aplicarFiltro($_POST['3']);
            $p4 = aplicarFiltro($_POST['4']);
            $p5 = aplicarFiltro($_POST['5']);
            $p6 = aplicarFiltro($_POST['6']);
            $sono = aplicarFiltro($_POST['sono']);
            $p8 = aplicarFiltro($_POST['8']);
            $p9 = aplicarFiltro($_POST['9']);
            $p10 = aplicarFiltro($_POST['10']);
            $p12 = aplicarFiltro($_POST['12']);
            $p13 = aplicarFiltro($_POST['13']);
            $p14 = aplicarFiltro($_POST['14']);
            $p16 = aplicarFiltro($_POST['16']);

            $vacinas = aplicarFiltro($_POST['vacinas']);
            $doencas = aplicarFiltro($_POST['doencas']);
            $saude = aplicarFiltro($_POST['saude']);
            $medico = aplicarFiltro($_POST['medico']);
            $medicamento = aplicarFiltro($_POST['medicamento']);
            $sangue = aplicarFiltro($_POST['sangue']);
            $alergia = aplicarFiltro($_POST['alergia']);
            $celular3 = aplicarFiltro($_POST['celular3']);
            $celular4 = aplicarFiltro($_POST['celular4']);
            $autorizados1 = aplicarFiltro($_POST['autorizados1']);
            $autorizados2 = aplicarFiltro($_POST['autorizados2']);
            $snimg = aplicarFiltro($_POST['snimg']);


            $matriculaModel->parametroMatricula(
                $turma,
                $turno,
                $nome,
                $rua,
                $endereco,
                $n,
                $complemento,
                $dataNascimento,
                $genero,
                $telefone,
                $mae,
                $rg1,
                $cpf1,
                $dataNascimento1,
                $rua1,
                $bairro1,
                $n1,
                $complemento1,
                $naturalidade1,
                $grau1,
                $civil1,
                $religiao1,
                $celular1,
                $telefone1,
                $email1,
                $pai,
                $rg2,
                $cpf2,
                $dataNascimento2,
                $rua2,
                $bairro2,
                $n2,
                $complemento2,
                $naturalidade2,
                $grau2,
                $civil2,
                $religiao2,
                $celular2,
                $telefone2,
                $email2,
                $p1,
                $p2,
                $p3,
                $p4,
                $p5,
                $p6,
                $sono,
                $p8,
                $p9,
                $p10,
                $p12,
                $p13,
                $p14,
                $p16,
                $vacinas,
                $doencas,
                $saude,
                $medico,
                $medicamento,
                $sangue,
                $alergia,
                $celular3,
                $celular4,
                $autorizados1,
                $autorizados2,
                $snimg
            );
        }

        $dados = array(
            'vagas' => $matriculaModel->getVagas()
        );

        $this->loadTemplate('matricula', $dados);
    }
}
