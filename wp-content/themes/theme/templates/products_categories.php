<?php
$parent_terms = get_terms('products_categories', [
    'hide_empty' => false,
    'parent' => 0,
]);
$current_item = get_queried_object();
$current_item_id = $current_item->term_id;
//var_dump($parent_terms);
?>
<div class="products-categories">
    <div id="close-filter">×</div>

    <div id="open-filter">
        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 6H19M21 12H16M21 18H16M7 20V13.5612C7 13.3532 7 13.2492 6.97958 13.1497C6.96147 13.0615 6.93151 12.9761 6.89052 12.8958C6.84431 12.8054 6.77934 12.7242 6.64939 12.5617L3.35061 8.43826C3.22066 8.27583 3.15569 8.19461 3.10948 8.10417C3.06849 8.02393 3.03853 7.93852 3.02042 7.85026C3 7.75078 3 7.64677 3 7.43875V5.6C3 5.03995 3 4.75992 3.10899 4.54601C3.20487 4.35785 3.35785 4.20487 3.54601 4.10899C3.75992 4 4.03995 4 4.6 4H13.4C13.9601 4 14.2401 4 14.454 4.10899C14.6422 4.20487 14.7951 4.35785 14.891 4.54601C15 4.75992 15 5.03995 15 5.6V7.43875C15 7.64677 15 7.75078 14.9796 7.85026C14.9615 7.93852 14.9315 8.02393 14.8905 8.10417C14.8443 8.19461 14.7793 8.27583 14.6494 8.43826L11.3506 12.5617C11.2207 12.7242 11.1557 12.8054 11.1095 12.8958C11.0685 12.9761 11.0385 13.0615 11.0204 13.1497C11 13.2492 11 13.3532 11 13.5612V17L7 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>


    <?php foreach ($parent_terms as $parent_term) {
        $id = $parent_term->term_id;
        $name = $parent_term->name;
        $terms = get_terms('products_categories', [
            'hide_empty' => false,
            'child_of' => $id,
        ]);
        ?>
        <div class="main-category">
            <div class="main-category__name">
                <h6 class="main-category__name-wrapper">
                    <?= $name; ?>
                </h6>

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M16.8835 11.2095C17.0574 11.4611 17.0339 11.8399 16.831 12.0556L12.3149 16.8556C12.1337 17.0481 11.8663 17.0481 11.6851 16.8556L7.16898 12.0556C6.96608 11.8399 6.94258 11.4611 7.1165 11.2095C7.29041 10.9579 7.59588 10.9288 7.79878 11.1445L12 15.6098L16.2012 11.1445C16.4041 10.9288 16.7096 10.9579 16.8835 11.2095Z"
                          fill="var(--Gray-4)"/>
                </svg>
            </div>

            <?php if (!empty($terms)) { ?>
                <div class="main-category__subcategories" style="display: none">
                    <?php foreach ($terms as $term) {
                        $term_id = $term->term_id;
                        $name = $term->name;
                        $link = get_term_link($term->term_id);
                        ?>
                        <a href="<?= $link; ?>" class="subcategory desc <?php if ($term_id == $current_item_id) {
                            echo 'active';
                        } ?>">
                            <?= $name; ?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <script>
        jQuery(document).ready(function ($) {
            const filterWrapper = $('.products-categories');
            const closeFilter = filterWrapper.find('#close-filter');
            const openFilter = filterWrapper.find('#open-filter');
            const productsCategories = $('.products-categories .main-category');

            productsCategories.each(function () {
                let subcategoriesWrapper = $(this).find('.main-category__subcategories');
                // let subcategory = $(this).find('.active');
                // console.log(subcategory);
                // if (subcategory){
                //     // $(this).find('.main-category__name').toggleClass('active');
                //     subcategoriesWrapper.slideDown();
                // }

                $(this).click(function () {
                    subcategoriesWrapper.slideToggle();
                    $(this).find('.main-category__name').toggleClass('active');
                })
            })

            closeFilter.click(()=>{
                filterWrapper.removeClass('active');
            })
            openFilter.click(()=>{
                filterWrapper.toggleClass('active');
            })
        })
    </script>
</div>