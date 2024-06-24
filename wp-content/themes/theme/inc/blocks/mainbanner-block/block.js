jQuery(document).ready(function($){
    let textWrapper = $('#mainbanner-block .block__title-additional');
    let text = textWrapper.text();
    textWrapper.text('');
    var typed = new Typed('#mainbanner-block .block__title-additional', {
        strings: [text],
        typeSpeed: 150,
        backSpeed: 150,
        backDelay: 1200,
        startDelay: 1200,
        loop: true,
        // showCursor: true,
        // cursorChar: "|",
        attr: null,
    });
});