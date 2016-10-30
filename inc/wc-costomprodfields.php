<?php
/**
 * WooCommerce product data tab definition.
 *
 * @return array
 */
// add_action('wc_cpdf_init', 'prefix_custom_product_data_tab_init', 10, 0);
// if (!function_exists('prefix_custom_product_data_tab_init')) :
//
//    function prefix_custom_product_data_tab_init()
//    {
//        $custom_product_data_fields = array();

     /* First product data tab starts **/
     /* ===================================== */

   //   $custom_product_data_fields['custom_data_1'] = array(
     //
   //     array(
   //           'tab_name' => __('Custom Data', 'wc_cpdf'),
   //     ),
     //
   //     array(
   //           'id' => '_mycheckbox',
   //           'type' => 'checkbox',
   //           'label' => __('Checkbox', 'wc_cpdf'),
   //           'description' => __('Field description.', 'wc_cpdf'),
   //           'desc_tip' => true,
   //     ),
     //
   //     array(
   //           'id' => '_myradio',
   //           'type' => 'radio',
   //           'label' => __('Radio', 'wc_cpdf'),
   //           'options' => array(
   //                 'radio_1' => 'Radio 1',
   //                 'radio_2' => 'Radio 2',
   //                 'radio_3' => 'Radio 3',
   //           ),
   //           'description' => __('Field description.', 'wc_cpdf'),
   //           'desc_tip' => true,
   //     ),
     //
   //     array(
   //           'id' => '_myhidden',
   //           'type' => 'hidden',
   //           'value' => 'Hidden Value',
   //     ),

       // Datepicker

   //     array(
   //           'id' => '_mydatepicker',
   //           'type' => 'datepicker',
   //           'label' => __('Select date', 'wc_cpdf'),
   //           'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
   //           'class' => 'large',
   //           'description' => __('Field description.', 'wc_cpdf'),
   //           'desc_tip' => true,
   //     ),
     //
   //     array(
   //           'type' => 'divider',
   //     ),
     //
   //   );

     /* First product data tab ends **/
     /* ===================================== */

//      return $custom_product_data_fields;
//    }
//
// endif;

/*
 * add fields to general tab
 *
 */
 // Display Fields
 add_action('woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields');

 // Save Fields
 add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save');

 function woo_add_custom_general_fields()
 {
     global $woocommerce, $post;

     echo '<div class="options_group">';

   // Custom fields will be created here...
   woocommerce_wp_text_input(
    array(
        'id' => '_number_field',
        'label' => __('My Number Field', 'woocommerce'),
        'placeholder' => '',
        'description' => __('Enter the custom value here.', 'woocommerce'),
        'type' => 'number',
        'custom_attributes' => array(
                'step' => 'any',
                'min' => '0',
            ),
    )
   );
     echo '</div>';
 }
