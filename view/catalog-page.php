<?php
require __DIR__ . '/class/Child.php';

?>
<form action="<?php echo plugins_url('/pdf-gen-pageart/view/view-pdf.php') ?>" method="post"  target="_blank" class="d-inline-flex justify-content-end w-100 top-b" >
    <div class="row">
        <div class="buttons">
            <button type="button" class="single_add_to_cart_button button alt" data-toggle="modal"
                    data-target="#settings"><?php _e('Your Price', 'pa-pdf-generator') ?></button>
            <button id="get"
                    class="single_add_to_cart_button button alt red"
                    type="submit"><?php _e('Generate PDF', 'pa-pdf-generator') ?></button>
        </div>
    </div>

    <?php include 'setting-price.php' ?>
</form>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php _e('model', 'pa-pdf-generator') ?></th>
            <th><?php _e('photo', 'pa-pdf-generator') ?></th>
            <th><?php _e('description', 'pa-pdf-generator') ?></th>
            <th><?php _e('Variants', 'pa-pdf-generator') ?></th>
            <th><?php _e('quantity', 'pa-pdf-generator') ?></th>
            <th><?php _e('Price 10', 'pa-pdf-generator') ?></th>
            <th><?php _e('Price 100', 'pa-pdf-generator') ?></th>
            <th><?php _e('Price 500', 'pa-pdf-generator') ?></th>
            <th><?php _e('Price 1000', 'pa-pdf-generator') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'terms' => 52,

                    //'field' => 'slug'
                )),
            'posts_per_page' => -1,
            'post_type' => 'product',
            'order' => 'DESC',
            'pa_katalog' => 'usb-stock'
        );
        $products = new WP_Query($args);
        $key = 1;
        while ($products->have_posts()) :
        $products->the_post();
        global $product, $post;
        $new = new PageartGEN\view\Child($post->ID);

        ?>
        <tr>
            <th scope="row">
                <?php echo $key++; ?>
            </th>
            <td><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></td>
            <td>
                <img class="img-fluid" src="<?php the_post_thumbnail_url() ?>"
                     alt="<?php the_title() ?>">
            </td>
            <td><?php the_excerpt() ?></td>

            <td class="variants">
                <?php foreach ($new->getVariants($post->ID) as $var): ?>
                    <p> <?php echo $var->label ?></p>
                <?php endforeach; ?>
            </td>
            <td><?php foreach ($new->getMeta($post->ID) as $quanity): ?>
                    <p class="aligncenter"><?php echo $quanity ?></p>
                <?php endforeach; ?></td>
            <td>
                <?php foreach ($new->getPrices($post->ID) as $prices): ?>
                    <?php foreach ($prices->prices->listElements as $qnity => $itemPrice): ?>
                        <?php if ($qnity == 10): ?>
                            <p><?php echo $itemPrice->price / 100 .'zl'?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($new->getPrices($post->ID) as $prices): ?>
                    <?php foreach ($prices->prices->listElements as $qnity => $itemPrice): ?>
                        <?php if ($qnity == 100): ?>
                            <p><?php echo $itemPrice->price / 100 .'zl'?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($new->getPrices($post->ID) as $prices): ?>
                    <?php foreach ($prices->prices->listElements as $qnity => $itemPrice): ?>
                        <?php if ($qnity == 500): ?>
                            <p><?php echo $itemPrice->price / 100 .'zl'?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($new->getPrices($post->ID) as $prices): ?>
                    <?php foreach ($prices->prices->listElements as $qnity => $itemPrice): ?>
                        <?php if ($qnity == 1000): ?>
                            <p><?php echo $itemPrice->price / 100 .'zl' ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
        </tr>

            <?php endwhile; ?>
        </tbody>
    </table>

