<?php

if (isset($_POST['submit'])) {

    include_once('configServer.php');

    //dados filho
    $turma =   $_POST['turma'];
    $turno =   $_POST['turno'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $endereco = $_POST['bairro'];
    $n = $_POST['n'];
    $complemento = $_POST['complemento'];
    $dataNascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];

    //dados mae
    $mae = $_POST['mae'];
    $rg1 = $_POST['rg1'];
    $cpf1 = $_POST['cpf1'];
    $dataNascimento1 = $_POST['data_nascimento1'];
    $rua1 = $_POST['rua1'];
    $bairro1 = $_POST['bairro1'];
    $n1 = $_POST['n1'];
    $complemento1 = $_POST['complemento1'];
    $naturalidade1 = $_POST['naturalidade1'];
    $grau1 = $_POST['grau1'];
    $civil1 = $_POST['civil1'];
    $religiao1 = $_POST['religiao1'];
    $celular1 = $_POST['celular1'];
    $telefone1 = $_POST['telefone1'];
    $email1 = $_POST['email1'];


    //dados pai
    $pai = $_POST['pai'];
    $rg2 = $_POST['rg2'];
    $cpf2 = $_POST['cpf2'];
    $dataNascimento2 = $_POST['data_nascimento2'];
    $rua2 = $_POST['rua2'];
    $bairro2 = $_POST['bairro2'];
    $n2 = $_POST['n2'];
    $complemento2 = $_POST['complemento2'];
    $naturalidade2 = $_POST['naturalidade2'];
    $grau2 = isset($_POST["grau2"]) && $_POST["grau2"] != "" ? $_POST["grau2"] : null;
    $civil2 = isset($_POST["civil1"]) && $_POST["civil1"] != "" ? $_POST["civil1"] : null;
    $religiao2 = $_POST['religiao2'];
    $celular2 = $_POST['celular2'];
    $telefone2 = $_POST['telefone2'];
    $email2 = $_POST['email2'];

    //dados adicionais // nao tem 7,11 e 15
    $p1 = $_POST['1'];
    $p2 = $_POST['2'];
    $p3 = $_POST['3'];
    $p4 = $_POST['4'];
    $p5 = $_POST['5'];
    $p6 = $_POST['6'];
    $sono = $_POST['sono'];
    $p8 = $_POST['8'];
    $p9 = $_POST['9'];
    $p10 = $_POST['10'];
    $p12 = $_POST['12'];
    $p13 = $_POST['13'];
    $p14 = $_POST['14'];
    $p16 = $_POST['16'];

    $vacinas = $_POST['vacinas'];
    $doencas = $_POST['doencas'];
    $saude = $_POST['saude'];
    $medico = $_POST['medico'];
    $medicamento = $_POST['medicamento'];
    $sangue = $_POST['sangue'];
    $alergia = $_POST['alergia'];
    $celular3 = $_POST['celular3'];
    $celular4 = $_POST['celular4'];
    $autorizados1 = $_POST['autorizados1'];
    $autorizados2 = $_POST['autorizados2'];
    $snimg = $_POST['snimg'];



    $result = mysqli_query($conn, "INSERT INTO matricula(turma,turno,nome,rua,endereco,n,complemento,dataNascimento,genero,telefone,mae,
 rg1,cpf1,dataNascimento1,rua1,bairro1,n1,complemento1,naturalidade1,grau1,civil1,religiao1,celular1,telefone1,email1,pai,  
 rg2,cpf2,dataNascimento2,rua2,bairro2,n2,complemento2,naturalidade2,grau2,civil2,religiao2,celular2,telefone2,email2,p1,p2,  
 p3,p4,p5,p6,sono,p8,p9,p10,p12,p13,p14,p16,vacinas,doencas,saude,medico,medicamento,sangue,alergia,celular3,celular4,autorizados1,  
 autorizados2,snimg) 
 VALUES ('$turma','$turno','$nome','$rua','$endereco','$n','$complemento','$dataNascimento','$genero','$telefone','$mae','$rg1','$cpf1','$dataNascimento1','$rua1','$bairro1',
 '$n1','$complemento1','$naturalidade1','$grau1','$civil1','$religiao1','$celular1','$telefone1','$email1','$pai','$rg2','$cpf2','$dataNascimento2','$rua2',
'$bairro2','$n2','$complemento2','$naturalidade2','$grau2','$civil2','$religiao2','$celular2','$telefone2','$email2','$p1','$p2','$p3','$p4','$p5','$p6','$sono','$p8','$p9',
'$p10','$p12','$p13','$p14','$p16','$vacinas','$doencas','$saude','$medico','$medicamento','$sangue','$alergia','$celular3','$celular4','$autorizados1',
'$autorizados2','$snimg')");
}
