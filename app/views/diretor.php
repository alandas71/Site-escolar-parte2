    <div class="header">
        <div class="login-container">
            <div class="telalogin">
                <div id="mensagem"></div>
                <h1>DIREÇÃO</h1>
                <form id="formularioLogin">
                    <input class=inputlogin name="email" type="email" placeholder="Email" id="email">
                    <br><br>
                    <input class=inputlogin name="senha" type="password" placeholder="Senha" id="senha">
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
                    <br>
                    <button class=loginbtn id="btnLogin">Entrar</button>
                </form>
            </div>
        </div>




        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <footer class="main-footer">
        <div class="center" id="insta"><a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><img src="assets/images/insta.png" width="30px" height="30px" />
            </a></div>
        <div class="center" id="whats"><a href="https://wa.me/557182662374" target="_blank"><img src="assets/images/whats.png" width="30px" height="30px" />
            </a></div>
    </footer>
    <script>
        $(document).ready(function() {
            $('.aluno-login').click(function() {
                window.location.href = 'login_aluno.php';
            });

            $('.professor-login').click(function() {
                window.location.href = 'login_prof.php';
            });

            $('.diretor-login').click(function() {
                window.location.href = 'login.php';
            });

            $('.login-menu').click(function() {
                $('.sub-menu').toggle();
                if ($('.sub-menu').is(':visible')) {
                    $('.login-menu i').removeClass('fa-caret-down').addClass('fa-caret-up');
                } else {
                    $('.login-menu i').removeClass('fa-caret-up').addClass('fa-caret-down');
                }
            });
        });
    </script>
    </body>

    </html>