<?php

class matriculaController extends Controller
{
    public function index()
    {
        $matriculaModel = new MatriculaModel;

        $dados = array(
            'vagas' => $matriculaModel->getVagas()
        );

        $this->loadTemplate('matricula', $dados);
    }
}
