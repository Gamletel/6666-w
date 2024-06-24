jQuery(document).ready(function ($) {
    console.log('test');

    $('input[type=tel]').inputmask({"mask": "+7 999 999-99-99"}); //specifying options

    window.formPhoneValidator = function (input) {
        let tempInput = input.toString().replaceAll('_', '');
        tempInput = tempInput.replaceAll(' ', '');
        tempInput = tempInput.replaceAll('-', '');

        return tempInput.length === 12;
    }

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i
        .test(navigator.userAgent)) {
        const headerCatalog = $('#header .catalog .item');
        headerCatalog.each(function () {
            let redirect = false;

            $(this).on('click', function (e) {
                if ($(this).hasClass('active')) {
                    return;
                } else {
                    e.preventDefault();
                    redirect = !redirect;
                }
                headerCatalog.each(function () {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
            });
        })
    }

    const otherProductsSwiper = new Swiper('.single-products .product__other-products-block .swiper', {
        spaceBetween: 5,
        breakpoints: {
            320: {
                slidesPerView: 3,
            }
        },
        navigation: {
            prevEl: '.single-products .product__other-products-block .swiper-btn-prev',
            nextEl: '.single-products .product__other-products-block .swiper-btn-next',
        },
    })

    const singleProductData = $('.single-products .product__data');
    const dataTabs = singleProductData.find('.tab');
    const dataBody = singleProductData.find('.data__body');
    $(dataBody[1]).hide();
    dataTabs.click(function () {
        let infoName = $(this).data('info-name');
        dataBody.each(function () {
            if ($(this).data('info-name') === infoName) {
                $(this).show();
            } else {
                $(this).hide();
            }
        })
    })

// $(document).scroll(function() {
//     if ($(this).scrollTop() >= 50) {
//     $('#header').addClass('painted');
//     // console.log('scroll')
//     }else{
//     $('#header').removeClass('painted');
//     }
// });
//

// $("li.nav-menu-element a").click(function() { // ID откуда кливаем
// 	let hash = $(this).attr('href');
// 	if(hash.length > 1) {
// 		$(this).parent().addClass('active');
// 		$(this).parent().siblings().removeClass('active');
// 		$('html, body').animate({
//             scrollTop: $(hash).offset().top - 120 // класс объекта к которому приезжаем
//         }, 1000); // Скорость прокрутки
// 	}
// });


    /*============ FUNCTIONS ===========*/

// function getCallbackForm(modal, props) {
//     let id = props['data-modal'].value;
//     if($(modal).find('.form__holder').html() == '') {
//         $.ajax({
//             url: `/wp-admin/admin-ajax.php?action=get_modal_form&modal=${id}`,
//             method: 'GET',
//             success: function (data){
//                 $(modal).find('.form__holder').html(data);
//                 let form = $(modal).find('form').get(0);

//                 ThemeModal.reinitForms(form);
//                 ThemeModal.getInstance().openModal(id);
//             },
//             error: function (data) {
//                 ThemeModal.getInstance().openModal('error');
//             }
//         });
//     }else{
//         ThemeModal.getInstance().openModal(id);
//     }
// }

    let mobileMenu = new MobileMenu(); // Вызов объекта класса мобильного меню
    mobileMenu.init(); // Инициализация мобильного меню
    let themeModal = new ThemeModal({}); // Вызов объекта класса модалок

// themeModal.modalsView['callback'] = {
// 	callback: getCallbackForm
// };
    themeModal.init(); // Инициализация модалок

})
;
