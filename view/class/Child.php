<?php


namespace PageartGEN\view;

use PageartWPE\Models\Product;

class Child extends Product
{
    public function __construct(int $productId)
    {
        parent::__construct($productId);
    }

    public function GetMeta($post_id)
    {
        $metaObj = get_post_meta($post_id, '_pa_configurator_product', true);
        return (array) $metaObj->validQuantities;
    }
    public function getVariants($post_id)
    {
        $metaObj = get_post_meta($post_id, '_pa_configurator_product', true);
        return $metaObj->capacities;
    }
    public function getPrices($post_id)
    {
        $metaObj = get_post_meta($post_id, '_pa_configurator_product', true);
        return $metaObj->capacities;
    }



}