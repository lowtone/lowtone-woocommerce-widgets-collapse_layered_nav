<?php
/*
 * Plugin Name: Collapse Layered Nav
 * Plugin URI: http://wordpress.lowtone.nl/plugins/woocommerce-widgets-tax_filters/
 * Description: Use non-attribute taxonomies in layered nav.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */
/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\plugins\lowtone\woocommerce\widgets\tax_filters
 */

namespace lowtone\woocommerce\widgets\collapse_layered_nav {

	add_action("wp_enqueue_scripts", function() {
		$enqueue = apply_filters("lowtone_woocommerce_widgets_collapse_layered_nav_enqueue", is_active_widget(false, false, "woocommerce_layered_nav", true));

		if (!$enqueue)
			return;

		wp_enqueue_script("lowtone_woocommerce_widgets_collapse_layered_nav", plugins_url("/assets/scripts/collapse.js", __FILE__), array("jquery"));
		wp_localize_script("lowtone_woocommerce_widgets_collapse_layered_nav", "lowtone_woocommerce_widgets_collapse_layered_nav", array(
				"visible_items" => 15,
				"locales" => array(
					"show_text" => __("Show all {num_items} items", "lowtone_woocommerce_widgets_collapse_layered_nav"),
					"hide_text" => __("Hide {num_items} items", "lowtone_woocommerce_widgets_collapse_layered_nav"),
				)
			));
	});

}