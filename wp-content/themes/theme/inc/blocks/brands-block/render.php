<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$show_all = get_field('show_all');
if ($show_all) {
    $brands = get_terms('products_manufacturer', [
        'hide_empty' => false,
        'parent' => 0
    ]);
} else {
    $brands = get_field('brands');
}
$banner = get_field('banner');
$banner_text = $banner['text'];
$banner_title = $banner['title'];
$banner_btn_text = $banner['btn_text'];
?>
<?php if (!empty($brands)) { ?>
    <div id="brands-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="block__container">
            <div class="container">
                <?php if ($block_title) { ?>
                    <h2 class="block-title"><?= $block_title; ?></h2>
                <?php } ?>

                <div class="brands">
                    <?php foreach ($brands as $brand) {
                        $term = get_term($brand);
                        $link = get_term_link($term->term_id);
                        $icon = wp_get_attachment_image_url(get_field('icon', $term), 'full');
                        ?>
                        <?php if ($icon) { ?>
                            <a href="<?= $link; ?>" class="brand">
                                <img src="<?= $icon; ?>" alt="" class="brand__icon">
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="block__banner">
            <div class="container">
                <div class="banner__wrapper">
                    <div class="banner__bg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="178" height="180" viewBox="0 0 178 180"
                             fill="none">
                            <path d="M157.368 112.478L178 109.242V70.7582L157.368 67.5224C140.391 64.6572 134.423 42.1692 147.696 31.2581L163.266 18.4325L144.107 -14.7411L125.052 -7.60582C108.921 -1.56224 92.5581 -17.9098 98.6058 -34.0521L105.741 -53.1073L72.5675 -72.2661L59.7419 -56.6957C48.8508 -43.4483 26.3483 -49.3585 23.4776 -66.3684L20.2418 -87H-18.2418L-21.4776 -66.3684C-24.358 -49.3896 -46.8287 -43.4214 -57.7419 -56.6957L-70.5675 -72.2661L-103.741 -53.1073L-96.6058 -34.0521C-90.5636 -17.9237 -106.91 -1.55809 -123.052 -7.60582L-142.107 -14.7411L-161.266 18.4325L-145.696 31.2581C-139.632 36.2501 -137.053 44.4432 -139.12 52.1455C-139.162 52.2146 -141.817 65.2338 -155.368 67.5224L-176 70.7582V109.242L-155.368 112.478C-147.625 113.791 -141.305 119.599 -139.272 127.294C-139.272 127.364 -135.083 140.009 -145.696 148.742L-161.266 161.567L-142.107 194.741L-123.052 187.606C-107 181.592 -90.5297 197.846 -96.6058 214.052L-103.741 233.107L-70.5675 252.266L-57.7419 236.696C-46.8626 223.481 -24.3649 229.316 -21.4776 246.368L-18.2418 267H20.2418L23.4776 246.368C26.3248 229.495 48.7568 223.345 59.7419 236.696L72.5675 252.266L105.741 233.107L98.6058 214.052C92.592 198 108.846 181.53 125.052 187.606L144.107 194.741L163.266 161.567L147.696 148.742C134.446 137.849 140.358 115.363 157.368 112.478ZM1 183.34C-50.4683 183.34 -92.3398 141.468 -92.3398 90C-92.3398 38.5317 -50.4683 -3.33984 1 -3.33984C52.4683 -3.33984 94.3398 38.5317 94.3398 90C94.3398 141.468 52.4683 183.34 1 183.34ZM1 17.4023C-39.0324 17.4023 -71.5977 49.9676 -71.5977 90C-71.5977 130.032 -39.0324 162.598 1 162.598C41.0324 162.598 73.5977 130.032 73.5977 90C73.5977 49.9676 41.0324 17.4023 1 17.4023ZM1 141.855C-27.5896 141.855 -50.8555 118.597 -50.8555 90C-50.8555 61.4034 -27.5896 38.1445 1 38.1445C29.5896 38.1445 52.8555 61.4034 52.8555 90C52.8555 118.597 29.5896 141.855 1 141.855Z"
                                  fill="var(--Green-dark-2)"/>
                        </svg>
                    </div>

                    <div class="banner__content">
                        <?php if ($banner_title) { ?>
                            <div class="banner__title"><?= $banner_title; ?></div>
                        <?php } ?>

                        <?php if ($banner_text) { ?>
                            <div class="banner__text"><?= $banner_text; ?></div>
                        <?php } ?>
                    </div>

                    <?php if ($banner_btn_text) { ?>
                        <div class="banner__btn btn invert" data-modal="callback"><?= $banner_btn_text; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>