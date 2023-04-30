$(function () {
    $("button#btnLoginAluno").on("click", function (e) {
        e.preventDefault();

        var campoEmail = $("form#formularioLoginAluno #email").val();
        var campoSenha = $("form#formularioLoginAluno #senha").val();
        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            $("div#mensagem").html("Preencha todos os campos.");
        } else {
            $.ajax({
                url: "conexao_loginAluno.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function (retorno) {
                    retorno = JSON.parse(retorno);
                    if (retorno["erro"]) {
                        $("div#mensagem")
                            .html(retorno["mensagem"])
                            .addClass(retorno["classe"]);
                        $("form#formularioLoginAluno #senha").val("");
                    } else {
                        window.location = "portal_aluno.php";
                    }
                },

                error: function () {
                    $("div#mensagem").html(retorno["mensagem"]).addClass("mensagem-erro");
                }
            });
        }
    });
});
