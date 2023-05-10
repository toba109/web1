let slider = tns({
    container : ".my-slider",
    "slideBy" : 1,
    "speed" : 400,
    "nav" : false,
    controlsContainer: "#controls",
    prevButton : ".previous",
    nextButton : ".next",
    responsive: {
        1600:{
            items : 4,
            gutter: 20
        },
        1024: {
            items : 3,
            gutter: 20
        },
        768: {
            items : 2,
            gutter: 20
        },
        480: {
            items: 1
        }
    }
})



const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 100) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
})