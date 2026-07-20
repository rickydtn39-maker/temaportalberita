document.addEventListener("DOMContentLoaded", () => {

    const items = document.querySelectorAll(".breaking-item");

    if (!items.length) return;

    const prev = document.querySelector(".breaking-btn.prev");
    const next = document.querySelector(".breaking-btn.next");
    const pause = document.querySelector(".breaking-btn.pause");

    let current = 0;
    let playing = true;
    let timer;

    function show(index){

        items.forEach((item)=>{

            item.classList.remove("active");

        });

        current = index;

        if(current >= items.length){

            current = 0;

        }

        if(current < 0){

            current = items.length-1;

        }

        items[current].classList.add("active");

    }

    function nextSlide(){

        show(current+1);

    }

    function prevSlide(){

        show(current-1);

    }

    function start(){

        stop();

        timer = setInterval(nextSlide,5000);

        playing = true;

        if(pause){

            pause.innerHTML = "❚❚";

        }

    }

    function stop(){

        clearInterval(timer);

        playing = false;

        if(pause){

            pause.innerHTML = "▶";

        }

    }

    if(next){

        next.addEventListener("click",()=>{

            nextSlide();

            if(playing){

                start();

            }

        });

    }

    if(prev){

        prev.addEventListener("click",()=>{

            prevSlide();

            if(playing){

                start();

            }

        });

    }

    if(pause){

        pause.addEventListener("click",()=>{

            if(playing){

                stop();

            }else{

                start();

            }

        });

    }

    show(0);

    start();

});