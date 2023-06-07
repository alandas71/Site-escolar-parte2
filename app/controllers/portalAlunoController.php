<?php
class portalAlunoController extends Controller
{
    public function index()
    {
        $horario = new HorarioModel;
        $cliente = new ClienteModel;

        $id  = $_SESSION["usuario"][2];

        $turmas = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : array();

        if (isset($_FILES['foto']) && isset($_POST['cropped-image'])) {

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/clientes/';
            $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $extension;
            $targetFilePath = $targetDir . $fileName;

            $row = $cliente->readFoto($id);
            $oldFilePath = $row['foto'];
            if (!empty($oldFilePath)) {
                unlink($oldFilePath);
            }

            $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            if (in_array($fileType, $allowTypes)) {

                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {

                    $cliente->updateFoto($fileName, $id);

                    header("location:" . BASE_URL . "portalAluno");
                } else {
                    echo "Ocorreu um erro ao enviar a imagem.";
                }
            } else {
                header("location:" . BASE_URL . "portalAluno");
            }
        }

        $resultado = $horario->readHorario($turmas);

        $dados = array(
            'horario' => $resultado,
        );

        $this->loadPortalTemplate('horario', $dados);
    }

    public function notas()
    {
        $boletim = new NotasModel;

        $turma2 = $_SESSION["usuario"][4];
        $turma1 = $_SESSION["usuario"][3];
        $id_aluno = $_SESSION["usuario"][2];
        $nome = $_SESSION["usuario"][0];

        $boletim->setIdAluno($id_aluno);
        $result =  $boletim->readNotas($id_aluno);

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

        $dados = array(
            'id' => $id_aluno,
            'nome' => $nome,
            'turma1' => $turma1,
            'turma2' => $turma2,
            'notas_materias' => $notas_materias
        );

        $this->loadPortalTemplate('boletim_view', $dados);
    }

    public function calendario()
    {
        $agenda = new AgendaModel;

        $dados = array('events' => $agenda->readEvents());

        $this->loadPortalTemplate('agendaView', $dados);
    }
}
