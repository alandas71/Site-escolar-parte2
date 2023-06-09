<?php
class MatriculaModel extends pdoModel
{
    public function getVagas()
    {
        $query = "SELECT vaga FROM vagas";
        $vagas = $this->conn->query($query);

        return $vagas;
    }

    public function createVagas($nova_vaga)
    {
        $sql = "INSERT INTO vagas (vaga) VALUES ('$nova_vaga')";
        $this->conn->query($sql);
    }

    public function deleteVagas($excluir_vaga)
    {
        $sql = "DELETE FROM vagas WHERE vaga = '$excluir_vaga'";
        $this->conn->query($sql);
    }

    public function createAluno($email, $nome, $turno, $turma)
    {
        $num_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        if ($turno == 'Matutino') {
            $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma1) VALUES (:email, CONCAT('ceai', :num_aleatorio), :nome, 'aluno', 0, :turma)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email', $email);
            $result->bindParam(':num_aleatorio', $num_aleatorio);
            $result->bindParam(':nome', $nome);
            $result->bindParam(':turma', $turma);
            $result->execute();
        } else if ($turno == 'Vespertino') {
            $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma2) VALUES (:email, CONCAT('ceai', :num_aleatorio), :nome, 'aluno', 0, :turma)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email', $email);
            $result->bindParam(':num_aleatorio', $num_aleatorio);
            $result->bindParam(':nome', $nome);
            $result->bindParam(':turma', $turma);
            $result->execute();
        }
    }

    public function readMatriculas()
    {
        $sql = "SELECT * FROM matricula";
        $matriculas = $this->conn->query($sql);

        return $matriculas;
    }

    public function readMatriculasPorEmail($email)
    {
        $sql = "SELECT * FROM matricula WHERE email1 = :email";
        $matriculas = $this->conn->prepare($sql);
        $matriculas->bindParam(':email', $email);
        $matriculas->execute();

        $row = $matriculas->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deleteMatriculas($id)
    {
        $sql = "DELETE FROM matricula WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    public function getEmail()
    {
        $sql = "SELECT users.email FROM users INNER JOIN matricula ON users.email = matricula.email1 COLLATE utf8mb4_unicode_ci";
        $emails = $this->conn->prepare($sql);
        $emails->execute();

        return $emails;
    }

    public function parametroMatricula(
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
    ) {
        $stmt = $this->conn->prepare("INSERT INTO matricula(turma, turno, nome, rua, endereco, n, complemento, dataNascimento, genero, telefone, mae,
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
    }
}
