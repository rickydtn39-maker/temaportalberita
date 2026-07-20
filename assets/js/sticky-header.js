document.addEventListener('DOMContentLoaded', function(){

    const header = document.querySelector('.site-header');

    if(!header){
        return;
    }

    window.addEventListener('scroll', function(){

        if(window.scrollY > 120){

            header.classList.add('is-sticky');

        }else{

            header.classList.remove('is-sticky');

        }

    });

});