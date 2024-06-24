<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$text = get_field('text');
?>
<?php if ($text) { ?>
    <div id="text-big-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <?php if ($block_title) {?>
            <h2 class="block__title"><?= $block_title; ?></h2>
        <?php } ?>

        <div id="text-block" class="text-block"><?= $text; ?></div>
    </div>
<?php } ?>
