const checkbox = document.querySelector('#checkbox-sidebar');
const sidebar = document.querySelector('.sidebar');
const dashboard = document.querySelector('.topo_dashboard');
const view = document.querySelector('.view');
const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
const sidebarMenu = document.querySelector('.sidebar-menu');
const icon = document.querySelector('.hide-sidebar');

// adiciona um listener de mudança no checkbox
checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
        if (window.innerWidth < 976) {
            view.style.left = '0';
            view.style.width = '100%';
            sidebar.style.width = '250px';
            dashboard.style.left = '250px';
            dashboard.style.width = 'calc(100% - 250px)';
        } else {
            view.style.left = '300px';
            view.style.width = 'calc(100% - 300px)';
            sidebar.style.width = '300px';
            dashboard.style.left = '300px';
            dashboard.style.width = 'calc(100% - 300px)';
        }
        dashboard.classList.remove('collapsed');
        sidebarLinks.forEach(link => {
            link.classList.remove('hide-text');
        });
        sidebarMenu.querySelectorAll('p, h1, hr').forEach(element => {
            element.style.display = 'block';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'block';
        });
        sidebar.querySelector('h1').style.display = 'block';
    } else {
        icon.style.left = '0';
        if (window.innerWidth < 976) {
            view.style.left = '27px';
            view.style.width = 'calc(100% - 40px)';
            dashboard.style.left = '40px';
            dashboard.style.width = 'calc(100% - 40px)';
            sidebar.style.width = '40px';
        } else {
            view.style.left = '70px';
            view.style.width = 'calc(100% - 70px)';
            dashboard.style.left = '70px';
            dashboard.style.width = 'calc(100% - 70px)';
            sidebar.style.width = '70px';
        }
        dashboard.classList.add('collapsed');
        sidebarLinks.forEach(link => {
            link.classList.add('hide-text');
        });
        sidebarMenu.querySelectorAll('p, h1, hr').forEach(element => {
            element.style.display = 'none';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'none';
        });
        sidebar.querySelector('h1').style.display = 'none';
    }
});
