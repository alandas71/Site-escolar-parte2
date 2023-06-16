<?php
class homeModel extends Model
{
    public function getBanners()
    {
        $query_slides = "SELECT imagem FROM slides WHERE situacao = 1";
        $result_slides = $this->conn->query($query_slides);

        if ($result_slides->rowCount() > 0) {
            return $result_slides;
        }
    }

    public function getProfessores()
    {
        $query_prof = "SELECT face, nome, info FROM professores WHERE situacao = 1";
        $result_prof = $this->conn->query($query_prof);

        if ($result_prof->rowCount() > 0) {
            return $result_prof;
        }
    }

    public function getDepoimentos()
    {
        $query_depoimentos = "SELECT depoimento FROM depoimentos WHERE situacao = 1";
        $result_depoimentos = $this->conn->query($query_depoimentos);


        if ($result_depoimentos->rowCount() > 0) {
            return $result_depoimentos;
        }
    }
}
