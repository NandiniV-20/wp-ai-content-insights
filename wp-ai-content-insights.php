<?php
/**
 * Plugin Name: WP AI Content Insights
 * Description: AI-powered content analysis plugin using NLP.
 * Version: 1.0
 */
if (!defined('ABSPATH')) exit;
define('WPAI_PATH', plugin_dir_path(__FILE__));
require_once WPAI_PATH . 'includes/class-db.php';
require_once WPAI_PATH . 'includes/class-api.php';
require_once WPAI_PATH . 'includes/class-hooks.php';
register_activation_hook(__FILE__, ['WPAI_DB', 'create_table']);
new WPAI_Hooks();
