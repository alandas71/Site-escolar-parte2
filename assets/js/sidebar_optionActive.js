const links = document.querySelectorAll('.sidebar-menu a');

links.forEach(link => {
    link.addEventListener('click', function () {
        const li = link.parentNode;
        // removendo a classe "active" de todos os elementos <li>
        const lis = document.querySelectorAll('.sidebar-menu li');
        lis.forEach(li => {
            li.classList.remove('active');
        });

        // adicionando a classe "active" ao elemento <li> correspondente
        li.classList.add('active');
    });
});
