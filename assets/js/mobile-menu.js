document.addEventListener('DOMContentLoaded', function(){

    const button = document.querySelector('.mobile-menu-toggle');

    const menu = document.querySelector('.main-nav');

    if(!button || !menu){
        return;
    }

    button.addEventListener('click', function(){

        menu.classList.toggle('mobile-active');

        button.classList.toggle('active');

    });

});