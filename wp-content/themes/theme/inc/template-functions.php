<?php

// ================= ACTIONS ====================

add_action('wp_ajax_load_products', 'load_products');
add_action('wp_ajax_nopriv_load_products', 'load_products');

function load_products()
{
    $brand = $_POST['brand'];
    $compatibility = $_POST['compatibility'];
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 15,
        'tax_query' => array(
            array(
                'taxonomy' => 'products_manufacturer',
                'field'    => 'slug',
                'terms'    => $brand,
            ),
            array(
                'taxonomy' => 'compatibility',
                'field'    => 'slug',
                'terms'    => $compatibility,
            )
        )
    );


    $posts = new WP_Query($args);

    if (!empty($posts)) {
        while($posts->have_posts()){
            $posts->the_post();
            get_template_part('templates/product-card');
        }

        wp_reset_postdata();
    } else {
        ?>
        <?php
    }

    wp_die(); // Завершаем выполнение скрипта
}

// ================= ACTIONS FUNCSTIONS ====================


// ================= ФИЛЬТРЫ ====================


add_filter('excerpt_more', function ($more) {
    return '...';
});
add_filter('excerpt_length', function () {
    return 25;
});


// ================ FUNCSTIONS ===============

/*------- ПОЛУЧЕНИЕ ФОРМЫ ----------*/

function get_form($formname = '', $params = [])
{
    $echo = true;

    if (array_key_exists('echo', $params)) {
        $echo = $params['echo'];
    }

    if (!$formname) {
        if ($echo === true) {
            echo 'Форма не найдена!';
            return;
        } else {
            return false;
        }
    }

    if ($echo) {
        get_template_part('inc/parts/forms/form', $formname, $params);
    } else {
        ob_start();
        get_template_part('inc/parts/forms/form', $formname, $params);
        $out = ob_get_clean();
        return $out;
    }
}


/*-------- ПЕРЕВОД ПОЛЕЙ ---------*/

if (function_exists('GSE')) {
    GSE()::add_translation('subject', 'Тема письма');
    GSE()::add_translation('your-name', 'Имя');
    GSE()::add_translation('your-tel', 'Телефон');
    GSE()::add_translation('quiz-data', 'Результаты квиза');
}


// ============== ADD THEME PAGE ===============

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Параметры темы',
        'menu_title' => 'Параметры темы',
        'menu_slug' => 'gs-theme-params',
        'capability' => 'manage_options',
        'parent_slug' => 'themes.php',
        'icon_url' => 'dashicons-location-alt',
        'redirect' => false,
        'autoload' => true,
        'update_button' => 'Обновить',
        'updated_message' => 'Параметры темы обновлены',
    ));
}


function theme($type)
{
    $setting = get_field($type, 'options');
    if ($setting) {
        return $setting;
    } else {
        return '';
    }
}


// =========== РЕГИСТРАЦИЯ БЛОКОВ ===============


add_filter('block_categories_all', 'add_blocks_category', 10);

function add_blocks_category($categories)
{

    $categories[] = array(
        'slug' => 'theme-blocks',
        'title' => 'Блоки темы',
        'icon' => null,
    );

    return $categories;
}

function add_blocks()
{
    $ignore = array('.', '..');
    $bpath = __DIR__ . '/blocks/';
    $blocks = scandir($bpath);

    foreach ($blocks as $folder) {
        if (!in_array($folder, $ignore)) {
            if (file_exists($bpath . $folder . '/index.php')) {
                // $this->blocks[$folder] = require_once $bpath.$folder.'/index.php';
                require_once $bpath . $folder . '/index.php';

            }
        }
    }
}

add_blocks();

function wide_Setup()
{
    add_theme_support('align-wide');
}

add_action('after_setup_theme', 'wide_Setup');
