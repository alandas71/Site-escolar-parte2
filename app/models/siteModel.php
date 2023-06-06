<?php

class siteModel extends pdoModel
{
    public function getBanners()
    {
        $query_slides = "SELECT * FROM slides";
        $result_slides = $this->conn->query($query_slides);

        if ($result_slides->rowCount() > 0) {
            return $result_slides;
        }
    }

    public function createBanners($nome_arquivo)
    {
        $sql = "INSERT INTO slides (imagem, situacao) VALUES (:nome_arquivo , '2')";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':nome_arquivo', $nome_arquivo);
        $result->execute();
    }


    public function readBannersPorId($id)
    {
        $sql = "SELECT * FROM slides WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();

        return $result;
    }

    public function updateSituacaoBanner($situacao, $id)
    {
        $sql = "UPDATE slides SET situacao = :situacao WHERE id = :id ";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':situacao', $situacao);
        $result->execute();
    }

    public function deleteBannersPorId($id)
    {
        $sql = "DELETE FROM slides WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    public function getProf()
    {
        $sql = "SELECT * FROM professores";
        $result_prof = $this->conn->query($sql);

        if ($result_prof->rowCount() > 0) {
            return $result_prof;
        }
    }

    public function createDepoimentos($nome_arquivo)
    {
        $sql = "INSERT INTO depoimentos (depoimento, situacao) VALUES (:nome_arquivo, '2')";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':nome_arquivo', $nome_arquivo);
        $result->execute();
    }

    public function createProf($nome_arquivo, $nome, $info)
    {
        $sql = "INSERT INTO professores (face, nome, info, situacao) VALUES (:nome_arquivo, :nome, :info, '2')";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':nome_arquivo', $nome_arquivo);
        $result->bindParam(':nome', $nome);
        $result->bindParam(':info', $info);
        $result->execute();
    }

    public function readProfPorId($id)
    {
        $sql = "SELECT * FROM professores WHERE id = :id";
        $resultProf = $this->conn->prepare($sql);
        $resultProf->bindParam(':id', $id);
        $resultProf->execute();

        return $resultProf;
    }

    public function deleteProfPorId($id)
    {
        $sql = "DELETE FROM professores WHERE id = :id";
        $resultProf = $this->conn->prepare($sql);
        $resultProf->bindParam(':id', $id);
        $resultProf->execute();
    }

    public function updateProf($situacao, $id)
    {
        $sql = "UPDATE professores SET situacao = :situacao WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':situacao', $situacao);
        $result->execute();
    }

    public function getDepoimentos()
    {
        $sql = "SELECT * FROM depoimentos";
        $result_depoimentos = $this->conn->query($sql);

        if ($result_depoimentos->rowCount() > 0) {
            return $result_depoimentos;
        }
    }

    public function readDepoimentosPorId($id)
    {
        $sql = "SELECT * FROM depoimentos WHERE id = :id";
        $resultDepoimentos = $this->conn->prepare($sql);
        $resultDepoimentos->bindParam(':id', $id);
        $resultDepoimentos->execute();

        return $resultDepoimentos;
    }

    public function deleteDepoimentosPorId($id)
    {
        $sql = "DELETE FROM depoimentos WHERE id = :id";
        $resultProf = $this->conn->prepare($sql);
        $resultProf->bindParam(':id', $id);
        $resultProf->execute();
    }

    public function updateDepoimentos($id, $situacao)
    {
        $sql = "UPDATE depoimentos SET situacao = :situacao WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':situacao', $situacao);
        $result->execute();
    }
}
