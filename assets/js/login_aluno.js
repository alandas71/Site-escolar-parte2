$(function () {
    $("button#btnLoginAluno").on("click", function (e) {
        e.preventDefault();

        var campoEmail = $("form#formularioLoginAluno #email").val();
        var campoSenha = $("form#formularioLoginAluno #senha").val();
        var recaptchaResponse = grecaptcha.getResponse();

        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            $("div#mensagem").html("Preencha todos os campos.");
        } else if (recaptchaResponse == "") {
            $("div#mensagem").html("Por favor, verifique que você não é um robô.");
        } else {
            $.ajax({
                url: "app/login/conexao_loginAluno.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha,
                    recaptchaResponse: recaptchaResponse // Include the reCAPTCHA response
                },

                success: function (retorno) {
                    try {
                        retorno = JSON.parse(retorno);
                        if (retorno["erro"]) {
                            $("div#mensagem")
                                .html(retorno["mensagem"])
                                .addClass(retorno["classe"]);
                        } else {
                            window.location = "portalAluno";
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
