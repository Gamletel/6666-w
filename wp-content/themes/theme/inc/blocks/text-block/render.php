<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$text = get_field('text');
$image = wp_get_attachment_image_url(get_field('image'), 'full');
?>
<?php if ($block_title || $text) { ?>
    <div id="text-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="block__content">
            <?php if ($block_title) {?>
                <h2 class="block-title"><?= $block_title; ?></h2>
            <?php } ?>
            
            <?php if ($text) {?>
                <div class="p2 block__text text-block"><?= $text; ?></div>
            <?php } ?>
        </div>
        
        <?php if ($image) {?>
            <img src="<?= $image; ?>" alt="" class="block__image">
        <?php } ?>
    </div>
<?php } ?>
