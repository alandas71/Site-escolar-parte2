<?php

class dashboardController extends Controller
{
    public function index()
    {
        $num = new CountModel;
        $agenda = new agendaModel;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];

            $agenda->createEvent($title, $start, $end);

            header("location:" . BASE_URL . "dashboard");
            exit();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $agenda->deleteEvent($id);

            header("location:" . BASE_URL . "dashboard");
            exit();
        }

        $count = $num->getCountAlunos();
        $count2 = $num->getCountProfessor();
        $count3 = $num->getCountTurmas();
        $frequencias = $num->getQtAlunosPorTurma();
        $events = $agenda->readEvents();


        $dados = array(
            'count' => $count,
            'count2' => $count2,
            'count3' => $count3,
            'frequencias' => $frequencias,
            'events' => $events
        );

        $this->loadDashboardTemplate('dashboard_items', $dados);
    }

    public function estudantes()
    {
        $al = new EstudantesModel;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['remover_aluno'])) {
                $id = $_POST['remover_aluno'];

                $al->deleteAluno($id);
            }

            if (isset($_POST['adicionar_aluno'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $turma = $_POST['turma'];
                $turno = $_POST['turno'];

                if ($turno === 'Matutino') {
                    $turma1 = $turma;
                    $turma2 = null;
                } else if ($turno === 'Vespertino') {
                    $turma1 = null;
                    $turma2 = $turma;
                } else {
                    $turma1 = null;
                    $turma2 = null;
                }

                $al->createAluno($nome, $email, $senha, $turma1, $turma2);
            }

            header("location:" . BASE_URL . "dashboard/estudantes");
            exit();
        }

        $result_turmas = $al->readTurmas();
        $result_turma1 = $al->readTurma1();
        $result_turma2 = $al->readTurma2();

        $dados = array(
            'result_turmas' => $result_turmas,
            'result_turma1' => $result_turma1,
            'result_turma2' => $result_turma2
        );

        $this->loadDashboardTemplate('relacao_alunos', $dados);
    }

    public function professores()
    {
        $prof = new ProfessoresModel;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['remover_prof'])) {
                $id = $_POST['remover_prof'];

                $prof->deleteProf($id);
            }

            if (isset($_POST['adicionar_prof'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $turma = $_POST['turma'];
                $turno = $_POST['turno'];

                if ($turno === 'Matutino') {
                    $turma1 = $turma;
                    $turma2 = null;
                } else if ($turno === 'Vespertino') {
                    $turma1 = null;
                    $turma2 = $turma;
                } else {
                    $turma1 = null;
                    $turma2 = null;
                }
                $prof->createProf($nome, $email, $senha, $turma1, $turma2);
            }

            header("location:" . BASE_URL . "dashboard/professores");
            exit();
        }

        $result_turmas = $prof->readTurmas();
        $result_turma1 = $prof->readTurma1();
        $result_turma2 = $prof->readTurma2();

        $dados = array(
            'result_turmas' => $result_turmas,
            'result_turma1' => $result_turma1,
            'result_turma2' => $result_turma2
        );

        $this->loadDashboardTemplate('relacao_professores', $dados);
    }

    public function turmas()
    {
        $turmas = new TurmasModel;

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['atualizar'])) {
                $nome = $_POST["nome"];
                $turma = $_POST["turma"];
                $turno = $_POST["turno"];

                if ($turno == "Matutino") {
                    $turma_coluna = "turma1";
                } elseif ($turno == "Vespertino") {
                    $turma_coluna = "turma2";
                }

                $turmas->updateTurmas($turma_coluna, $turma, $nome);
            }

            if (isset($_POST['criar'])) {

                $turma = $_POST['turma'];
                $turno = $_POST['turno'];
                $vagas = $_POST['vagas'];

                $existeTurma = $turmas->verifyTurmas($turma, $turno);
                if ($existeTurma->fetch(PDO::FETCH_ASSOC) > 0) {
                    echo "<div style='color:red; margin-left:100px'>Essa turma já existe.</div>";
                } else {
                    $turmas->createTurmas($turma, $turno, $vagas);
                }
            }

            header("location:" . BASE_URL . "dashboard/turmas");
            exit();
        }

        if (isset($_GET['id'])) {
            $id_turma = $_GET['id'];

            $turmas->deleteTurmas($id_turma);

            header("location:" . BASE_URL . "dashboard/turmas");
            exit();
        }

        $result = $turmas->readTurmas();
        $nomes = $turmas->getDistinctUsers();
        $classes = $turmas->getDistinctTurmas();
        $result_quantidade_turma1 = $turmas->qtAlunosTurma1();
        $result_quantidade_turma2 = $turmas->qtAlunosTurma2();

        $dados = array(
            'result' => $result,
            'result_quantidade_turma1' => $result_quantidade_turma1,
            'result_quantidade_turma2' => $result_quantidade_turma2,
            'classes' => $classes,
            'nomes' => $nomes
        );

        $this->loadDashboardTemplate('turma', $dados);
    }

    public function horarios()
    {
        $horarios = new HorarioModel;

        if (isset($_FILES['imagem'])) {
            $file_size = $_FILES['imagem']['size'];
            $file_tmp = $_FILES['imagem']['tmp_name'];
            $file_type = $_FILES['imagem']['type'];

            $allowed_types = array('image/jpeg', 'image/png', 'image/gif');

            if (in_array($file_type, $allowed_types) === false) {
                echo 'O tipo de arquivo não é permitido. Por favor, envie uma imagem no formato JPEG, PNG ou GIF.';
            } elseif ($file_size > 5242880) {
                echo 'O tamanho do arquivo deve ser no máximo 5MB.';
            } else {
                $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/horarios/';
                $file_extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $file_name = uniqid() . '.' . $file_extension;
                $file_path = $upload_dir . $file_name;

                if (move_uploaded_file($file_tmp, $file_path)) {

                    $turma = $_POST['turma'];
                    $turno = $_POST['turno'];
                    $horarios = new HorarioModel;

                    $count = $horarios->getCountHorarios($turma, $turno);
                    if ($count > 0) {
                        $horarios->updateHorarios($file_name, $turma, $turno);
                    } else {
                        $horarios->createHorarios($file_name, $turma, $turno);
                    }
                } else {
                    echo 'Falha ao mover o arquivo enviado.';
                }
            }

            header("location:" . BASE_URL . "dashboard/horarios");
            exit();
        }

        $turmas = $horarios->getTurmas();
        $turnos = $horarios->getTurnos();
        $count = $horarios->getCountHorarios();

        $dados = array(
            'turmas' => $turmas,
            'turnos' => $turnos,
            'horarios' => $horarios,
            'count' => $count
        );

        $this->loadDashboardTemplate('set_horario', $dados);
    }

    public function matriculas()
    {

        $matriculas = new MatriculaModel;
        $turmas = new TurmasModel;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_POST['nova_vaga'])) {
                $nova_vaga = $_POST['nova_vaga'];

                $matriculas->createVagas($nova_vaga);
            }

            if (isset($_POST['excluir'])) {
                $excluir_vaga = $_POST['vaga'];

                $matriculas->deleteVagas($excluir_vaga);
            }

            header("location:" . BASE_URL . "dashboard/matriculas");
            exit();
        }


        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $matriculas->deleteMatriculas($id);

            header("location:" . BASE_URL . "dashboard/matriculas");
            exit();
        }

        $email = isset($_GET["email"]) ? $_GET["email"] : "";
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
        $turno = isset($_GET["turno"]) ? $_GET["turno"] : "";
        $turma = isset($_GET["turma"]) ? $_GET["turma"] : "";

        $matriculas->createAluno($email, $nome, $turno, $turma);



        $emails = $matriculas->getEmail();
        $classes = $turmas->getDistinctTurmas();
        $vagas = $matriculas->getVagas();
        $mtr =  $matriculas->readMatriculas();


        $dados = array(
            'classes' => $classes,
            'vagas'  => $vagas,
            'mtr' => $mtr,
            'emails' => $emails
        );

        $this->loadDashboardTemplate('print_matricula', $dados);
    }

    public function album()
    {
        $album = new AlbumModel;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['criar_album'])) {

                $nome_album = $_POST["nome_album"];
                $capa_album = $_FILES["capa_album"]["name"];
                $nome_album = str_replace(" ", "", $nome_album);

                $nome_unico = uniqid();
                $extensao = strtolower(pathinfo($_FILES['capa_album']['name'], PATHINFO_EXTENSION));

                if ($extensao != 'png' && $extensao != 'jpg') {
                    echo 'Formato não permitido';
                    exit();
                }

                $nome_arquivo = $nome_unico . "." . $extensao;
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/album/';
                $target_file = $target_dir . $nome_arquivo;
                move_uploaded_file($_FILES["capa_album"]["tmp_name"], $target_file);

                $album->createAlbum($nome_album, $nome_arquivo);
            }

            if (isset($_POST['id_album']) && isset($_POST['nova_foto'])) {
                $id_album = $_POST["id_album"];
                $num_fotos = count($_FILES["nova_foto"]["name"]);

                for ($i = 0; $i < $num_fotos; $i++) {
                    $nome_original = $_FILES["nova_foto"]["name"][$i];
                    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

                    if ($extensao != 'png' && $extensao != 'jpg') {
                        $_SESSION['mensagem'] = "Erro, só é permitido adicionar imagens PNG ou JPG.";
                        exit();
                    }

                    $nome_aleatorio = uniqid();
                    $nome_foto = $nome_aleatorio . '.' . $extensao;
                    $caminho_foto = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/album/fotos/' . $nome_foto;
                    move_uploaded_file($_FILES['nova_foto']['tmp_name'][$i], $caminho_foto);

                    $album->createFotos($id_album, $nome_foto);
                }
            }

            if (isset($_POST["excluir_album"])) {
                $id_album = $_POST["id_album"];
                $id_album_to_delete = $id_album;

                $result = $album->verifyAlbum($id_album);

                foreach ($result as $row) {
                    $caminho_foto =  $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/album/fotos/' . $row["foto"];
                    if (file_exists($caminho_foto)) {
                        unlink($caminho_foto);
                    }
                    $id_foto = $row["id_album"];

                    $album->deleteAllFotos($id_foto);
                }


                $capa = $album->getCapa($id_album_to_delete);

                $row = $capa->fetch(PDO::FETCH_ASSOC);
                $nome_capa = $row['capa'];

                $album->deleteAlbum($id_album_to_delete);

                $caminho_capa =  $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/album/" . $nome_capa;
                if (file_exists($caminho_capa)) {
                    unlink($caminho_capa);
                }
            }

            if (isset($_POST['excluir_fotos'])) {
                $id_album = $_POST['id_album'];

                $result = $album->verifyAlbum($id_album);

                foreach ($result as $row) {
                    $id = $row['id'];
                    $result2 = $album->readFotosPorId($id);
                    $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                    $nome_arquivo = $row2['foto'];

                    $album->deleteFotosPorId($id);

                    $diretorio =  $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/album/fotos/";
                    $caminho_arquivo = $diretorio . $nome_arquivo;
                    unlink($caminho_arquivo);
                }
            }

            header("location:" . BASE_URL . "dashboard/album");
            exit();
        }

        $albuns = $album->getAlbum();

        $dados = array(
            'albuns' => $albuns,
        );

        $this->loadDashboardTemplate('painel_album', $dados);
    }

    public function site()
    {
        $site = new siteModel;

        if (isset($_POST['excluir_banner'])) {
            $id = $_POST['id'];

            $result = $site->readBannersPorId($id);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $nome_arquivo = $row['imagem'];

            $site->deleteBannersPorId($id);

            $diretorio =  $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/banners/';
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_banner'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            $site->updateSituacaoBanner($situacao, $id);

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['submitBanner'])) {

            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/banners/";
            $nome_arquivo = basename($_FILES['image']['name']);
            $nome_aleatorio = uniqid();
            $extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));


            if ($extensao != 'png' && $extensao != 'jpg') {
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

                $site->createBanners($nome_arquivo);
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['submitDepoimentos'])) {
            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/depoimentos/";

            $nome_arquivo = basename($_FILES['image']['name']);
            $nome_aleatorio = uniqid();
            $extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));


            if ($extensao != 'png' && $extensao != 'jpg') {
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

                $site->createDepoimentos($nome_arquivo);
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['submitProf'])) {

            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/professores/";

            $nome_arquivo = basename($_FILES['image']['name']);
            $nome_aleatorio = uniqid();
            $extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));


            if ($extensao != 'png' && $extensao != 'jpg') {
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            $nome = $_POST['nome'];
            $info = $_POST['info'];

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

                $site->createProf($nome_arquivo, $nome, $info);
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }


        if (isset($_POST['excluir_prof'])) {
            $id = $_POST['id'];

            $result = $site->readProfPorId($id);

            $row = $result->fetch(PDO::FETCH_ASSOC);
            $nome_arquivo = $row['face'];

            $site->deleteProfPorId($id);

            $diretorio =  $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/professores/";
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);
            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_prof'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            $site->updateProf($situacao, $id);

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['excluir_depoimentos'])) {
            $id = $_POST['id'];

            $result = $site->readDepoimentosPorId($id);

            $row = $result->fetch(PDO::FETCH_ASSOC);
            $nome_arquivo = $row['depoimento'];

            $site->deleteDepoimentosPorId($id);

            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/depoimentos/";
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);
            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_depoimentos'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            $site->updateDepoimentos($id, $situacao);

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        $dados = array(
            'resultadoBanners' =>  $site->getBanners(),
            'resultadoProf' => $site->getProf(),
            'resultadoDepoimentos' => $site->getDepoimentos()
        );

        $this->loadDashboardTemplate('painel', $dados);
    }
}
