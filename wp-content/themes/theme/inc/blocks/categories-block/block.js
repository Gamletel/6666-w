jQuery(document).ready(function($){

    const catalogSwiper = new Swiper('#categories-block .swiper',{
        spaceBetween: 5,
        breakpoints:{
            320:{
                slidesPerView: 1,
            },
            640:{
                slidesPerView: 2,
            },
            992:{
                slidesPerView: 3,
            },
            1221:{
                slidesPerView: 4,
            },
        },
        navigation:{
            prevEl: '#categories-block .swiper-btn-prev',
            nextEl: '#categories-block .swiper-btn-next',
        }
    })

});