<?php

class portalProfController extends Controller
{
    public function index()
    {
        $horario = new HorarioModel;

        $turmas = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : array();

        $resultado = $horario->readHorario($turmas);

        $dados = array(
            'horario' => $resultado,
        );

        $this->loadAmbienteTemplate('horario', $dados);
    }

    public function minhasTurmas()
    {

        $turmas = new TurmasModel;
        $id = $_SESSION["usuario"][2];
        $id_professor = $id;

        $dados = array(
            'alunos_turma1' => $turmas->readTurma1($id_professor),
            'alunos_turma2' => $turmas->readTurma2($id_professor),
        );

        $this->loadAmbienteTemplate('minhas_turmas', $dados);
    }

    public function notas($id_aluno)
    {
        $boletim = new NotasModel;

        $boletim->setIdAluno($id_aluno);
        $result =  $boletim->readNotas($id_aluno);
        $nome = $boletim->readAlunoName();

        $notas = [];
        $faltas = [];

        $notas_materias = [
            ['nome' => 'Matemática', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'Português', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'História', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'Ciências', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'Geografia', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'Artes', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
            ['nome' => 'Inglês', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
        ];

        foreach ($result as $row) {
            $materia = $row['materia'];
            $nota1 = $row['nota1'];
            $nota2 = $row['nota2'];
            $nota3 = $row['nota3'];
            $nota4 = $row['nota4'];
            $falta1 = $row['falta1'];
            $falta2 = $row['falta2'];
            $falta3 = $row['falta3'];
            $falta4 = $row['falta4'];
            $media = $row['media'];
            $faltas = $row['faltas'];
            $resultado = $row['resultado'];

            foreach ($notas_materias as &$materia_atual) {
                if ($materia_atual['nome'] == $materia) {
                    $materia_atual['nota1'] = $nota1;
                    $materia_atual['nota2'] = $nota2;
                    $materia_atual['nota3'] = $nota3;
                    $materia_atual['nota4'] = $nota4;
                    $materia_atual['falta1'] = $falta1;
                    $materia_atual['falta2'] = $falta2;
                    $materia_atual['falta3'] = $falta3;
                    $materia_atual['falta4'] = $falta4;
                    $materia_atual['media'] = $media;
                    $materia_atual['faltas'] = $faltas;
                    $materia_atual['resultado'] = $resultado;
                    break;
                }
            }
        }


        foreach ($_POST as $key => $value) {

            if (strpos($key, '_nota1') !== false) {
                $materia = str_replace('_nota1', '', $key);
                $notas = array_filter([
                    $_POST[$key],
                    $_POST[str_replace('_nota1', '_nota2', $key)],
                    $_POST[str_replace('_nota1', '_nota3', $key)],
                    $_POST[str_replace('_nota1', '_nota4', $key)],
                ]);
                $faltas = array_filter([
                    $_POST[str_replace('_nota1', '_falta1', $key)],
                    $_POST[str_replace('_nota1', '_falta2', $key)],
                    $_POST[str_replace('_nota1', '_falta3', $key)],
                    $_POST[str_replace('_nota1', '_falta4', $key)],
                ]);
                $media = number_format(array_sum($notas) / count($notas), 1);
                $total_faltas = array_sum($faltas);

                if (!empty($notas) && !empty($faltas) && count($notas) == 4) {
                    $resultado = $media >= 6 ? 'Aprovado' : 'Recuperação';
                    if ($total_faltas > 50) {
                        $resultado = 'Recuperação';
                    }
                } else {
                    $resultado = null;
                }
            }

            $existe = $boletim->existeNota($id_aluno, $materia);
            if ($existe) {
                $boletim->exiteAtualiza($notas, $faltas, $total_faltas, $media, $resultado, $id_aluno, $materia);
                header('Location: ' . BASE_URL . 'portalProf/minhasTurmas');
            } else {
                $boletim->naoExisteInsere($id_aluno, $materia, $notas, $faltas, $total_faltas, $media, $resultado);
                header('Location: ' . BASE_URL . 'portalProf/minhasTurmas');
            }
        }

        $dados = array(
            'notas_materias' => $notas_materias,
            'nome' => $nome,
            'id_aluno' => $boletim->getIdAluno()
        );

        $this->loadView('boletim_prof', $dados);
    }
}
