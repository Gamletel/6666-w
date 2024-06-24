<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$block_additional_text = get_field('block_additional_text');
$block_bg = wp_get_attachment_image_url(get_field('block_bg'), 'full');
$block_image = wp_get_attachment_image_url(get_field('block_image'), 'full');
$btn = get_field('btn');
$btn_type = $btn['type'];
?>
<div id="mainbanner-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <div class="block__content">
            <?php if ($block_title) { ?>
                <h1 class="block__title"><?= $block_title; ?></h1>
            <?php } ?>

            <?php if ($block_additional_text) { ?>
                <h2 class="block__title-additional"><?= $block_additional_text; ?></h2>
            <?php } ?>

            <?php switch ($btn_type) {
                case 'none':
                    break;

                case'modal':
                    $text = $btn['text'];
                    ?>
                    <div class="block__btn btn" data-modal="callback"><?= $text; ?></div>
                    <?php
                    break;

                case 'link':
                    $text = $btn['text'];
                    $link = $btn['link'];
                    ?>
                    <a href="<?= $link; ?>" class="block__btn btn"><?= $text; ?></a>
                    <?php
                    break;
            } ?>
        </div>
    </div>

    <?php if ($block_bg) { ?>
        <img src="<?= $block_bg; ?>" alt="" class="block__bg">
    <?php } ?>

    <?php if ($block_image) { ?>
        <img src="<?= $block_image; ?>" alt="" class="block__image">
    <?php } ?>
</div>