$(document).ready(function () {
    $("#btnLogin").click(function () {
        // Somente quando tiver com o laravel instalado localmente na sua maquina.
        var dados = {
            email: $("#email").val(),
            password: $("#pass").val()
        }
        $.ajax({
            url: 'http://localhost:8000/api/centro-educar-arco-iris/auth/login',
            type: 'POST',
            data: dados,
            statusCode: {
                401: function () {
                    alert('Não autorizado');
                },
                200: function (dados) {
                    alert('Autorizado');
                    getDataUser(dados.access_token)
                }
            }
        }).done(function () {
            alert('Tudo finalizado');
        });
    });

    function getDataUser (token) {
        $.ajax({
            url: 'http://localhost:8000/api/centro-educar-arco-iris/auth/me',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            type: 'POST'
        }).done(function (data) {
            dadosLogin = {
                name: data.name,
                email: data.email
            }
            localStorage.setItem('user', JSON.stringify(dadosLogin));
            window.location.href = 'https://www.globo.com/';
        })
    }
});