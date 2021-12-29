<?php

/*
  Plugin Name: Are You Experienced Quiz
  Description: Give your readers a multiple choice question.
  Version: 1.0
  Author: Roope
  Author URI: https://roope.carrd.co
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AreYouExperienced {
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets() {
    wp_register_style('quizeditcss', plugin_dir_url(__FILE__) . 'build/index.css');
    wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
    register_block_type('ourplugin/are-you-experienced', array(
      'editor_script' => 'ournewblocktype',
      'editor_style' => 'quizeditcss',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    return '<p>Today the sky is completely ' . $attributes['skyColor'] . ' and the grass is  ' . $attributes['grassColor'] . '!!!</p>';
  }
}

$areYouExperienced = new AreYouExperienced();