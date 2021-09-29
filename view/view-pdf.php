<?php
require __DIR__ . '/../vendor/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
require __DIR__ . '/class/Child.php';
$current_user = wp_get_current_user();
//arguments for converted posts
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

//$array = get_table_content();
//get content  for  generating  pdf files
if($_POST['company'] == null):
$html = 'Generated catalog USB System ' . date("d.m.y") . __('special for: ') . $current_user->display_name;
else:
    $html = 'Generated catalog USB System ' . date("d.m.y") . __('special for: ') . $_POST['company'] ;
endif;
$html .= '<p>' . get_custom_logo() . '</p>';
if($_POST['gen-qnt'] == 10):
    $html .= '
<table>
        <thead>
<tr>
            <th>#</th>

            <th style="border-bottom:1px solid #000000">' . __('model', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('photo', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('description', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('quantity', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Variants', 'pa-pdf-generator') . ' </th>         
            <th style="border-bottom:1px solid #000000">' . __('Price 10', 'pa-pdf-generator') . ' </th>
        </tr>
        </thead>
';
endif;
if($_POST['gen-qnt'] == 100):
    $html .= '
<table>
        <thead>
<tr>
            <th>#</th>

            <th style="border-bottom:1px solid #000000">' . __('model', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('photo', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('description', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('quantity', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Variants', 'pa-pdf-generator') . ' </th>         
            <th style="border-bottom:1px solid #000000">' . __('Price 100', 'pa-pdf-generator') . ' </th>
        </tr>
        </thead>
';
endif;
if($_POST['gen-qnt'] == 'all'):
    $html .= '
<table>
        <thead>
<tr>
            <th>#</th>

            <th style="border-bottom:1px solid #000000">' . __('model', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('photo', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('description', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('quantity', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Variants', 'pa-pdf-generator') . ' </th>         
            <th style="border-bottom:1px solid #000000">' . __('Price 10', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Price 100', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Price 500', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Price 1000', 'pa-pdf-generator') . ' </th>
        </tr>
        </thead>
';
endif;

if($_POST['gen-qnt'] == 500):
    $html .= '
<table>
        <thead>
<tr>
            <th>#</th>

            <th style="border-bottom:1px solid #000000">' . __('model', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('photo', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('description', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('quantity', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Variants', 'pa-pdf-generator') . ' </th>         
            <th style="border-bottom:1px solid #000000">' . __('Price 500', 'pa-pdf-generator') . ' </th>
        </tr>
        </thead>
';
endif;
if($_POST['gen-qnt'] == 1000):
    $html .= '
<table>
        <thead>
<tr>
            <th>#</th>

            <th style="border-bottom:1px solid #000000">' . __('model', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('photo', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('description', 'pa-pdf-generator') . '</th>
            <th style="border-bottom:1px solid #000000">' . __('quantity', 'pa-pdf-generator') . ' </th>
            <th style="border-bottom:1px solid #000000">' . __('Variants', 'pa-pdf-generator') . ' </th>         
            <th style="border-bottom:1px solid #000000">' . __('Price 1000', 'pa-pdf-generator') . ' </th>
        </tr>
        </thead>
';
endif;

if ($_POST['money'] == 'fix')
    while ($products->have_posts()) : $products->the_post();
        global $product, $post;
        if ($_POST['gen-qnt'] == 10):
            $html .= '
        <tr >
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 10 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p10($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 100):
            $html .= '
        <tr>
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 100 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p100($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 500):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 500 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p500($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 1000):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 1000 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p1000($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 'all'):
            $html .= '
        <tr>
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . for_pdf_genetating_qnt($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p10($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p100($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p500($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_p1000($post->ID) . '</td>
        ';
        endif;
    endwhile;
elseif ($_POST['money'] == 'proc')
    while ($products->have_posts()) : $products->the_post();
        global $product, $post;
        if ($_POST['gen-qnt'] == 10):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th  style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . 10 . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p10($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 100):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 100 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p100($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 500):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th  style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px">' . 500 . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td  style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p500($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 1000):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . 1000 . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' .for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p1000($post->ID) . '</td>
        ';
        endif;
        if ($_POST['gen-qnt'] == 'all'):
            $html .= '
        <tr style="margin:5px 0 5px 0">
        <th style="border-bottom:1px solid #000000; font-size: 12px">' . $key++ . '</th>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_title() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px"><img width="100px" src="' . get_the_post_thumbnail_url() . '" /></td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . get_the_excerpt() . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px">' . for_pdf_genetating_qnt($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;" width="100px">' . for_pdf_genetating_var($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p10($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p100($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p500($post->ID) . '</td>
        <td style="border-bottom:1px solid #000000; font-size: 12px;background-color:#ccc;border-bottom: solid 1px #000000;">' . for_pdf_genetating_procent_p1000($post->ID) . '</td>
        ';
        endif;
    endwhile;


$html .= '</tr>';
$html .= '</table>';

$mpdf = new Mpdf\Mpdf([
    //'mode' => 'utf-8',
    //'format' => 'A4-P',
    //'orientation' => 'P'
    //looking  more great
    'format' => 'A4-L',
    'orientation' => 'L'
]);

$mpdf->WriteHTML($html);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;


$mpdf->Output('usb-systems-calog-generated.pdf', "I");