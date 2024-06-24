<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme
 */

get_header();
?>

    <main id="primary" class="site-main error-page">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="error-page__content">
                <div class="error-page__text">К сожалению, страница не найдена</div>

                <a href="/" class="error-page__btn btn">на главную</a>
            </div>
        </div>

        <h1 class="error-page__title">404</h1>

    </main><!-- #main -->

<?php
get_footer();
