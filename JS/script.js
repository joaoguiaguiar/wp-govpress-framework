document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('#menu-toggle');
    const menuList = document.querySelector('.container__lista');

    if (menuButton && menuList) {
        function instToggleMenu() {
            menuList.classList.toggle('active');
        }

        menuButton.addEventListener('click', instToggleMenu);
    }
});