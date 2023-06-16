<?php

class dashboardController extends Controller
{
    public function index($id = null)
    {
        $num = new CountModel;
        $agenda = new agendaModel;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];

            if ($agenda->createEvent($title, $start, $end)) {
                $_SESSION['message'] = 'Evento criado com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao criar evento.';
                $_SESSION['alertClass'] = 'danger';
            }
            exit;
        }

        if ($id != null) {
            if ($agenda->deleteEvent($id)) {
                $_SESSION['message'] = 'Evento excluído com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir evento.';
                $_SESSION['alertClass'] = 'danger';
            }
            exit;
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
            'events' => $events,
        );

        $this->loadDashboardTemplate('dashboard_items', $dados);
    }

    public function estudantes($id = null)
    {
        $al = new EstudantesModel;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($id != null) {

                if ($al->deleteAluno($id)) {
                    $_SESSION['message'] = 'Aluno excluído com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao excluir aluno.';
                    $_SESSION['alertClass'] = 'danger';
                }
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

                if ($al->createAluno($nome, $email, $senha, $turma1, $turma2)) {
                    $_SESSION['message'] = 'Aluno criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar aluno.';
                    $_SESSION['alertClass'] = 'danger';
                }
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
            'result_turma2' => $result_turma2,
        );

        $this->loadDashboardTemplate('relacao_alunos', $dados);
    }

    public function professores($id = null)
    {
        $prof = new ProfessoresModel;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($id != null) {

                if ($prof->deleteProf($id)) {
                    $_SESSION['message'] = 'Professor excluído com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao excluir professor.';
                    $_SESSION['alertClass'] = 'danger';
                }
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

                if ($prof->createProf($nome, $email, $senha, $turma1, $turma2)) {
                    $_SESSION['message'] = 'Professor criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar professor.';
                    $_SESSION['alertClass'] = 'danger';
                }
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

    public function turmas($id_turma = null)
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

                if ($turmas->updateTurmas($turma_coluna, $turma, $nome)) {
                    $_SESSION['message'] = 'Turma trocada com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao trocar turma.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }

            if (isset($_POST['criar'])) {

                $turma = $_POST['turma'];
                $turno = $_POST['turno'];
                $vagas = $_POST['vagas'];

                $existeTurma = $turmas->verifyTurmas($turma, $turno);
                if ($existeTurma->fetch(PDO::FETCH_ASSOC) > 0) {
                    $_SESSION['message'] = 'Essa turma já existe.';
                    $_SESSION['alertClass'] = 'danger';
                } else {;
                    if ($turmas->createTurmas($turma, $turno, $vagas)) {
                        $_SESSION['message'] = 'Turma criada com sucesso.';
                        $_SESSION['alertClass'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Falha ao criar nova turma.';
                        $_SESSION['alertClass'] = 'danger';
                    }
                }
            }

            header("location:" . BASE_URL . "dashboard/turmas");
            exit();
        }

        if ($id_turma != null) {
            if ($turmas->deleteTurmas($id_turma)) {
                $_SESSION['message'] = 'Turma excluída com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir turma.';
                $_SESSION['alertClass'] = 'danger';
            }
        };

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
                $_SESSION['message'] = 'Falha: O tipo de arquivo não é permitido.';
                $_SESSION['alertClass'] = 'danger';
            } elseif ($file_size > 5242880) {
                $_SESSION['message'] = 'Falha: O tamanho do arquivo deve ser no máximo 5MB.';
                $_SESSION['alertClass'] = 'danger';
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
                        if ($horarios->updateHorarios($file_name, $turma, $turno)) {
                            $_SESSION['message'] = 'Horário atualizado com sucesso.';
                            $_SESSION['alertClass'] = 'success';
                        } else {
                            $_SESSION['message'] = 'Falha ao atualizar horário.';
                            $_SESSION['alertClass'] = 'danger';
                        }
                    } else {
                        if ($horarios->createHorarios($file_name, $turma, $turno)) {
                            $_SESSION['message'] = 'Horário criado com sucesso.';
                            $_SESSION['alertClass'] = 'success';
                        } else {
                            $_SESSION['message'] = 'Falha ao criar horário.';
                            $_SESSION['alertClass'] = 'danger';
                        }
                    }
                } else {
                    $_SESSION['message'] = 'Falha ao mover o arquivo enviado.';
                    $_SESSION['alertClass'] = 'danger';
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

    public function matriculas($id = null)
    {

        $matriculas = new MatriculaModel;
        $turmas = new TurmasModel;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_POST['nova_vaga'])) {
                $nova_vaga = $_POST['nova_vaga'];

                if ($matriculas->createVagas($nova_vaga)) {
                    $_SESSION['message'] = 'Vaga criada com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar vaga.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }

            if (isset($_POST['excluir'])) {
                $excluir_vaga = $_POST['vaga'];

                if ($matriculas->deleteVagas($excluir_vaga)) {
                    $_SESSION['message'] = 'Vaga excluída com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao excluir vaga.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }

            header("location:" . BASE_URL . "dashboard/matriculas");
            exit();
        }

        if ($id != null) {
            if ($matriculas->deleteMatriculas($id)) {
                $_SESSION['message'] = 'Matricula excluída com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir matrícula.';
                $_SESSION['alertClass'] = 'danger';
            }
        }

        $email = isset($_GET["email"]) ? $_GET["email"] : "";
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
        $turno = isset($_GET["turno"]) ? $_GET["turno"] : "";
        $turma = isset($_GET["turma"]) ? $_GET["turma"] : "";

        if ($email != null && $nome  != null  && $turno  != null  && $turma  != null) {
            if ($matriculas->createAlunoById($id, $email, $nome, $turno, $turma)) {
                $_SESSION['message'] = 'Aluno cadastrado com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao cadastrar aluno.';
                $_SESSION['alertClass'] = 'danger';
            }
        }

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
                    $_SESSION['message'] = 'Formato não permitido.';
                    $_SESSION['alertClass'] = 'danger';
                    header('Location: ' . BASE_URL . 'dashboard/album');
                    exit();
                }

                $nome_arquivo = $nome_unico . "." . $extensao;
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/album/';
                $target_file = $target_dir . $nome_arquivo;
                move_uploaded_file($_FILES["capa_album"]["tmp_name"], $target_file);

                if ($album->createAlbum($nome_album, $nome_arquivo)) {
                    $_SESSION['message'] = 'Álbum criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar álbum.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }

            if (isset($_POST['id_album']) && isset($_POST['nova_foto'])) {
                $id_album = $_POST["id_album"];
                $num_fotos = count($_FILES["nova_foto"]["name"]);

                for ($i = 0; $i < $num_fotos; $i++) {
                    $nome_original = $_FILES["nova_foto"]["name"][$i];
                    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

                    if ($extensao != 'png' && $extensao != 'jpg') {
                        $_SESSION['message'] = 'Erro: só é permitido adicionar imagens PNG ou JPG.';
                        $_SESSION['alertClass'] = 'danger';
                        header('Location: ' . BASE_URL . 'dashboard/album');
                        exit();
                    }

                    $nome_aleatorio = uniqid();
                    $nome_foto = $nome_aleatorio . '.' . $extensao;
                    $caminho_foto = $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/album/fotos/' . $nome_foto;
                    move_uploaded_file($_FILES['nova_foto']['tmp_name'][$i], $caminho_foto);

                    if ($album->createFotos($id_album, $nome_foto)) {
                        $_SESSION['message'] = 'Foto adicionada com sucesso.';
                        $_SESSION['alertClass'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Falha ao adicionar foto.';
                        $_SESSION['alertClass'] = 'danger';
                    }
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

                if ($album->deleteAlbum($id_album_to_delete)) {
                    $_SESSION['message'] = 'Álbum excluído com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao excluir álbum.';
                    $_SESSION['alertClass'] = 'danger';
                }

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

                    if ($album->deleteFotosPorId($id)) {
                        $_SESSION['message'] = 'Fotos excluídas com sucesso.';
                        $_SESSION['alertClass'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Falha ao excluir fotos.';
                        $_SESSION['alertClass'] = 'danger';
                    }


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

            if ($site->deleteBannersPorId($id)) {
                $_SESSION['message'] = 'Banner excluído com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir banner.';
                $_SESSION['alertClass'] = 'danger';
            }

            $diretorio =  $_SERVER['DOCUMENT_ROOT'] . '/school/assets/images/banners/';
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_banner'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            if ($site->updateSituacaoBanner($situacao, $id)) {
                $_SESSION['message'] = 'Situação alterada com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao alterar situação.';
                $_SESSION['alertClass'] = 'danger';
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['submitBanner'])) {

            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/banners/";
            $nome_arquivo = basename($_FILES['image']['name']);
            $nome_aleatorio = uniqid();
            $extensao = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));


            if ($extensao != 'png' && $extensao != 'jpg') {
                $_SESSION['message'] = 'Falha: só é permitido arquivos JPG e PNG.';
                $_SESSION['alertClass'] = 'danger';
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {


                if ($site->createBanners($nome_arquivo)) {
                    $_SESSION['message'] = 'Banner criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar banner.';
                    $_SESSION['alertClass'] = 'danger';
                }
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
                $_SESSION['message'] = 'Falha: só é permitido arquivos JPG e PNG.';
                $_SESSION['alertClass'] = 'danger';
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

                if ($site->createDepoimentos($nome_arquivo)) {
                    $_SESSION['message'] = 'Depoimento criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar depoimento.';
                    $_SESSION['alertClass'] = 'danger';
                }
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
                $_SESSION['message'] = 'Falha: só é permitido arquivos JPG e PNG.';
                $_SESSION['alertClass'] = 'danger';
                header("location:" . BASE_URL . "dashboard/site");
                exit();
            }

            $nome_arquivo = $nome_aleatorio . '.' . $extensao;
            $caminho_arquivo = $diretorio . $nome_arquivo;

            $nome = $_POST['nome'];
            $info = $_POST['info'];

            if (move_uploaded_file($_FILES['image']['tmp_name'], $caminho_arquivo)) {

                if ($site->createProf($nome_arquivo, $nome, $info)) {
                    $_SESSION['message'] = 'Professor criado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao criar professor.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }


        if (isset($_POST['excluir_prof'])) {
            $id = $_POST['id'];

            $result = $site->readProfPorId($id);

            $row = $result->fetch(PDO::FETCH_ASSOC);
            $nome_arquivo = $row['face'];

            if ($site->deleteProfPorId($id)) {
                $_SESSION['message'] = 'Professor excluído com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir professor.';
                $_SESSION['alertClass'] = 'danger';
            }

            $diretorio =  $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/professores/";
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);
            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_prof'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            if ($site->updateProf($situacao, $id)) {
                $_SESSION['message'] = 'Situação alterada com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao alterar situação.';
                $_SESSION['alertClass'] = 'danger';
            }

            header("location:" . BASE_URL . "dashboard/site");
            exit();
        }

        if (isset($_POST['excluir_depoimentos'])) {
            $id = $_POST['id'];

            $result = $site->readDepoimentosPorId($id);

            $row = $result->fetch(PDO::FETCH_ASSOC);
            $nome_arquivo = $row['depoimento'];

            if ($site->deleteDepoimentosPorId($id)) {
                $_SESSION['message'] = 'Depoimento excluído com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao excluir depoimento.';
                $_SESSION['alertClass'] = 'danger';
            }

            $diretorio = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/depoimentos/";
            $caminho_arquivo = $diretorio . $nome_arquivo;
            unlink($caminho_arquivo);
            header("location:" . BASE_URL . "dashboard/site");
            exit();
        } elseif (isset($_POST['alterar-situacao_depoimentos'])) {
            $id = $_POST['id'];
            $situacao = $_POST['situacao'] == 1 ? 2 : 1;

            if ($site->updateDepoimentos($id, $situacao)) {
                $_SESSION['message'] = 'Situação alterada com sucesso.';
                $_SESSION['alertClass'] = 'success';
            } else {
                $_SESSION['message'] = 'Falha ao alterar situação.';
                $_SESSION['alertClass'] = 'danger';
            }

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

    public function boletim($id)
    {
        $boletim = new NotasModel;

        $boletim->setIdAluno($id);
        $result =  $boletim->readNotas($id);

        $row = $boletim->readInfo();

        $turma1 = $row['turma1'];
        $turma2 = $row['turma2'];
        $nome = $row['nome'];

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
            'id' => $id,
            'nome' => $nome,
            'turma1' => $turma1,
            'turma2' => $turma2,
            'notas_materias' => $notas_materias
        );

        $this->loadDashboardTemplate('boletim_view', $dados);
    }

    public function ficha($email)
    {
        $mtr = new MatriculaModel;

        $data = $mtr->readMatriculasPorEmail($email);
        $anoAtual = date("Y");

        $dados = array(
            'dados' => $data,
            'anoAtual' => $anoAtual
        );

        $this->loadDashboardTemplate('ficha_matricula', $dados);
    }

    public function perfil($id_aluno)
    {
        $boletim = new NotasModel;
        $mtr = new MatriculaModel;
        $cliente = new ClienteModel;
        $estudante = new EstudantesModel;

        $boletim->setIdAluno($id_aluno);
        $id_matricula = $mtr->readIdMatricula($id_aluno);
        $foto = $cliente->readFoto($id_aluno);

        $row = $id_matricula->fetch(PDO::FETCH_ASSOC);
        $id_matricula = $row['id_matricula'];
        $pfl =  $estudante->readAlunoPorId($id_aluno);

        $data = $mtr->readMatriculaPorId($id_matricula);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['foto']) && isset($_POST['cropped-image'])) {
                $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/school/assets/images/clientes/";
                $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
                $fileName = uniqid() . '.' . $extension;
                $targetFilePath = $targetDir . $fileName;

                if (!empty($targetDir . $foto['foto'])) {
                    unlink($targetDir . $foto['foto']);
                }

                $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
                        if ($cliente->updateFoto($fileName, $id_aluno)) {
                            $_SESSION['message'] = 'Foto alterada com sucesso.';
                            $_SESSION['alertClass'] = 'success';
                        } else {
                            $_SESSION['message'] = 'Falha ao alterar foto.';
                            $_SESSION['alertClass'] = 'danger';
                        }
                        $_SESSION['caminho_imagem'] = $targetFilePath;
                    }
                }
            }

            if (isset($_POST['email']) || isset($_POST['telefone']) || isset($_POST['endereco']) && isset($_POST['confirm-update'])) {
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $endereco = $_POST['endereco'];

                if ($mtr->updatePerfil($id_matricula, $email, $telefone, $endereco)) {
                    $_SESSION['message'] = 'Perfil atualizado com sucesso.';
                    $_SESSION['alertClass'] = 'success';
                } else {
                    $_SESSION['message'] = 'Falha ao atualizar perfil.';
                    $_SESSION['alertClass'] = 'danger';
                }
            }
            header('Location: ' . BASE_URL . 'dashboard/perfil/' . $id_aluno);
        }


        $dados = array(
            'id' => $id_aluno,
            'pfl' => $pfl,
            'data' => $data,
            'foto' =>  $foto
        );

        $this->loadDashboardTemplate('perfil_edit', $dados);
    }
}
