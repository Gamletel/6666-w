<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Company
 */

$logo_image = wp_get_attachment_image_url(theme('logo_image'), 'full');
$logo_text = theme('logo_text');
$phones = @settings('phones');
$emails = @settings('emails');
$socials = @settings('socials');
$addresses = @settings('addresses');

$footer_form_title = theme('footer_form_title');
$footer_form_image = wp_get_attachment_image_url(theme('footer_form_image'), 'full');

?>

<footer id="footer" class="site-footer">
    <div class="footer">
        <div class="footer__form">
            <div class="container">
                <div class="footer__form-wrapper">
                    <?php if ($footer_form_title) { ?>
                        <div class="form__title"><?= $footer_form_title; ?></div>
                    <?php } ?>

                    <div class="form__bg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="498" height="300" viewBox="0 0 498 300"
                             fill="none">
                            <path d="M706.289 281.622L750 274.767V193.233L706.289 186.378C670.32 180.308 657.677 132.664 685.796 109.547L718.784 82.374L678.193 12.0908L637.822 27.208C603.646 40.0122 568.979 5.37744 581.792 -28.8223L596.909 -69.1934L526.626 -109.784L499.453 -76.7959C476.379 -48.7295 428.704 -61.251 422.622 -97.2891L415.767 -141H334.233L327.378 -97.2891C321.275 -61.3169 273.668 -48.6724 250.547 -76.7959L223.374 -109.784L153.091 -69.1934L168.208 -28.8223C181.009 5.34814 146.377 40.021 112.178 27.208L71.8066 12.0908L31.2158 82.374L64.2041 109.547C77.0508 120.123 82.5146 137.481 78.1348 153.8C78.0469 153.946 72.4219 181.529 43.7109 186.378L0 193.233V274.767L43.7109 281.622C60.1172 284.405 73.5059 296.71 77.8125 313.014C77.8125 313.16 86.6895 339.952 64.2041 358.453L31.2158 385.626L71.8066 455.909L112.178 440.792C146.186 428.051 181.081 462.488 168.208 496.822L153.091 537.193L223.374 577.784L250.547 544.796C273.596 516.798 321.261 529.16 327.378 565.289L334.233 609H415.767L422.622 565.289C428.654 529.541 476.18 516.51 499.453 544.796L526.626 577.784L596.909 537.193L581.792 496.822C569.051 462.814 603.488 427.919 637.822 440.792L678.193 455.909L718.784 385.626L685.796 358.453C657.724 335.375 670.251 287.735 706.289 281.622ZM375 431.754C265.957 431.754 177.246 343.043 177.246 234C177.246 124.957 265.957 36.2461 375 36.2461C484.043 36.2461 572.754 124.957 572.754 234C572.754 343.043 484.043 431.754 375 431.754ZM375 80.1914C290.186 80.1914 221.191 149.186 221.191 234C221.191 318.814 290.186 387.809 375 387.809C459.814 387.809 528.809 318.814 528.809 234C528.809 149.186 459.814 80.1914 375 80.1914ZM375 343.863C314.429 343.863 265.137 294.586 265.137 234C265.137 173.414 314.429 124.137 375 124.137C435.571 124.137 484.863 173.414 484.863 234C484.863 294.586 435.571 343.863 375 343.863Z"
                                  fill="var(--Green-dark-2)"/>
                        </svg>
                    </div>

                    <?php if ($footer_form_image) { ?>
                        <img src="<?= $footer_form_image; ?>" alt="" class="form__image">
                    <?php } ?>

                    <?php get_form('callback') ?>
                </div>
            </div>
        </div>

        <div class="footer__wrapper">
            <div class="container">
                <div class="footer__top">
                    <a href="/" class="logo">
                        <?php if ($logo_image) { ?>
                            <img src="<?= $logo_image; ?>" alt="" class="logo__image">
                        <?php } ?>

                        <?php if ($logo_text) { ?>
                            <span class="logo__text"><?= $logo_text; ?></span>
                        <?php } ?>
                    </a>

                    <div class="footer__menu">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'headMenu',
                            'container' => false,
                            'menu' => 'Главное-футер',
                            'menu_class' => 'menuFooter',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 2,
                        ]);
                        ?>
                    </div>

                    <div class="footer__contacts">
                        <div class="footer__contacts-title">СВЯЖИТЕСЬ С НАМИ</div>

                        <div class="contacts">
                            <?php if (!empty($phones)) { ?>
                                <div class="contact phones">
                                    <div class="contact__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20"
                                             fill="none">
                                            <path d="M8.36433 4.43031L8.90518 5.39941C9.39326 6.27398 9.19733 7.42126 8.4286 8.18999C8.4286 8.19 8.4286 8.19 8.4286 8.19C8.42848 8.19011 7.49626 9.12255 9.18677 10.8131C10.8766 12.5029 11.809 11.5721 11.8098 11.5712C11.8099 11.5712 11.8099 11.5712 11.8099 11.5712C12.5786 10.8025 13.7259 10.6066 14.6004 11.0947L15.5695 11.6355C16.8901 12.3725 17.0461 14.2245 15.8853 15.3853C15.1878 16.0828 14.3333 16.6256 13.3888 16.6614C11.7987 16.7217 9.09824 16.3192 6.38943 13.6104C3.68061 10.9016 3.27819 8.20118 3.33847 6.61107C3.37428 5.6665 3.91701 4.81203 4.61451 4.11452C5.7753 2.95373 7.62732 3.10969 8.36433 4.43031Z"
                                                  fill="var(--White)"/>
                                            <path d="M11.0499 1.56685C11.1051 1.22611 11.4272 0.994965 11.7679 1.05013C11.789 1.05417 11.8569 1.06685 11.8924 1.07477C11.9635 1.09061 12.0627 1.11499 12.1864 1.15101C12.4337 1.22304 12.7792 1.34171 13.1939 1.53183C14.0241 1.91246 15.129 2.57829 16.2755 3.72479C17.422 4.87129 18.0878 5.97614 18.4684 6.80637C18.6586 7.22105 18.7772 7.56655 18.8493 7.81387C18.8853 7.93754 18.9097 8.03673 18.9255 8.10784C18.9334 8.14339 18.9392 8.17194 18.9432 8.19304L18.948 8.21903C19.0032 8.55977 18.7742 8.89521 18.4334 8.95037C18.0937 9.00538 17.7736 8.77535 17.717 8.43621C17.7153 8.4271 17.7105 8.40264 17.7054 8.37956C17.6951 8.33341 17.6773 8.26022 17.6491 8.16343C17.5927 7.96982 17.4948 7.68204 17.3322 7.32731C17.0073 6.61872 16.4231 5.64023 15.3916 4.60868C14.36 3.57713 13.3815 2.99296 12.673 2.6681C12.3182 2.50547 12.0305 2.40753 11.8368 2.35114C11.74 2.32294 11.6184 2.29502 11.5722 2.28474C11.2331 2.22822 10.9949 1.90662 11.0499 1.56685Z"
                                                  fill="var(--White)"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M11.2384 4.44141C11.3333 4.10951 11.6792 3.91733 12.0111 4.01215L11.8394 4.61311C12.0111 4.01215 12.0111 4.01215 12.0111 4.01215L12.0123 4.0125L12.0136 4.01287L12.0163 4.01368L12.0228 4.01561L12.0393 4.02074C12.0519 4.02476 12.0676 4.03 12.0863 4.03663C12.1237 4.04991 12.1732 4.0688 12.2338 4.0948C12.3552 4.14683 12.5211 4.22719 12.7249 4.34778C13.1328 4.58918 13.6896 4.99016 14.3437 5.6443C14.9979 6.29845 15.3989 6.85527 15.6403 7.26316C15.7608 7.46692 15.8412 7.6328 15.8932 7.75421C15.9192 7.81488 15.9381 7.86434 15.9514 7.90177C15.958 7.92048 15.9633 7.93617 15.9673 7.94874L15.9724 7.96522L15.9744 7.97168L15.9752 7.97446L15.9755 7.97574C15.9755 7.97574 15.9759 7.97694 15.3749 8.14864L15.9759 7.97694C16.0707 8.30884 15.8785 8.65477 15.5466 8.74959C15.2175 8.84362 14.8747 8.65548 14.7764 8.32877L14.7734 8.31978C14.7689 8.30726 14.7597 8.28261 14.7443 8.24661C14.7135 8.17466 14.6575 8.05697 14.5645 7.89981C14.3787 7.58586 14.0431 7.11148 13.4598 6.52819C12.8766 5.94489 12.4022 5.60931 12.0882 5.4235C11.9311 5.33049 11.8134 5.27457 11.7414 5.24374C11.7054 5.22831 11.6808 5.21911 11.6682 5.21467L11.6593 5.21159C11.3326 5.11336 11.1444 4.77048 11.2384 4.44141Z"
                                                  fill="var(--White)"/>
                                        </svg>
                                    </div>

                                    <div class="contact__wrapper">
                                        <?php foreach ($phones as $item) {
                                            $value = $item['value'];
                                            $name = $item['name'];
                                            ?>
                                            <a href="tel:<?= $value; ?>" class="item phone"><?= $name; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($emails)) { ?>
                                <div class="contact">
                                    <div class="contact__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20"
                                             fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M2.6433 4.30981C1.66699 5.28612 1.66699 6.85747 1.66699 10.0002C1.66699 13.1429 1.66699 14.7142 2.6433 15.6905C3.61961 16.6668 5.19096 16.6668 8.33366 16.6668H11.667C14.8097 16.6668 16.381 16.6668 17.3573 15.6905C18.3337 14.7142 18.3337 13.1429 18.3337 10.0002C18.3337 6.85747 18.3337 5.28612 17.3573 4.30981C16.381 3.3335 14.8097 3.3335 11.667 3.3335H8.33366C5.19096 3.3335 3.61961 3.3335 2.6433 4.30981ZM15.4805 6.26671C15.7014 6.53189 15.6656 6.92599 15.4004 7.14697L13.57 8.6723C12.8314 9.28785 12.2327 9.78676 11.7043 10.1266C11.1539 10.4806 10.6179 10.7042 10.0003 10.7042C9.38276 10.7042 8.84672 10.4806 8.29631 10.1266C7.76792 9.78676 7.16925 9.28786 6.43062 8.67231L4.60021 7.14697C4.33504 6.92599 4.29921 6.53189 4.52019 6.26671C4.74116 6.00154 5.13527 5.96571 5.40044 6.18669L7.19952 7.68592C7.97699 8.33381 8.51677 8.78218 8.97248 9.07527C9.41361 9.35899 9.71277 9.45423 10.0003 9.45423C10.2879 9.45423 10.587 9.35899 11.0282 9.07527C11.4839 8.78218 12.0237 8.33381 12.8011 7.68592L14.6002 6.18669C14.8654 5.96571 15.2595 6.00154 15.4805 6.26671Z"
                                                  fill="var(--White)"/>
                                        </svg>
                                    </div>

                                    <div class="contact__wrapper">
                                        <?php foreach ($emails as $item) {
                                            $value = $item['value'];
                                            $name = $item['name'];
                                            ?>
                                            <a href="mailto:<?= $value; ?>" class="item email"><?= $name; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($addresses)) { ?>
                                <div class="contact">
                                    <div class="contact__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20"
                                             fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M9.99967 1.6665C6.31778 1.6665 3.33301 5.00199 3.33301 8.74984C3.33301 12.4683 5.46078 16.5102 8.78056 18.0619C9.55446 18.4236 10.4449 18.4236 11.2188 18.0619C14.5386 16.5102 16.6663 12.4683 16.6663 8.74984C16.6663 5.00199 13.6816 1.6665 9.99967 1.6665ZM9.99967 9.99984C10.9201 9.99984 11.6663 9.25364 11.6663 8.33317C11.6663 7.4127 10.9201 6.6665 9.99967 6.6665C9.0792 6.6665 8.33301 7.4127 8.33301 8.33317C8.33301 9.25364 9.0792 9.99984 9.99967 9.99984Z"
                                                  fill="var(--White)"/>
                                        </svg>
                                    </div>

                                    <div class="contact__wrapper">
                                        <?php foreach ($addresses as $item) {
                                            $value = $item['value'];
                                            $name = $item['name'];
                                            ?>
                                            <div class="item address"><?= $name; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="footer__additionals">
                        <div class="btn" data-modal="callback">ЗАКАЗАТЬ ЗВОНОК</div>

                        <?php if (!empty($socials)) { ?>
                            <div class="socials">
                                <?php foreach ($socials as $item) {
                                    $link = $item['link'];
                                    $icon = get_image($item['icon'], [50, 50]);
                                    ?>
                                    <a href="<?= $link; ?>" class="social">
                                        <?= $icon; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="footer__bottom">
                    <a href="/privacy-policy" target="_blank" class="policy">Политика конфиденциальности</a>

                    <a href="https://grampus-studio.ru/?utm_source=client&utm_keyword=<?= get_site_url(); ?>;"
                       target="_blank" class="grampus">
                        Сайт разработан

                        <?= inline('assets/images/GRAMPUS.svg'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="modal-callback" class="theme-modal">
    <div class="close-modal">×</div>
    <div class="form__holder">
        <?php get_form('callback-modal') ?>
    </div>
</div>

<div id="modal-success" class="theme-modal">
    <div class="close-modal">×</div>

    <h2 class="block-title">
        Спасибо!
    </h2>

    <h3>
        Ваша заявка отправлена
    </h3>
</div>

<div id="modal-error" class="theme-modal">
    <div class="close-modal">×</div>

    <h2 class="block-title">
        Ошибка!
    </h2>

    <h3>
        Во время отправки произошла ошибка, пожалуйста, попробуйте позже!
    </h3>
</div>

<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.min.js"></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
</body>
</html>