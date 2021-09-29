<?php
/*
Plugin Name: WooCommerce-pdf-generator-pageart
Description:  Generating pdf for usb system shop
Author: Pageart TM
Version: 0.4.3
*/
//придумать как сделать  проценты
function add_style_pageart()
{
    wp_enqueue_style('generate-pdf', plugins_url('/view/css/table.css', __FILE__), false);
    wp_enqueue_script('changer', plugin_dir_url(__FILE__) . 'view/js/js.js', array('jquery'));
}


add_action('wp_enqueue_scripts', 'add_style_pageart');

function catalog($menu_links)
{
    $menu_links['catalogs'] = 'Catalogs';
    $menu_links = array_slice( $menu_links, 0, 5, true ) + array( 'catalogs' => 'Catalogs' ) + array_slice( $menu_links, 5, NULL, true );

    return $menu_links;
}

add_filter('woocommerce_account_menu_items', 'catalog', 5);


function page_add()
{

    add_rewrite_endpoint('catalogs', EP_PAGES);

}

add_action('init', 'page_add', 25);


function page_content()
{
    include 'view/catalog-page.php';
}


add_action('woocommerce_account_catalogs_endpoint', 'page_content', 25);


function get_pfd_template()
{
    plugins_url('/pdf-gen-pageart/view/view-pdf.php');
}

add_action('init', 'get_pfd_template');

//попытка  перебора  в сгенерированом pdf
function for_pdf_genetating_var($post_id)
{

    $new = new \PageartGEN\view\Child($post_id);
    $data = array();
    foreach ($new->getVariants($post_id) as $var):
        $data[] .= $var->label .'<br/>';
    endforeach;
    return implode(' ', $data);
}

//end this try
function for_pdf_genetating_qnt($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $data = array();
    foreach ($new->getMeta($post_id) as $var):
        $data[] .= $var .'<br/>';
    endforeach;
    return implode(' ', $data);

}

function for_pdf_genetating_p10($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData10 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 10):
                if ($_POST['usb'] != null):
                    $priceData10[] .= ($itemPrice->price / 100) + $_POST['usb'] . 'zl<br/>';
                else:
                    $priceData10[] .= $itemPrice->price / 100 .'zl<br/>';
                endif;
            endif;

        endforeach;
    endforeach;
    return implode(' ', $priceData10);
}

function for_pdf_genetating_p100($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData100 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 100):
                if ($_POST['usb'] != null):
                    $priceData100[] .= ($itemPrice->price / 100) + $_POST['usb'] . 'zl<br/>';
                else:
                    $priceData100[] .= $itemPrice->price / 100 . 'zl<br/>';
                endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData100);
}

function for_pdf_genetating_p500($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData500 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 500):
            if ($_POST['usb'] != null):
                $priceData500[] .= ($itemPrice->price / 100) + $_POST['usb'] . 'zl<br/>';
            else:
            $priceData500[] .= $itemPrice->price / 100 . 'zl<br/>';
            endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData500);
}

function for_pdf_genetating_p1000($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData1000 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 1000):
                if ($_POST['usb'] != null):
                    $priceData1000[] .= ($itemPrice->price / 100) + $_POST['usb'] . 'zl<br/>';
                else:
                    $priceData1000[] .= $itemPrice->price / 100 . 'zl<br/>';
                endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData1000);
}
function for_pdf_simple_getting_p10($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData10 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 10):
                    $priceData10[] .= $itemPrice->price / 100 . 'zl<br/>';
            endif;

        endforeach;
    endforeach;
    return implode(' ', $priceData10);
}

function for_pdf_simple_getting_p100($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData100 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 100):
                    $priceData100[] .= $itemPrice->price / 100 .'zl<br/>';
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData100);
}

function for_pdf_simple_getting_p500($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData500 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 500):
                    $priceData500[] .= $itemPrice->price / 100 . 'zl<br/>';
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData500);
}

function for_pdf_simple_getting_p1000($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData1000 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 1000):
                    $priceData1000[] .= $itemPrice->price / 100 . 'zl<br/>';
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData1000);
}

function for_pdf_genetating_procent_p10($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData10 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 10):
                if ($_POST['usb'] != null):
                    $priceData10[] .= ($itemPrice->price / 100) + (($itemPrice->price / 100) * $_POST['usb'] / 100 ).'zl<br/>';
                else:
                    $priceData10[] .= $itemPrice->price / 100 .'zl<br/>';
                endif;
            endif;

        endforeach;
    endforeach;
    return implode(' ', $priceData10);
}

function for_pdf_genetating_procent_p100($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData100 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 100):
                if ($_POST['usb'] != null):
                    $priceData100[] .= ($itemPrice->price / 100) + (($itemPrice->price / 100) * $_POST['usb'] /100 ). 'zl <br/>';
                else:
                    $priceData100[] .= $itemPrice->price / 100 . 'zl<br/>';
                endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData100);
}

function for_pdf_genetating_procent_p500($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData500 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 500):
                if ($_POST['usb'] != null):
                    $priceData500[] .= ($itemPrice->price / 100) + (($itemPrice->price / 100)* $_POST['usb'] /100 ).'zl<br/>';
                else:
                    $priceData500[] .= $itemPrice->price / 100 . 'zl<br/>';
                endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData500);
}

function for_pdf_genetating_procent_p1000($post_id)
{
    $new = new \PageartGEN\view\Child($post_id);
    $priceData1000 = array();
    foreach ($new->getPrices($post_id) as $prices):
        foreach ($prices->prices->listElements as $qnity => $itemPrice):
            if ($qnity == 1000):
                if ($_POST['usb'] != null):
                    $priceData1000[] .= ($itemPrice->price / 100) + (($itemPrice->price / 100)* $_POST['usb'] /100 ).'zl<br/>';
                else:
                    $priceData1000[] .= $itemPrice->price / 100 . 'zl<br/>';
                endif;
            endif;
        endforeach;
    endforeach;
    return implode(' ', $priceData1000);
}
