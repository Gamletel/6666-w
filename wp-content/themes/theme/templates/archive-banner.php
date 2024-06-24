<?php
$item = get_queried_object();
$taxonomy = $item->taxonomy;
$term_id = $item->term_id;
$title = $item->name;
$description = $item->description;
$additional_text = get_field('dop_tekst', $item);
$icon = wp_get_attachment_image_url(get_field('banner_image', $item), 'full');
$products = get_posts([
    'numberposts' => -1,
    'post_type' => 'products',
    'tax_query' => array(
        'taxonomy' => 'products_categories',
        'field' => 'slug',
        'terms' => $item->slug,
    ),
]);
$regular_prices = array();
foreach ($products as $product) {
    $regular_price = get_field('regular_price', $product->ID);
    $regular_price = intval($regular_price);
    $regular_prices[] = $regular_price;
}
$min_regular_price = min($regular_prices);

$sale_prices = array();
foreach ($products as $product) {
    $sale_price = get_field('sale_price', $product->ID);
    $sale_price = intval($sale_price);
    $sale_prices[] = $sale_price;
}
$min_sale_price = min($sale_prices);

$min_price = min($min_sale_price, $min_regular_price);
$min_price = number_format($min_price, 0, '', ' ');
?>
<div class="archive__banner">
    <div class="banner__content">
        <h6 class="banner__description">
            <?php if ($description) { ?>
                <?= $description; ?>
            <?php } else { ?>
                <?= $title; ?>
            <?php } ?>
        </h6>

        <div class="banner__price">
            <div class="desc price__title">Цены от:</div>

            <div class="price__value">от <?= $min_price; ?> ₽</div>
        </div>
    </div>

    <div class="banner__bg-text">
        <?php if ($additional_text) {
            echo $additional_text;
        } else {
            echo $title;
        } ?>
    </div>
    
    <?php if ($icon) {?>
        <img src="<?= $icon; ?>" alt="" class="banner__icon">
    <?php } ?>

</div>