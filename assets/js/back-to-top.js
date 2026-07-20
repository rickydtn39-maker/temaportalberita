document.addEventListener('DOMContentLoaded', function(){

    const button = document.querySelector('.back-to-top');

    if(!button){
        return;
    }

    window.addEventListener('scroll', function(){

        if(window.scrollY > 500){

            button.classList.add('show');

        }else{

            button.classList.remove('show');

        }

    });

    button.addEventListener('click', function(){

        window.scrollTo({
            top:0,
            behavior:'smooth'
        });

    });

});