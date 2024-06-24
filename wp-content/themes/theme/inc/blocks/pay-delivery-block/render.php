<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$pay = get_field('pay');
$pay_icon = get_image($pay['icon'], [24, 24]);
$pay_title = $pay['title'];
$pay_text = $pay['text'];
$pay_images_title = $pay['images_title'];
$pay_images = $pay['images'];

$delivery = get_field('delivery');
$delivery_icon = get_image($delivery['icon'], [24, 24]);
$delivery_title = $delivery['title'];
$delivery_text = $delivery['text'];
$delivery_images_title = $delivery['images_title'];
$delivery_images = $delivery['images'];
?>
<div id="pay-delivery-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <div class="pay item">
        <?php if ($pay_icon) { ?>
            <div class="item__icon"><?= $pay_icon; ?></div>
        <?php } ?>

        <div class="item__content">
            <?php if ($pay_title) { ?>
                <h2 class="content__title"><?= $pay_title; ?></h2>
            <?php } ?>

            <?php if ($pay_text) { ?>
                <div class="p2 content__text"><?= $pay_text; ?></div>
            <?php } ?>
        </div>

        <?php if ($pay_images) { ?>
            <div class="item__images">
                <?php if ($pay_images_title) { ?>
                    <h3 class="images__title"><?= $pay_images_title; ?></h3>
                <?php } ?>

                <div class="images__wrapper">
                    <?php foreach ($pay_images as $item) {
                        $image = get_image($item, [60, 60]);
                        ?>
                        <?= $image; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="delivery item">
        <?php if ($delivery_icon) { ?>
            <div class="item__icon"><?= $delivery_icon; ?></div>
        <?php } ?>

        <div class="item__content">
            <?php if ($delivery_title) { ?>
                <h2 class="content__title"><?= $delivery_title; ?></h2>
            <?php } ?>

            <?php if ($delivery_text) { ?>
                <div class="p2 content__text"><?= $delivery_text; ?></div>
            <?php } ?>
        </div>

        <?php if ($delivery_images) { ?>
            <div class="item__images">
                <?php if ($delivery_images_title) { ?>
                    <h3 class="images__title"><?= $delivery_images_title; ?></h3>
                <?php } ?>

                <div class="images__wrapper">
                    <?php foreach ($delivery_images as $item) {
                        $image = get_image($item, [60, 60]);
                        ?>
                        <?= $image; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>