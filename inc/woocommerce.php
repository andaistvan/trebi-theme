<?php

add_theme_support('woocommerce');

// woocommerce breadcrump mods
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/*
   cusotom archive product actions
*/

/*
   cusotom  product actions
*/
add_action('woo_header_breadcrump', 'woocommerce_breadcrumb');
add_action('single_title', 'woocommerce_template_single_title');
add_action('single_excerpt', 'woocommerce_template_single_excerpt');
add_action('single_addtocart', 'woocommerce_template_single_add_to_cart');
add_action('single_price', 'woocommerce_template_single_price');

add_action('custom_addtocart', 'woocommerce_template_loop_add_to_cart');

// Display 30 products per page. Goes in functions.php
add_filter('loop_shop_per_page', create_function('$cols', 'return 30;'), 20);

add_action('woocommerce_before_main_content_wrapper', 'woocommerce_output_content_wrapper', 10);

function save_admin_field_order_meta($item_id, $values, $cart_item_key)
{
    if (isset($values['product_id'])) {
        /* "your_admin_field_name" that should be your admin fields name not the label.
         *  Also don't remove the "wccaf_" prefix from your custom fields key */
        $my_admin_field_val = get_post_meta($values['product_id'], 'wccaf_shippingdate', true);

        if ($my_admin_field_val && $my_admin_field_val != '') {
            wc_add_order_item_meta($item_id, 'Give a Label', $my_admin_field_val);
        }
    }
}

add_action('woocommerce_add_order_item_meta', 'save_admin_field_order_meta', 99, 3);

// field factory value
// $my_admin_product_cat_val = get_option('taxonomy_product_cat_'.'theweek'.'_wccaf_'.$shippingdate);

/*
   fields factory column on woocommerce admin
*/
//Add custom column into Product Page
add_filter('manage_edit-product_columns', 'my_columns_into_product_list');
function my_columns_into_product_list($defaults)
{
    $defaults['wccaf_shippingdate'] = 'Rendelési nap';

    return $defaults;
}

//Add rows value into Product Page
add_action('manage_product_posts_custom_column', 'my_custom_column_into_product_list', 10, 2);
function my_custom_column_into_product_list($column, $post_id)
{
    switch ($column) {
    case 'wccaf_shippingdate':
        echo get_post_meta($post_id, 'wccaf_shippingdate', true);
    break;
    }
}

// sorting column content
add_filter('manage_edit-product_sortable_columns', 'sortable_columns');

// Make these columns sortable
function sortable_columns()
{
    return array(
                'wccaf_shippingdate' => 'wccaf_shippingdate',
            );
}

add_action('pre_get_posts', 'event_column_orderby');
function event_column_orderby($query)
{
    if (!is_admin()) {
        return;
    }
    $orderby = $query->get('orderby');
    if ('wccaf_shippingdate' == $orderby) {
        $query->set('meta_key', 'wccaf_shippingdate');
        $query->set('orderby', 'meta_value');
    }
}

// remove product admin content editor
add_action('init', 'remove_content_editor');

function remove_content_editor()
{
    remove_post_type_support('product', 'editor');
}

// napok fordítása
// add_action('hu_days', 'change_day_name');
// function hu_days()
// {
//     $day = date('l');
//     switch ($day) {
//       case 'Monday':    $day = 'Hétfő';  break;
//       case 'Tuesday':   $day = 'Kedd'; break;
//       case 'Wednesday': $day = 'Szerda';  break;
//       case 'Thursday':  $day = 'Csötörtök'; break;
//       case 'Friday':    $day = 'Péntek';  break;
//       case 'Saturday':  $day = 'Szombat';  break;
//       case 'Sunday':    $day = 'Vasárnap';  break;
//       default:          $day = 'Unknown'; break;
//    }
// }

// unset factory sorting

// Customizes the WooCommerce product sorting options
// Available options are: menu_order, rating, date, popularity, price, price-desc
function custom_woocommerce_product_sorting($orderby)
{
    // The following removes the rating, date, and the popularity sorting options;
  // feel free to customize and enable/disable the options as needed.
  unset($orderby['rating']);
    unset($orderby['date']);
    unset($orderby['popularity']);

    return $orderby;
}
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_product_sorting', 20);

// **********************************************************
// cart settings
// **********************************************************

/*
 * Code should be placed in your theme functions.php file.
 */
add_filter('woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2);
function quantity_inputs_for_woocommerce_loop_add_to_cart_link($html, $product)
{
    if ($product && $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock() && !$product->is_sold_individually()) {
        $html = '<form action="
        '.esc_url($product->add_to_cart_url()).'"class="cart" method="post" enctype="multipart/form-data">';
        $html .= woocommerce_quantity_input(array(), $product, false);
        $html .= '<button type="submit" class="button alt">'.esc_html($product->add_to_cart_text()).'</button>';
        $html .= '</form>';
    }

    return $html;
}
// **********************************************************
// add to cart text mod
// **********************************************************

add_filter('woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text');    // 2.1 +

function woo_archive_custom_cart_button_text()
{
    return __('', 'woocommerce');
}
