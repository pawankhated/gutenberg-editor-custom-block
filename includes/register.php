<?php
if (function_exists( 'acf_register_block_type' )) {

    function cwp_load_blocks() {
      // Block: Slider
      register_block_type(dirname(__FILE__).'/blocks/slider/block.json' );
      wp_register_style( 'block-slider', get_stylesheet_directory_uri().'/includes/blocks/slider/slider.css' );
      wp_register_script( 'block-slider', get_stylesheet_directory_uri().'/includes/blocks/slider/slider.js', [ 'jquery', 'acf' ] );

    }
    add_action( 'init', 'cwp_load_blocks' );

}
