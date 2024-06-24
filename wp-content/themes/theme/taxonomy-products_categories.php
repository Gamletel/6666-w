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

$compatibility = get_terms('compatibility', [
    'hide_empty' => false,
]);

$products_manufacturer = get_terms('products_manufacturer', [
    'hide_empty' => false,
    'parent' => 0,
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

                    <div class="category-ajax-filter">
                        <div class="terms">
                            <?php if (!empty($compatibility)) { ?>
                                <div class="term" data-name="compatibility">
                                    <div class="term__name desc-14">Совместимость:</div>

                                    <div class="term__holder">
                                        <div class="term__holder-name">
                                            <div class="name">
                                                Выбрать
                                            </div>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M16.8835 11.2095C17.0574 11.4611 17.0339 11.8399 16.831 12.0556L12.3149 16.8556C12.1337 17.0481 11.8663 17.0481 11.6851 16.8556L7.16898 12.0556C6.96608 11.8399 6.94258 11.4611 7.1165 11.2095C7.29041 10.9579 7.59588 10.9288 7.79878 11.1445L12 15.6098L16.2012 11.1445C16.4041 10.9288 16.7096 10.9579 16.8835 11.2095Z"
                                                      fill="var(--Gray-4)"/>
                                            </svg>
                                        </div>

                                        <div class="term__holder-items" style="display: none">
                                            <?php foreach ($compatibility as $item) {
                                                $name = $item->name;
                                                $slug = $item->slug;
                                                ?>
                                                <div class="item desc-14" data-slug="<?= $slug; ?>"><?= $name; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($products_manufacturer)) { ?>
                                <div class="term" data-name="manufacturer">
                                    <div class="term__name desc-14">Бренд:</div>

                                    <div class="term__holder">
                                        <div class="term__holder-name">
                                            <div class="name">
                                                Выбрать
                                            </div>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M16.8835 11.2095C17.0574 11.4611 17.0339 11.8399 16.831 12.0556L12.3149 16.8556C12.1337 17.0481 11.8663 17.0481 11.6851 16.8556L7.16898 12.0556C6.96608 11.8399 6.94258 11.4611 7.1165 11.2095C7.29041 10.9579 7.59588 10.9288 7.79878 11.1445L12 15.6098L16.2012 11.1445C16.4041 10.9288 16.7096 10.9579 16.8835 11.2095Z"
                                                      fill="var(--Gray-4)"/>
                                            </svg>
                                        </div>

                                        <div class="term__holder-items" style="display: none">
                                            <?php foreach ($products_manufacturer as $item) {
                                                $name = $item->name;
                                                $slug = $item->slug;
                                                ?>
                                                <div class="item desc-14" data-slug="<?= $slug; ?>"><?= $name; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div id="apply-filter" class="btn invert">Применить</div>

                        <input type="hidden" name="compatibility" class="input-compatibility">
                        <input type="hidden" name="manufacturer" class="input-manufacturer">

                        <script>
                            jQuery(document).ready(function ($) {
                                const filterTerms = $('.category-ajax-filter .term');
                                const compatibilityInput = $('.category-ajax-filter input[name=compatibility]');
                                const manufacturerInput = $('.category-ajax-filter input[name=manufacturer]');
                                const applyFilterBtn = $('#apply-filter');

                                filterTerms.click(function () {
                                    let parent = $(this);
                                    let items = $(this).find('.term__holder-items');
                                    let item = items.find('.item');

                                    item.click(function () {
                                        let hiddenInputName = parent.data('name');
                                        let hiddenInput = $('input[name='+hiddenInputName+']')
                                        let holderName = parent.find('.term__holder-name .name');
                                        let itemText = $(this).text();
                                        let itemSlug = $(this).data('slug');

                                        holderName.html(itemText);
                                        hiddenInput.val(itemSlug);
                                    })

                                    items.slideToggle();
                                });

                                applyFilterBtn.click(function (){
                                    const archiveHolder = $('.archive__holder');
                                    const hiddenInputManufacturersData = manufacturerInput.val();
                                    const hiddenInputCompatibilityData = compatibilityInput.val();
                                    console.log(hiddenInputManufacturersData);
                                    console.log(hiddenInputCompatibilityData);

                                    $.ajax({
                                        type: 'POST',
                                        url: '/wp-admin/admin-ajax.php',
                                        data: {
                                            action: 'load_products',
                                            brand: hiddenInputManufacturersData,
                                            compatibility: hiddenInputCompatibilityData,
                                        },
                                        beforeSend: function (xhr) {
                                            archiveHolder.addClass('loading');
                                        },
                                        success: function (response) {
                                            archiveHolder.html(response);
                                            archiveHolder.removeClass('loading');
                                        }
                                    });
                                });
                            })
                        </script>
                    </div>

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