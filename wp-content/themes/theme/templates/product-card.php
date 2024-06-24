<?php
$link = get_permalink();
$title = get_the_title();
$thumbnail = get_the_post_thumbnail_url($post, 'full');
$products_manufacturer = get_terms('products_manufacturer', [
    'hide_empty' => false,
    'parent' => 0,
]);
$products_manufacturer_name = $products_manufacturer[0]->name;
$article = get_field('article', $post);
$regular_price = get_field('regular_price', $post);
$regular_price = number_format($regular_price, 0, '', ' ');
$sale_price = get_field('sale_price', $post);
$sale_price = number_format($sale_price, 0, '', ' ');
?>
<a href="<?= $link; ?>" class="product-card">
    <?php if ($thumbnail) { ?>
        <div class="product-card__thumbnail">
            <img src="<?= $thumbnail; ?>" alt="">
        </div>
    <?php } ?>

    <div class="product-card__content">
        <?php if ($products_manufacturer_name || $article) { ?>
            <div class="product-card__additional desc">
                <?php if ($products_manufacturer_name) { ?>
                    <div class="product-card__manufacturer">
                        <?= $products_manufacturer_name; ?>
                    </div>
                <?php } ?>
                <?php if ($article) { ?>
                    <div class="product-card__article">
                        Арт.<?= $article; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <h6 class="product-card__title"><?= $title; ?></h6>

        <div class="product-card__bottom">
            <?php if ($regular_price || $sale_price) { ?>
                <div class="product-card__price">
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

            <div class="link-btn btn"><?= inline('assets/images/link-btn.svg'); ?></div>
        </div>
    </div>
</a>