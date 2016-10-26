<?php

add_theme_support('woocommerce');

// woocommerce breadcrump mods
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/*
   cusotom archive product actions
*/

/*
   cusotom single product actions
*/
add_action('woo_header_breadcrump', 'woocommerce_breadcrumb');
add_action('single_title', 'woocommerce_template_single_title');
add_action('single_excerpt', 'woocommerce_template_single_excerpt');
add_action('single_addtocart', 'woocommerce_template_single_add_to_cart');
add_action('single_price', 'woocommerce_template_single_price');

// archive-product - link off
// if (is_product_category('foodtype')) {
//     remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
//     remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// }

// Display 30 products per page. Goes in functions.php
add_filter('loop_shop_per_page', create_function('$cols', 'return 30;'), 20);

// Display all products per page. Goes in functions.php
// if (isset($_GET['showall'])) {
//     add_filter('loop_shop_per_page', create_function('$cols', 'return -1;'));
// } else {
//     add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'));
// }

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
 * add to cart + quantity input.
 */
// add_filter('woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2);
// function quantity_inputs_for_woocommerce_loop_add_to_cart_link($html, $product)
// {
//     if ($product && $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock() && !$product->is_sold_individually()) {
//         $html = '<form action="'.esc_url($product->add_to_cart_url()).'" class="cart" method="post" enctype="multipart/form-data">';
//         $html .= woocommerce_quantity_input(array(), $product, false);
//         $html .= '<button type="submit" class="button alt">'.esc_html($product->add_to_cart_text()).'</button>';
//         $html .= '</form>';
//     }
//
//     return $html;
// }

add_action('woocommerce_after_shop_loop_item', 'my_custom_quantity_field', 6);
function my_custom_quantity_field()
{
    global $product;
    if (!$product->is_sold_individually()) {
        woocommerce_quantity_input(array(
      'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
      'max_value' => apply_filters('woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product),
    ));
    }
}

// Removes Product Successfully Added to Cart
// add_filter('wc_add_to_cart_message', 'bbloomer_custom_add_to_cart_message');
//
// function bbloomer_custom_add_to_cart_message()
// {
//     echo '<style>.woocommerce-message {display: none !important;}</style>';
// }

/*
   fields factory column on woocommerce admin
*/
