<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */

$title_type = get_field('title_type');
switch ($title_type) {
    case 'none':
        $title = null;
        break;
    case 'default':
        $title = get_the_title();
        break;
    case 'changed':
        $title = get_field('changed_title');
        break;
}
$banner = get_field('banner');
if ($banner) {
    $description = get_field('description');
    $image = wp_get_attachment_image_url(get_field('image'), 'full');
    $banner_bg = get_image(theme('page_banner_bg'), 'full');
}

get_header();
?>
    <main id="primary" class="site-main">
        <?php if ($banner) { ?>
            <div class="page-banner">
                <div class="container">
                    <div class="page-banner__wrapper">
                        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <?php if (function_exists('bcn_display')) {
                                bcn_display();
                            } ?>
                        </div>

                        <?php if ($title) { ?>
                            <h1 class="page-title"><?= $title; ?></h1>
                        <?php } ?>

                        <?php if ($description) { ?>
                            <div class="p1 description"><?= $description; ?></div>
                        <?php } ?>

                        <?php if ($image) { ?>
                            <div class="page-banner__image">
                                <img src="<?= $image; ?>" alt="">
                            </div>
                        <?php } ?>

                        <?php if ($banner_bg) { ?>
                            <div class="page-banner__bg">
                                <?= $banner_bg; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>

                <?php if ($title) { ?>
                    <h1 class="page-title"><?= $title; ?></h1>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </main><!-- #main -->

<?php
get_footer();
