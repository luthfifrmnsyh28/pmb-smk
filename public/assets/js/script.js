window.addEventListener("load", function () {

    const loader = document.getElementById("loader");

    if(loader){
        loader.style.display = "none";
    }

});

const nav = document.querySelector(".navbar");

window.addEventListener("scroll", function(){

    if(nav){
        if(window.scrollY>50){
            nav.classList.add("scrolled");
        }else{
            nav.classList.remove("scrolled");
        }

    }

});

const btn = document.getElementById("backTop");

if(btn){

    window.addEventListener("scroll", function(){

        if(document.documentElement.scrollTop>300){
            btn.style.display="block";
        }else{
            btn.style.display="none";
        }

    });

    btn.addEventListener("click", function(){

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

}

document.querySelectorAll(".counter").forEach(counter=>{

    counter.innerHTML = counter.innerHTML;

});

new Swiper(".galeriSwiper", {

    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    speed: 800,

    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {

        0: {
            slidesPerView: 1,
            spaceBetween: 15
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },

        1200: {
            slidesPerView: 3,
            spaceBetween: 30
        }

    }

});