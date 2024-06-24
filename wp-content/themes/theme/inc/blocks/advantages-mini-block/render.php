<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$advantages = get_field('advantages');
?>
<?php if (!empty($advantages)) { ?>
    <div id="advantages-mini-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <?php foreach ($advantages as $advantage) {
            $icon = get_image($advantage['icon'], [52,52]);
            $text = $advantage['text'];
            ?>
            <div class="advantage">
                <?php if ($icon) {?>
                    <div class="advantage__icon">
                        <?= $icon; ?>
                    </div>
                <?php } ?>
                
                <?php if ($text) {?>
                    <div class="advantage__text"><?= $text; ?></div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>
