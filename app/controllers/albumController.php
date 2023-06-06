<?php
class AlbumController extends Controller
{
    public function index()
    {
        $albumModel = new AlbumModel();
        $albuns = $albumModel->getAlbum();

        $dados = array(
            'albuns' => $albuns,
            'albumModel' => $albumModel
        );

        $this->loadTemplate('album', $dados);
    }
}
