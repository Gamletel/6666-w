<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$text = get_field('text');
$btn = get_field('btn');
$btn_text = $btn['text'];
$btn_link = $btn['link'];
$additional = get_field('additional');
$additional_icon = get_image($additional['icon'], [52, 52]);
$additional_text = $additional['text'];
$image = wp_get_attachment_image_url(get_field('image'), 'full');
$advantages = get_field('advantages');
?>
<?php if ($text) { ?>
    <div id="about-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <div class="block__wrapper">
            <?php if ($image) { ?>
                <div class="block__image">
                    <?php if ($additional_text) {
                        ?>
                        <div class="additional">
                            <?php if ($additional_icon) { ?>
                                <div class="additional__icon">
                                    <?= $additional_icon; ?>
                                </div>
                            <?php } ?>

                            <?php if ($additional_text) { ?>
                                <h3 class="additional__text"><?= $additional_text; ?></h3>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <img src="<?= $image; ?>" alt="" class="image">
                </div>
            <?php } ?>

            <div class="block__content">
                <?php if ($block_title) { ?>
                    <h2 class="block__title"><?= $block_title; ?></h2>
                <?php } ?>

                <div class="block__text text-block">
                    <?= $text; ?>
                </div>

                <?php if ($btn_text && $btn_link) { ?>
                    <a href="<?= $btn_link; ?>" class="block__btn btn"><?= $btn_text; ?></a>
                <?php } ?>
            </div>
        </div>

        <?php if (!empty($advantages)) { ?>
            <div class="advantages">
                <?php foreach ($advantages as $advantage) {
                    $icon = get_image($advantage['icon'], [52, 52]);
                    $text = $advantage['text'];
                    ?>
                    <div class="advantage">
                        <?php if ($icon) { ?>
                            <div class="advantage__icon">
                                <?= $icon; ?>
                            </div>
                        <?php } ?>

                        <?php if ($text) { ?>
                            <h6 class="advantage__text"><?= $text; ?></h6>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>