jQuery(document).ready(function($){

    const productsSwiper = new Swiper('#products-block .swiper',{
        spaceBetween: 5,
        breakpoints:{
            320:{
                slidesPerView: 1,
            },
            374:{
                slidesPerView: 2,
            },
            769:{
                slidesPerView: 3,
            },
            992:{
                slidesPerView: 4,
            },
        },
        navigation:{
            prevEl: '#products-block .swiper-btn-prev',
            nextEl: '#products-block .swiper-btn-next',
        }
    })

});