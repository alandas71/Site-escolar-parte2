$(function () {
    $("button#btnLogin").on("click", function (e) {
        e.preventDefault();

        var campoEmail = $("form#formularioLogin #email").val();
        var campoSenha = $("form#formularioLogin #senha").val();
        var recaptchaResponse = grecaptcha.getResponse();

        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            $("div#mensagem").html("Preencha todos os campos.");
        } else if (recaptchaResponse == "") {
            $("div#mensagem").html("Por favor, verifique que você não é um robô.");
        } else {
            $.ajax({
                url: "conexao_login.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha,
                    recaptchaResponse: recaptchaResponse // Include the reCAPTCHA response
                },

                success: function (retorno) {
                    retorno = JSON.parse(retorno);
                    if (retorno["erro"]) {
                        $("div#mensagem")
                            .html(retorno["mensagem"])
                            .addClass(retorno["classe"]);
                    } else {
                        window.location = "dashboard.php?view=dashboard";
                    }
                },

                error: function () {
                    $("div#mensagem").html(retorno["mensagem"]).addClass("mensagem-erro");
                }
            });
        }
    });
});
