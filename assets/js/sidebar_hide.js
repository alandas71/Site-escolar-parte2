const sidebar = document.querySelector('.sidebar');
const dashboard = document.querySelector('.topo_dashboard');
const view = document.querySelector('.view');
const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
const sidebarMenu = document.querySelector('.sidebar-menu');
const icon = document.querySelector('.hide-sidebar');

if (window.innerWidth > 976) {
    sidebar.addEventListener('mouseover', function () {
        view.style.left = '300px';
        view.style.width = 'calc(100% - 300px)';
        sidebar.style.width = '300px';
        sidebarMenu.style.marginTop = '60px';
        dashboard.style.left = '300px';
        dashboard.style.width = 'calc(100% - 300px)';
        dashboard.classList.remove('collapsed');
        sidebarMenu.querySelectorAll('h1, hr').forEach(element => {
            element.style.display = 'block';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'block';
        });
        const sidebarParagraphs = sidebarMenu.querySelectorAll('p');
        sidebarParagraphs.forEach(paragraph => {
            paragraph.setAttribute('data-aos', 'fade-left');
            paragraph.style.opacity = '1';
        });
        AOS.init({
            duration: 1000,
        });
    });

    view.addEventListener('mouseover', function () {
        view.style.left = '70px';
        view.style.width = 'calc(100% - 70px)';
        dashboard.style.left = '70px';
        sidebarMenu.style.marginTop = '190px';
        dashboard.style.width = 'calc(100% - 70px)';
        sidebar.style.width = '70px';
        dashboard.classList.add('collapsed');
        sidebarMenu.querySelectorAll('h1, hr').forEach(element => {
            element.style.display = 'none';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'none';
        });
        const sidebarParagraphs = sidebarMenu.querySelectorAll('p');
        sidebarParagraphs.forEach(paragraph => {
            paragraph.removeAttribute('data-aos');
            paragraph.setAttribute('data-aos', 'fade-right');
            paragraph.style.opacity = '0';
        });

        AOS.refreshHard();

        const animatedElements = document.querySelectorAll('.aos-init');
        animatedElements.forEach(element => {
            element.classList.remove('aos-init', 'aos-animate');
        });
    });
}

const checkbox = document.querySelector('#checkbox-sidebar');
checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
        if (window.innerWidth < 976) {
            view.style.left = '0';
            view.style.width = '100%';
            sidebar.style.width = '250px';
            dashboard.style.left = '250px';
            sidebarMenu.style.marginTop = '0px';
            dashboard.style.width = 'calc(100% - 250px)';
        } else {
            view.style.left = '300px';
            view.style.width = 'calc(100% - 300px)';
            sidebar.style.width = '300px';
            sidebarMenu.style.marginTop = '60px';
            dashboard.style.left = '300px';
            dashboard.style.width = 'calc(100% - 300px)';
        }
        dashboard.classList.remove('collapsed');
        sidebarMenu.querySelectorAll('h1, hr').forEach(element => {
            element.style.display = 'block';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'block';
        });
        const sidebarParagraphs = sidebarMenu.querySelectorAll('p');
        sidebarParagraphs.forEach(paragraph => {
            paragraph.setAttribute('data-aos', 'fade-left');
            paragraph.style.opacity = '1';
        });
        AOS.init({
            duration: 1000,
        });

    } else {
        icon.style.left = '0';
        if (window.innerWidth < 976) {
            view.style.left = '27px';
            view.style.width = 'calc(100% - 40px)';
            dashboard.style.left = '40px';
            dashboard.style.width = 'calc(100% - 40px)';
            sidebar.style.width = '40px';
            sidebarMenu.style.marginTop = '130px';
        } else {
            view.style.left = '70px';
            view.style.width = 'calc(100% - 70px)';
            dashboard.style.left = '70px';
            sidebarMenu.style.marginTop = '190px';
            dashboard.style.width = 'calc(100% - 70px)';
            sidebar.style.width = '70px';
        }
        dashboard.classList.add('collapsed');
        sidebarMenu.querySelectorAll('h1, hr').forEach(element => {
            element.style.display = 'none';
        });
        document.querySelectorAll('.img_dashboard, .custom-submit-button').forEach(element => {
            element.style.display = 'none';
        });
        const sidebarParagraphs = sidebarMenu.querySelectorAll('p');
        sidebarParagraphs.forEach(paragraph => {
            paragraph.removeAttribute('data-aos');
            paragraph.setAttribute('data-aos', 'fade-right');
            paragraph.style.opacity = '0';
        });

        AOS.refreshHard();

        const animatedElements = document.querySelectorAll('.aos-init');
        animatedElements.forEach(element => {
            element.classList.remove('aos-init', 'aos-animate');
        });
    }
});