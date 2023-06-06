<?php

if (isset($_POST['submit'])) {

    include_once('../database/pdo_connection.php');

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



    $stmt = $conn->prepare("INSERT INTO matricula(turma, turno, nome, rua, endereco, n, complemento, dataNascimento, genero, telefone, mae,
    rg1, cpf1, dataNascimento1, rua1, bairro1, n1, complemento1, naturalidade1, grau1, civil1, religiao1, celular1, telefone1, email1, pai,  
    rg2, cpf2, dataNascimento2, rua2, bairro2, n2, complemento2, naturalidade2, grau2, civil2, religiao2, celular2, telefone2, email2, p1, p2,  
    p3, p4, p5, p6, sono, p8, p9, p10, p12, p13, p14, p16, vacinas, doencas, saude, medico, medicamento, sangue, alergia, celular3, celular4, autorizados1,  
    autorizados2, snimg) 
    VALUES (:turma, :turno, :nome, :rua, :endereco, :n, :complemento, :dataNascimento, :genero, :telefone, :mae,
    :rg1, :cpf1, :dataNascimento1, :rua1, :bairro1, :n1, :complemento1, :naturalidade1, :grau1, :civil1, :religiao1, :celular1, :telefone1, :email1, :pai,  
    :rg2, :cpf2, :dataNascimento2, :rua2, :bairro2, :n2, :complemento2, :naturalidade2, :grau2, :civil2, :religiao2, :celular2, :telefone2, :email2, :p1, :p2,  
    :p3, :p4, :p5, :p6, :sono, :p8, :p9, :p10, :p12, :p13, :p14, :p16, :vacinas, :doencas, :saude, :medico, :medicamento, :sangue, :alergia, :celular3, :celular4, :autorizados1,  
    :autorizados2, :snimg)");

    $stmt->bindValue(':turma', $turma);
    $stmt->bindValue(':turno', $turno);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':rua', $rua);
    $stmt->bindValue(':endereco', $endereco);
    $stmt->bindValue(':n', $n);
    $stmt->bindValue(':complemento', $complemento);
    $stmt->bindValue(':dataNascimento', $dataNascimento);
    $stmt->bindValue(':genero', $genero);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':mae', $mae);
    $stmt->bindValue(':rg1', $rg1);
    $stmt->bindValue(':cpf1', $cpf1);
    $stmt->bindValue(':dataNascimento1', $dataNascimento1);
    $stmt->bindValue(':rua1', $rua1);
    $stmt->bindValue(':bairro1', $bairro1);
    $stmt->bindValue(':n1', $n1);
    $stmt->bindValue(':complemento1', $complemento1);
    $stmt->bindValue(':naturalidade1', $naturalidade1);
    $stmt->bindValue(':grau1', $grau1);
    $stmt->bindValue(':civil1', $civil1);
    $stmt->bindValue(':religiao1', $religiao1);
    $stmt->bindValue(':celular1', $celular1);
    $stmt->bindValue(':telefone1', $telefone1);
    $stmt->bindValue(':email1', $email1);
    $stmt->bindValue(':pai', $pai);
    $stmt->bindValue(':rg2', $rg2);
    $stmt->bindValue(':cpf2', $cpf2);
    $stmt->bindValue(':dataNascimento2', $dataNascimento2);
    $stmt->bindValue(':rua2', $rua2);
    $stmt->bindValue(':bairro2', $bairro2);
    $stmt->bindValue(':n2', $n2);
    $stmt->bindValue(':complemento2', $complemento2);
    $stmt->bindValue(':naturalidade2', $naturalidade2);
    $stmt->bindValue(':grau2', $grau2);
    $stmt->bindValue(':civil2', $civil2);
    $stmt->bindValue(':religiao2', $religiao2);
    $stmt->bindValue(':celular2', $celular2);
    $stmt->bindValue(':telefone2', $telefone2);
    $stmt->bindValue(':email2', $email2);
    $stmt->bindValue(':p1', $p1);
    $stmt->bindValue(':p2', $p2);
    $stmt->bindValue(':p3', $p3);
    $stmt->bindValue(':p4', $p4);
    $stmt->bindValue(':p5', $p5);
    $stmt->bindValue(':p6', $p6);
    $stmt->bindValue(':sono', $sono);
    $stmt->bindValue(':p8', $p8);
    $stmt->bindValue(':p9', $p9);
    $stmt->bindValue(':p10', $p10);
    $stmt->bindValue(':p12', $p12);
    $stmt->bindValue(':p13', $p13);
    $stmt->bindValue(':p14', $p14);
    $stmt->bindValue(':p16', $p16);
    $stmt->bindValue(':vacinas', $vacinas);
    $stmt->bindValue(':doencas', $doencas);
    $stmt->bindValue(':saude', $saude);
    $stmt->bindValue(':medico', $medico);
    $stmt->bindValue(':medicamento', $medicamento);
    $stmt->bindValue(':sangue', $sangue);
    $stmt->bindValue(':alergia', $alergia);
    $stmt->bindValue(':celular3', $celular3);
    $stmt->bindValue(':celular4', $celular4);
    $stmt->bindValue(':autorizados1', $autorizados1);
    $stmt->bindValue(':autorizados2', $autorizados2);
    $stmt->bindValue(':snimg', $snimg);

    $stmt->execute();
    header("Location: matricula.php");
}
