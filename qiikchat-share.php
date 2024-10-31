<?php

/*
  Plugin Name: QiikChat - Send To Devices Button
  Description: Help your readers to keep your post at a hands by simplyfing the switch between screens. The the QiikChat sharebox allows visitors to easliy send your site link to any own device including mobiles and computers.
  Author: inout
  Version: 0.1
 */

defined('ABSPATH') or die();

class qiikchat_class {

    function __construct() {
        $this->pluginUrl = plugin_dir_url(__FILE__);
    }

    function enqueue_kiichat_scripts() {
        wp_enqueue_script('qiikchat-script', $this->pluginUrl . "qiikchat-script.js", array('jquery'), '1.0.0',true);
    }

    function enqueue_kiichat_styles() {
        wp_enqueue_style('qiikchat-style', $this->pluginUrl . "qiikchat-style.css", array(), '1.0.0');
    }

    function add_kiik_chat_sharer() {
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
        $kiik_chat_html = "<a target='_blank' rel='nofollow' href='https://qiikchat.com/sendtodevice/?linkurl=".$current_url."' id='qiikchat-a' class=''><div id='qiikchat-container' class='' style=''></div></a>";
        echo($kiik_chat_html);
    }

    function kiikchat_add_action() {
        add_action('wp_footer', array($this, 'add_kiik_chat_sharer'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_kiichat_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_kiichat_styles'));
        
    }
}

$qiikchat = new qiikchat_class();
$qiikchat->kiikchat_add_action();
