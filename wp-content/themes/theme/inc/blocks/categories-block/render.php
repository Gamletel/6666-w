<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$show_all = get_field('show_all');
if ($show_all) {
    $categories = get_terms('products_categories');
} else {
    $categories = get_field('categories');
}
$catalog_link = get_post_type_archive_link('products');
?>
<?php if (!empty($categories)) { ?>
    <div id="categories-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>

        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($categories as $item) {
                    $term = get_term($item);
                    $link = get_term_link($term);
                    $name = $term->name;
                    $icon = wp_get_attachment_image_url(get_field('icon', $term), 'full');
                    ?>
                    <div class="swiper-slide">
                        <a href="<?= $link; ?>" class="category">
                            <?php if ($icon) { ?>
                                <img src="<?= $icon; ?>" alt="" class="category__icon">
                            <?php } else{?>
                                <img src="<?= get_theme_root_uri() ?>/theme/assets/images/category-placeholder.png" alt="" class="category__icon">
                            <?php }?>

                            <span class="category__name"><?= $name; ?></span>

<!--                            <div class="category__btn">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
<!--                                     fill="none">-->
<!--                                    <path fill-rule="evenodd" clip-rule="evenodd"-->
<!--                                          d="M6.51174 4.43057C6.82623 4.161 7.29971 4.19743 7.56927 4.51192L13.5693 11.5119C13.81 11.7928 13.81 12.2072 13.5693 12.4881L7.56927 19.4881C7.29971 19.8026 6.82623 19.839 6.51174 19.5695C6.19724 19.2999 6.16082 18.8264 6.43039 18.5119L12.012 12L6.43039 5.48811C6.16082 5.17361 6.19724 4.70014 6.51174 4.43057ZM10.5119 4.43068C10.8264 4.16111 11.2999 4.19753 11.5695 4.51202L17.5695 11.512C17.8102 11.7929 17.8102 12.2073 17.5695 12.4882L11.5695 19.4882C11.2999 19.8027 10.8264 19.8391 10.5119 19.5696C10.1974 19.3 10.161 18.8265 10.4306 18.512L16.0122 12.0001L10.4306 5.48821C10.161 5.17372 10.1974 4.70024 10.5119 4.43068Z"-->
<!--                                          fill="var(--Green)"/>-->
<!--                                </svg>-->
<!--                            </div>-->
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="swiper-additionals">
            <a href="<?= $catalog_link; ?>" class="archive-btn btn">В КАТАЛОГ</a>

            <div class="swiper-btns">
                <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
            </div>
        </div>
    </div>
<?php } ?>