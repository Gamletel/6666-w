<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$advantages = get_field('advantages');
?>
<?php if (!empty($advantages)) { ?>
    <div id="advantages-block" class="block-padding block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="container">
            <?php if ($block_title) { ?>
                <h2 class="block-title"><?= $block_title; ?></h2>
            <?php } ?>

            <div class="advantages">
                <?php foreach ($advantages as $advantage) {
                    $icon = get_image($advantage['icon'], [45, 45]);
                    $text = $advantage['text'];
                    ?>
                    <div class="advantage">
                        <?php if ($icon) { ?>
                            <div class="advantage__icon">
                                <?= $icon; ?>
                            </div>
                        <?php } ?>

                        <?php if ($text) { ?>
                            <h4 class="advantage__text"><?= $text; ?></h4>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>