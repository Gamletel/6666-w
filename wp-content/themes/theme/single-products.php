<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme
 */
$title = get_the_title();
$thumbnail = get_the_post_thumbnail_url($post, 'full');
$images = get_field('images');
$products_manufacturer = get_terms('products_manufacturer', [
    'hide_empty' => false,
    'parent' => 0,
]);
$products_manufacturer_name = $products_manufacturer[0]->name;
$article = get_field('article');
$regular_price = get_field('regular_price', $post);
$regular_price = number_format($regular_price, 0, '', ' ');
$sale_price = get_field('sale_price', $post);
$sale_price = number_format($sale_price, 0, '', ' ');
$short_description = get_field('short_description');
$description = get_field('description');
$characteristics = get_field('characteristics');

$other_products = new WP_Query([
    'numberposts' => 10,
    'post_type' => 'products',
]);
$products_categories = theme('products_categories');

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="product__wrapper block-margin">
                <?php get_template_part('templates/products_categories') ?>

                <div class="product__info">
                    <div class="product__info-wrapper">
                        <div class="product__thumbnail">
                            <?php if ($images) {
                                $images_count = count($images);
                                ?>
                                <div class="thumbnail__count">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                         fill="none">
                                        <path d="M1.5 10.5C1.5 7.67157 1.5 6.25736 2.37868 5.37868C3.25736 4.5 4.67157 4.5 7.5 4.5H10.5C13.3284 4.5 14.7426 4.5 15.6213 5.37868C16.5 6.25736 16.5 7.67157 16.5 10.5C16.5 13.3284 16.5 14.7426 15.6213 15.6213C14.7426 16.5 13.3284 16.5 10.5 16.5H7.5C4.67157 16.5 3.25736 16.5 2.37868 15.6213C1.5 14.7426 1.5 13.3284 1.5 10.5Z"
                                              stroke="white" stroke-width="1.5"/>
                                        <path d="M3.00134 5.25L2.99219 4.5C3.07651 3.80173 3.25255 3.31919 3.62008 2.95294C4.32549 2.25 5.46083 2.25 7.73151 2.25H10.1399C12.4106 2.25 13.546 2.25 14.2514 2.95294C14.6189 3.31919 14.7949 3.80173 14.8793 4.5V5.25"
                                              stroke="white" stroke-width="1.5"/>
                                        <circle cx="13.125" cy="7.875" r="1.125" stroke="white" stroke-width="1.5"/>
                                        <path d="M1.5 10.8751L2.81369 9.72563C3.49714 9.12762 4.52721 9.16192 5.16936 9.80407L8.38666 13.0214C8.90208 13.5368 9.71343 13.6071 10.3098 13.1879L10.5335 13.0308C11.3916 12.4277 12.5527 12.4975 13.3324 13.1992L15.75 15.3751"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>

                                    <?= $images_count; ?>
                                </div>
                            <?php } ?>

                            <?php if ($thumbnail) { ?>
                                <img src="<?= $thumbnail; ?>" alt="" data-fancybox='product-gallery'
                                     data-src='<?= $thumbnail; ?>' class="thumbnail__image">
                            <?php } else {
                                $thumbnail = wp_get_attachment_image_url($images[0], 'full');
                                ?>
                                <img src="<?= $thumbnail; ?>" alt="" data-fancybox='product-gallery'
                                     data-src='<?= $thumbnail; ?>' class="thumbnail__image">
                                <?php
                            } ?>

                            <?php if (!empty($images)) { ?>
                                <div class="images">
                                    <?php foreach ($images as $item) {
                                        $image = wp_get_attachment_image_url($item, 'full');
                                        ?>
                                        <img src="<?= $image; ?>" data-fancybox='product-gallery'
                                             data-src='<?= $image; ?>' alt="">
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="product__main-info">
                            <h1 class="product__title"><?= $title; ?></h1>

                            <div class="product__additionals">
                                <?php if ($products_manufacturer_name) { ?>
                                    <div class="product__manufacturer additionals__item"><?= $products_manufacturer_name; ?></div>
                                <?php } ?>

                                <?php if ($article) { ?>
                                    <div class="product__article additionals__item">Арт.<?= $article; ?></div>
                                <?php } ?>
                            </div>

                            <?php if ($short_description) { ?>
                                <div class="product__short-description">
                                    <h5 class="short-description__title">Краткое описание</h5>

                                    <div class="short-description__text desc-14"><?= $short_description; ?></div>
                                </div>
                            <?php } ?>

                            <div class="product__price-wrapper">
                                <?php if ($regular_price || $sale_price) { ?>
                                    <div class="product__price">
                                        <?php if ($sale_price) { ?>
                                            <?php if ($regular_price) { ?>
                                                <div class="price__second-price"><?= $regular_price; ?> ₽</div>
                                            <?php } ?>

                                            <div class="price__main-price"><?= $sale_price; ?> ₽</div>
                                        <?php } else if ($regular_price) { ?>
                                            <div class="price__main-price"><?= $regular_price; ?> ₽</div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <div class="price__btn btn invert" data-modal="callback">Оставить заявку</div>
                            </div>
                        </div>
                    </div>

                    <?php if ($description && $characteristics) { ?>
                        <div class="product__data">
                            <div class="data__tabs">
                                <?php if ($description) { ?>
                                    <div class="tab" data-info-name="description">Описание товара</div>
                                <?php } ?>


                                <?php if ($characteristics) { ?>
                                    <div class="tab" data-info-name="characteristics">Характеристики товара</div>
                                <?php } ?>
                            </div>

                            <?php if ($description) { ?>
                                <div class="data__body data__description" data-info-name="description">
                                    <h3 class="data__title">Описание</h3>

                                    <div class="data__text desc-14 text-block"><?= $description; ?></div>
                                </div>
                            <?php } ?>

                            <?php if ($characteristics) { ?>
                                <div class="data__body data__characteristics" data-info-name="characteristics">
                                    <h3 class="data__title">Технические характеристики</h3>

                                    <div class="data__table data__characteristics-table">
                                        <?php foreach ($characteristics as $item) {
                                            $name = $item['name'];
                                            $value = $item['value'];
                                            ?>
                                            <div class="data__table-item data__characteristics-item">
                                                <div class="item__name desc-14"><?= $name; ?></div>

                                                <h6 class="item__value"><?= $value; ?></h6>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($other_products)) { ?>
                        <div class="block-wrapper">
                            <div class="product__other-products-block">
                                <h2 class="block-title">Вас могут заинтересовать</h2>

                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($other_products as $product) { ?>
                                            <div class="swiper-slide">
                                                <?php get_template_part('templates/product-card') ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="swiper-additionals">
                                    <div class="swiper-btns">
                                        <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                                        <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php if (!empty($products_categories)) { ?>
            <div class="product__products-categories block-padding">
                <div class="container">
                    <div class="categories-wrapper">
                        <?php foreach ($products_categories as $item) {
                            $term = get_term($item);
                            $link = get_term_link($term);
                            $name = $term->name;
                            $products_count = count(get_posts([
                                'post_type' => 'products',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'products_categories',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                        'include_children' => true,
                                    )
                                )
                            ]));
                            ?>
                            <a href="<?= $link ?>" class="category">
                                <span class="category__name"><?= $name; ?></span>

                                <span class="category__products-count"><?= $products_count; ?></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main><!-- #main -->

<?php
get_footer();
