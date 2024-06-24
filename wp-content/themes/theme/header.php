<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme
 */

$logo = get_image(theme('logo_image'), 'full');
$logo_text = theme('logo_text');
$phones = @settings('phones');
$emails = @settings('emails');
$socials = @settings('socials');
$addresses = @settings('addresses');
$additionals = @settings('additional');
$catalog_items = theme('catalog_items');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link
            rel="stylesheet"
            href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
    />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="header" class="site-header">
    <div class="header">
        <div class="header__top-parent">
            <div class="container">
                <div class="header__top">
                    <?php if (!empty($addresses)) {
                        $name = $addresses[0]['name'];
                        ?>
                        <div class="address header-info">
                            <div class="address__icon header-info__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M9.99992 1.66675C6.31802 1.66675 3.33325 5.00223 3.33325 8.75008C3.33325 12.4686 5.46102 16.5104 8.78081 18.0621C9.5547 18.4238 10.4451 18.4238 11.219 18.0621C14.5388 16.5104 16.6666 12.4686 16.6666 8.75008C16.6666 5.00223 13.6818 1.66675 9.99992 1.66675ZM9.99992 10.0001C10.9204 10.0001 11.6666 9.25389 11.6666 8.33341C11.6666 7.41294 10.9204 6.66675 9.99992 6.66675C9.07944 6.66675 8.33325 7.41294 8.33325 8.33341C8.33325 9.25389 9.07944 10.0001 9.99992 10.0001Z"
                                          fill="var(--White)"/>
                                </svg>
                            </div>

                            <h6 class="bold address__name header-info__text"><?= $name; ?></h6>
                        </div>
                    <?php } ?>

                    <div class="header__top-info">
                        <?php if (!empty($emails)) {
                            $name = $emails[0]['name'];
                            $value = $emails[0]['value'];
                            ?>
                            <a href="<?= $value; ?>" class="email header-info">
                                <div class="email__icon header-info__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                         fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M2.64281 4.30956C1.6665 5.28587 1.6665 6.85722 1.6665 9.99992C1.6665 13.1426 1.6665 14.714 2.64281 15.6903C3.61913 16.6666 5.19047 16.6666 8.33317 16.6666H11.6665C14.8092 16.6666 16.3805 16.6666 17.3569 15.6903C18.3332 14.714 18.3332 13.1426 18.3332 9.99992C18.3332 6.85722 18.3332 5.28587 17.3569 4.30956C16.3805 3.33325 14.8092 3.33325 11.6665 3.33325H8.33317C5.19047 3.33325 3.61913 3.33325 2.64281 4.30956ZM15.48 6.26647C15.701 6.53164 15.6651 6.92575 15.4 7.14672L13.5696 8.67206C12.8309 9.28761 12.2322 9.78652 11.7039 10.1264C11.1534 10.4804 10.6174 10.704 9.99984 10.704C9.38227 10.704 8.84623 10.4804 8.29582 10.1264C7.76743 9.78652 7.16876 9.28761 6.43013 8.67207L4.59972 7.14672C4.33455 6.92575 4.29872 6.53164 4.5197 6.26647C4.74068 6.0013 5.13478 5.96547 5.39995 6.18645L7.19903 7.68568C7.9765 8.33357 8.51628 8.78193 8.97199 9.07503C9.41312 9.35874 9.71228 9.45398 9.99984 9.45398C10.2874 9.45398 10.5866 9.35874 11.0277 9.07503C11.4834 8.78193 12.0232 8.33357 12.8006 7.68568L14.5997 6.18645C14.8649 5.96547 15.259 6.0013 15.48 6.26647Z"
                                              fill="var(--White)"/>
                                    </svg>
                                </div>

                                <h6 class="bold email__name header-info__text"><?= $name; ?></h6>
                            </a>
                        <?php } ?>

                        <?php if (!empty($additionals)) {
                            $icon = get_image($additionals[0]['icon'], [20, 20]);
                            $value = $additionals[0]['value'];
                            ?>
                            <div class="additional header-info">
                                <?php if ($icon) { ?>
                                    <div class="additional__icon header-info__icon"><?= $icon; ?></div>
                                <?php } ?>

                                <h6 class="bold additional__value header-info__text"><?= $value; ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__bottom-parent">
            <div class="container">
                <div class="header__bottom">
                    <?php if ($logo || $logo_text) { ?>
                        <a href="/" class="logo">
                            <?php if ($logo) { ?>
                                <div class="logo__image">
                                    <?= $logo; ?>
                                </div>
                            <?php } ?>

                            <?php if ($logo_text) { ?>
                                <span class="logo__text"><?= $logo_text; ?></span>
                            <?php } ?>
                        </a>
                    <?php } ?>

                    <?php get_search_form() ?>

                    <?php if (!empty($phones)) {
                        ?>
                        <div class="phones">
                            <?php foreach ($phones as $key => $item) {
                                $name = $item['name'];
                                $value = $item['value'];
                                ?>
                                <?php if ($key == 0) { ?>
                                    <a href="tel:<?= $value; ?>" class="phone phone-first">
                                        <div class="phone-first__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none">
                                                <path d="M10.0376 5.31617L10.6866 6.4791C11.2723 7.52858 11.0372 8.90532 10.1147 9.8278C10.1147 9.8278 10.1147 9.8278 10.1147 9.8278C10.1146 9.82792 8.99588 10.9468 11.0245 12.9755C13.0525 15.0035 14.1714 13.8861 14.1722 13.8853C14.1722 13.8853 14.1722 13.8853 14.1722 13.8853C15.0947 12.9628 16.4714 12.7277 17.5209 13.3134L18.6838 13.9624C20.2686 14.8468 20.4557 17.0692 19.0628 18.4622C18.2258 19.2992 17.2004 19.9505 16.0669 19.9934C14.1588 20.0658 10.9183 19.5829 7.6677 16.3323C4.41713 13.0817 3.93421 9.84122 4.00655 7.93309C4.04952 6.7996 4.7008 5.77423 5.53781 4.93723C6.93076 3.54428 9.15317 3.73144 10.0376 5.31617Z"
                                                      fill="var(--White)"/>
                                                <path d="M13.2595 1.88008C13.3257 1.47119 13.7122 1.19381 14.1211 1.26001C14.1464 1.26485 14.2279 1.28007 14.2705 1.28958C14.3559 1.30858 14.4749 1.33784 14.6233 1.38106C14.9201 1.46751 15.3347 1.60991 15.8323 1.83805C16.8286 2.2948 18.1544 3.09381 19.5302 4.46961C20.906 5.84541 21.705 7.17122 22.1617 8.1675C22.3899 8.66511 22.5323 9.07972 22.6187 9.3765C22.6619 9.5249 22.6912 9.64393 22.7102 9.72926C22.7197 9.77193 22.7267 9.80619 22.7315 9.8315L22.7373 9.86269C22.8034 10.2716 22.5286 10.6741 22.1197 10.7403C21.712 10.8063 21.3279 10.5303 21.2601 10.1233C21.258 10.1124 21.2522 10.083 21.2461 10.0553C21.2337 9.99994 21.2124 9.91212 21.1786 9.79597C21.1109 9.56363 20.9934 9.2183 20.7982 8.79262C20.4084 7.94232 19.7074 6.76813 18.4695 5.53027C17.2317 4.2924 16.0575 3.59141 15.2072 3.20158C14.7815 3.00642 14.4362 2.88889 14.2038 2.82122C14.0877 2.78739 13.9417 2.75387 13.8863 2.74154C13.4793 2.67372 13.1935 2.2878 13.2595 1.88008Z"
                                                      fill="var(--White)"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M13.4857 5.32954C13.5995 4.93126 14.0146 4.70065 14.4129 4.81444L14.2069 5.53558C14.4129 4.81444 14.4129 4.81444 14.4129 4.81444L14.4144 4.81485L14.4159 4.81529L14.4192 4.81627L14.427 4.81858L14.4468 4.82475C14.4618 4.82957 14.4807 4.83585 14.5031 4.84381C14.548 4.85975 14.6074 4.88242 14.6802 4.91362C14.8259 4.97605 15.0249 5.07248 15.2695 5.21719C15.7589 5.50687 16.4271 5.98805 17.2121 6.77302C17.9971 7.55799 18.4782 8.22618 18.7679 8.71564C18.9126 8.96015 19.009 9.15922 19.0715 9.3049C19.1027 9.37771 19.1254 9.43707 19.1413 9.48198C19.1493 9.50443 19.1555 9.52326 19.1604 9.53834L19.1665 9.55812L19.1688 9.56587L19.1698 9.56921L19.1702 9.57074C19.1702 9.57074 19.1707 9.57218 18.4495 9.77822L19.1707 9.57218C19.2845 9.97046 19.0538 10.3856 18.6556 10.4994C18.2607 10.6122 17.8492 10.3864 17.7313 9.99437L17.7276 9.98359C17.7223 9.96856 17.7113 9.93898 17.6928 9.89578C17.6558 9.80944 17.5887 9.66821 17.4771 9.47962C17.2541 9.10288 16.8514 8.53363 16.1514 7.83368C15.4515 7.13373 14.8822 6.73102 14.5055 6.50805C14.3169 6.39644 14.1757 6.32934 14.0893 6.29234C14.0461 6.27382 14.0165 6.26279 14.0015 6.25746L13.9907 6.25376C13.5987 6.13588 13.3729 5.72443 13.4857 5.32954Z"
                                                      fill="var(--White)"/>
                                            </svg>
                                        </div>

                                        <h4 class="phone__name"><?= $name; ?></h4>
                                    </a>
                                <?php } else { ?>
                                    <a href="tel:<?= $value; ?>" class="phone">
                                        <h6 class="bold phone__name"><?= $name; ?></h6>
                                    </a>
                                <?php }
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="header__menu-parent">
            <div class="container">
                <div class="header__menu">
                    <div class="catalog">
                        <div class="btn invert">
                            <div class="catalog__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M4 7L7 7M20 7L11 7" stroke="var(--White)" stroke-width="1.5"
                                          stroke-linecap="round"/>
                                    <path d="M20 17H17M4 17L13 17" stroke="var(--White)" stroke-width="1.5"
                                          stroke-linecap="round"/>
                                    <path d="M4 12H7L20 12" stroke="var(--White)" stroke-width="1.5"
                                          stroke-linecap="round"/>
                                </svg>
                            </div>

                            КАТАЛОГ
                        </div>

                        <div class="catalog__items catalog__list">
                            <?php foreach ($catalog_items as $item) {
//                                var_dump($item);
                                $term = get_term($item['category']);
                                $link = get_term_link($term);
                                $icon = get_image(get_field('icon', $term), [41, 41]);
                                $name = $term->name;
                                $items = $item['submenu'];
                                ?>
                                <div class="item-wrapper">
                                    <a href="<?= $link; ?>" class="item">
                                        <?php if ($icon) { ?>
                                            <div class="item__icon">
                                                <?= $icon; ?>
                                            </div>
                                        <?php } ?>

                                        <div class="item__name">
                                            <?= $name; ?>
                                        </div>

                                        <?php if (!empty($items)) { ?>
                                            <div class="item__arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M11.2095 7.1165C11.4611 6.94258 11.8399 6.96608 12.0556 7.16898L16.8556 11.6851C17.0481 11.8663 17.0481 12.1337 16.8556 12.3149L12.0556 16.831C11.8399 17.0339 11.4611 17.0574 11.2095 16.8835C10.9579 16.7096 10.9288 16.4041 11.1445 16.2012L15.6098 12L11.1445 7.79878C10.9288 7.59588 10.9579 7.29041 11.2095 7.1165Z"
                                                          fill="#DFDFDF"/>
                                                </svg>
                                            </div>
                                        <?php } ?>
                                    </a>

                                    <?php if (!empty($items)) { ?>
                                        <div class="catalog__list sub-items">
                                            <?php foreach ($items as $subitem) {
                                                $term = get_term($subitem);
                                                $link = get_term_link($term);
                                                $name = $term->name;
                                                ?>
                                                <a href="<?= $link; ?>" class="item">
                                                    <div class="item__name">
                                                        <?= $name; ?>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="burger open_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <a href="/" class="home">
                        <div class="home__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                 fill="none">
                                <path d="M7.50008 14.3751C7.1549 14.3751 6.87508 14.6549 6.87508 15.0001C6.87508 15.3453 7.1549 15.6251 7.50008 15.6251H12.5001C12.8453 15.6251 13.1251 15.3453 13.1251 15.0001C13.1251 14.6549 12.8453 14.3751 12.5001 14.3751H7.50008Z"
                                      fill="var(--White)"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10.0001 1.04175C9.40998 1.04175 8.87386 1.21076 8.29221 1.49361C7.72995 1.76704 7.08043 2.17016 6.26913 2.67368L4.54699 3.7425C3.77932 4.21892 3.16462 4.60042 2.69083 4.96325C2.20021 5.33899 1.82337 5.72166 1.55117 6.21894C1.27954 6.71518 1.15722 7.2432 1.09857 7.86733C1.04174 8.4722 1.04174 9.21184 1.04175 10.1394V11.4833C1.04174 13.0699 1.04173 14.3222 1.169 15.3014C1.29956 16.3059 1.57388 17.1168 2.19371 17.7579C2.8164 18.402 3.6088 18.6898 4.58975 18.8262C5.54049 18.9584 6.75472 18.9584 8.28495 18.9584H11.7152C13.2454 18.9584 14.4597 18.9584 15.4104 18.8262C16.3914 18.6898 17.1838 18.402 17.8064 17.7579C18.4263 17.1168 18.7006 16.3059 18.8312 15.3014C18.9584 14.3222 18.9584 13.0699 18.9584 11.4833V10.1394C18.9584 9.21186 18.9584 8.47218 18.9016 7.86733C18.8429 7.2432 18.7206 6.71518 18.449 6.21894C18.1768 5.72166 17.8 5.33899 17.3093 4.96325C16.8355 4.60042 16.2209 4.21893 15.4532 3.74251L13.731 2.67368C12.9197 2.17015 12.2702 1.76703 11.708 1.49361C11.1263 1.21076 10.5902 1.04175 10.0001 1.04175ZM6.89969 3.75351C7.74615 3.22817 8.34133 2.85969 8.83887 2.61774C9.3236 2.38202 9.6669 2.29175 10.0001 2.29175C10.3333 2.29175 10.6766 2.38202 11.1613 2.61774C11.6588 2.85969 12.254 3.22817 13.1005 3.75351L14.7671 4.78789C15.5678 5.28483 16.13 5.63454 16.5493 5.95566C16.9573 6.26812 17.192 6.52596 17.3525 6.81912C17.5135 7.11333 17.6076 7.45729 17.6571 7.98428C17.7078 8.52391 17.7084 9.20493 17.7084 10.17V11.4375C17.7084 13.08 17.7072 14.2511 17.5916 15.1403C17.4781 16.0137 17.2642 16.5204 16.9078 16.8891C16.5541 17.2549 16.0727 17.4721 15.2382 17.5881C14.3836 17.707 13.2564 17.7084 11.6667 17.7084H8.33341C6.74381 17.7084 5.61661 17.707 4.76193 17.5881C3.92746 17.4721 3.44603 17.2549 3.09241 16.8891C2.73592 16.5204 2.52209 16.0137 2.40857 15.1403C2.29299 14.2511 2.29175 13.08 2.29175 11.4375V10.17C2.29175 9.20493 2.29238 8.5239 2.34309 7.98428C2.39261 7.45729 2.48662 7.11333 2.64766 6.81912C2.80813 6.52596 3.04285 6.26812 3.45085 5.95566C3.87016 5.63454 4.43233 5.28483 5.23302 4.78789L6.89969 3.75351Z"
                                      fill="var(--White)"/>
                            </svg>
                        </div>

                        ГЛАВНАЯ
                    </a>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'headMenu',
                        'container' => false,
                        'menu' => 'Главное',
                        'menu_class' => 'menuTop',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-mnu">
        <div id="close-mnu">×</div>

        <a href="/" class="logo">
            <div class="logo__image">
                <?= $logo; ?>
            </div>

            <?php if ($logo_text) { ?>
                <div class="logo__text"><?= $logo_text; ?></div>
            <?php } ?>
        </a>

        <?php
        wp_nav_menu([
            'theme_location' => 'mobileMenu',
            'container' => false,
            'menu' => 'Главное',
            'menu_class' => 'menuTop',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ]);
        ?>
        <?php if (!empty($phones)) { ?>
            <div class="phones__holder">
                <?php foreach ($phones as $item) { ?>
                    <a href="tel:<?= $item['value']; ?>" class="phone__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/phone.svg'); ?>
                        <?= $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (!empty($emails)): ?>
            <div class="email__holder">
                <?php foreach ($emails as $item) { ?>
                    <a href="mailto:<?= $item['value']; ?>" class="email__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/mail.svg'); ?>
                        <?php echo $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>
        <?php if (!empty($adresses)): ?>
            <div class="adresses__holder">
                <?php foreach ($adresses as $adress) { ?>
                    <?= $adress['value']; ?>
                <?php } ?>
            </div>
        <?php endif ?>
        <?php if (!empty($socials)): ?>
            <div class="soc__holder">
                <?php foreach ($socials as $item) { ?>
                    <a href="<?= $item['value']; ?>" class="soc__item">
                        <?= get_image($item['icon'], [24, 24]); ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>
</header><!-- #masthead -->
