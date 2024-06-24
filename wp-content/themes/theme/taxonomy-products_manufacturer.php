<?php
// the_post();
get_header();

$item = get_queried_object();
$taxonomy = $item->taxonomy;
$term_id = $item->term_id;
$termSlug = $item->slug;

$subCats = get_terms([
    'taxonomy' => $taxonomy,
    'parent' => $term_id,
    'hide_empty' => false,
]);
?>
    <main id="main" class="base-page category-page archive-products">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="archive__wrapper">
                <?php get_template_part('templates/products_categories') ?>

                <div class="archive__content">
                    <h1 class="page-title">
                        <?= $item->name; ?>
                    </h1>

                    <?php get_template_part('templates/archive-banner') ?>

                    <?php if (!empty($subCats)) { ?>
                        <div class="subcategories">
                            <?php foreach ($subCats as $item) {
                                $link = get_term_link($item->term_id);
                                $title = $item->name;
                                $icon = wp_get_attachment_image_url(get_field('icon', $item), 'full');
                                $subcategories = get_terms($item->taxonomy,[
                                    'hide_empty'=>false,
                                    'parent'=>$item->term_id,
                                ]);
                                ?>
                                <div class="subcategory">
                                    <a href="<?= $link; ?>" class="subcategory__title">
                                        <?= $title; ?>
                                    </a>
                                    
                                    <?php if ($icon) {?>
                                        <img src="<?= $icon; ?>" alt="" class="subcategory__icon">
                                    <?php } ?>

                                    <?php if (!empty($subcategories)) {?>
                                        <div class="subcategory__items">
                                            <?php foreach ($subcategories as $item) {
                                                $link = get_term_link($item->term_id);
                                                $title = $item->name;
                                                ?>
                                                <a href="<?= $link; ?>" class="item desc-14">
                                                    <?= $title; ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php /* if ($subCats):
                        ?>
                        <div id="subcats-holder" class="subcats__holder">
                            <?php foreach ($subCats as $subCat) {
                                ?>
                                <a href="" class="cat__item">

                                </a>
                            <?php } ?>
                        </div>
                    <?php endif */ ?>

                    <?php if ($posts) {
                        global $post;
                        ?>
                        <div id="category-holder" class="archive__holder">
                            <?php
                            while (have_posts()) :
                                the_post();

                                get_template_part('templates/product-card');

                            endwhile;

                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php the_posts_pagination(); ?>
                    <?php } elseif (!$subCats && !$posts) { ?>
                        <h2 class="not_founded">
                            Товаров не найдено
                        </h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>