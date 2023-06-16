<?php
class AlbumModel extends Model
{
    public function getAlbum()
    {
        $query_album = "SELECT id, capa, id_album FROM albuns WHERE situacao = 1";
        $result_album = $this->conn->query($query_album);

        $albuns = array();
        if ($result_album->rowCount() > 0) {
            while ($row_albuns = $result_album->fetch(PDO::FETCH_ASSOC)) {
                $albuns[] = $row_albuns;
            }
        }

        return $albuns;
    }

    public function getFotos($id_album)
    {
        $query_foto = "SELECT id, foto, id_album FROM fotos WHERE situacao = 1 AND id_album = :id_album";
        $result_foto = $this->conn->prepare($query_foto);
        $result_foto->bindValue(':id_album', $id_album, PDO::PARAM_STR);
        $result_foto->execute();

        $fotos = array();
        if ($result_foto->rowCount() > 0) {
            while ($row_fotos = $result_foto->fetch(PDO::FETCH_ASSOC)) {
                $fotos[] = $row_fotos;
            }
        }

        return $fotos;
    }

    public function createAlbum($nome_album, $nome_arquivo)
    {
        $sql = "INSERT INTO albuns (id_album, capa, situacao) VALUES (:nome_album, :nome_arquivo, '1')";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':nome_album', $nome_album);
        $result->bindParam(':nome_arquivo', $nome_arquivo);
        $result->execute();

        return true;
    }

    public function createFotos($id_album, $nome_foto)
    {
        $sql = "INSERT INTO fotos (id_album, foto, situacao) VALUES (:id_album, :nome_foto, '1')";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id_album', $id_album);
        $result->bindParam(':nome_foto', $nome_foto);
        $result->execute();

        return true;
    }

    public function verifyAlbum($id_album)
    {
        $sql = "SELECT id ,id_album, foto FROM fotos WHERE id_album = :id_album";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id_album', $id_album);
        $result->execute();

        return $result;
    }

    public function readFotosPorId($id)
    {
        $sql = "SELECT * FROM fotos WHERE id = :id";
        $result2 = $this->conn->prepare($sql);
        $result2->bindParam(':id', $id);
        $result2->execute();

        return $result2;
    }

    public function deleteFotosPorId($id)
    {
        $sql = "DELETE FROM fotos WHERE id = :id";
        $foto = $this->conn->prepare($sql);
        $foto->bindParam(':id', $id);
        $foto->execute();

        return true;
    }

    public function deleteAllFotos($id_foto)
    {
        $sql = "DELETE FROM fotos WHERE id_album = :id_foto";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id_foto', $id_foto);
        $result->execute();

        return true;
    }

    public function deleteAlbum($id_album_to_delete)
    {
        $sql = "DELETE FROM albuns WHERE id_album = :id_album_to_delete";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id_album_to_delete', $id_album_to_delete);
        $result->execute();

        return true;
    }

    public function getCapa($id_album_to_delete)
    {
        $sql = "SELECT capa FROM albuns WHERE id_album = :id_album_to_delete";
        $capa = $this->conn->prepare($sql);
        $capa->bindParam(':id_album_to_delete', $id_album_to_delete);
        $capa->execute();

        return $capa;
    }
}
