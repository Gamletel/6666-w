jQuery(document).ready(function($){

    const contactTab = $('#contacts-block .tab');
    const contactItems = $('#contacts-block .item');
    contactTab.each(function () {
        $(this).click(function () {
            let id = $(this).data('id');
            $(this).addClass('active').siblings().removeClass('active');
            $(contactItems[id]).show().siblings().hide();

        })
    })

});