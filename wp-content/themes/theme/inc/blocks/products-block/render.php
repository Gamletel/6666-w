<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$products = get_field('products');
$link_btn = get_field('link_btn');
$link_btn_text = $link_btn['text'];
$link_btn_link = $link_btn['link'];
?>
<?php if (!empty($products)) { ?>
    <div id="products-block" class="block-padding block-margin<?= $classes; ?> <?= $align; ?>">
        <div class="container">
            <?php if ($block_title) { ?>
                <h2 class="block-title"><?= $block_title; ?></h2>
            <?php } ?>

            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product) {
                        setup_postdata($GLOBALS['post'] = $product);
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part('templates/product-card') ?>
                        </div>
                    <?php }

                    wp_reset_postdata(); ?>
                </div>
            </div>

            <div class="swiper-additionals">
                <a href="<?= $link_btn_link; ?>" class="btn"><?= $link_btn_text; ?></a>

                <div class="swiper-btns">
                    <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                    <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>