$(function () {
    $("button#btnLoginProf").on("click", function (e) {
        e.preventDefault();

        var campoEmail = $("form#formularioLoginProf #email").val();
        var campoSenha = $("form#formularioLoginProf #senha").val();
        var recaptchaResponse = grecaptcha.getResponse();

        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            $("div#mensagem").html("Preencha todos os campos.");
        } else if (recaptchaResponse == "") {
            $("div#mensagem").html("Por favor, verifique que você não é um robô.");
        } else {
            $.ajax({
                url: "app/login/conexao_loginProf.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha,
                    recaptchaResponse: recaptchaResponse
                },

                success: function (retorno) {
                    try {
                        retorno = JSON.parse(retorno);
                        if (retorno["erro"]) {
                            $("div#mensagem")
                                .html(retorno["mensagem"])
                                .addClass(retorno["classe"]);
                        } else {
                            window.location = "portalProf";
                        }
                    } catch (error) {
                        $("div#mensagem").html("Erro ao processar a resposta.").addClass("mensagem-erro");
                    }
                },

                error: function () {
                    $("div#mensagem").html("Ocorreu um erro na requisição.").addClass("mensagem-erro");
                }
            });
        }
    });
});
