<?php
class homeController extends Controller
{
    public function index()
    {
        $homeModel = new homeModel();

        $dados = array(
            'imagem' => $homeModel->getBanners(),
            'prof' => $homeModel->getProfessores(),
            'depoimentos' => $homeModel->getDepoimentos()
        );

        $this->loadView('index', $dados);
    }
}
