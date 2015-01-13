<?php
/**
 * Plugin Name: Simplistic Nav Menus
 * Plugin URI: https://github.com/alexluke/wp-simplistic-nav-menus
 * Description: Use simple markup for navigation menus without any extra classes or ids.
 * Version: 1.0.0
 * Author: Alex Luke
 * License: GPL2
 */

/*  Copyright 2015 Alex Luke

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function snm_nav_menu_args($args = array()) {
  if ($args['container'])
    $args['container'] = 'nav';
  $args['container_class'] = $args['theme_location'];
  $args['menu_class'] = '';
  $args['items_wrap'] = '<ul>%3$s</ul>';
  return $args;
}
add_filter('wp_nav_menu_args', 'snm_nav_menu_args');

function snm_nav_menu_css_class($classes, $item) {
  $classes = array();
  if ($item->current)
    $classes[] = 'active';

  return $classes;
}
add_filter('nav_menu_css_class', 'snm_nav_menu_css_class', 10, 2);

function snm_nav_menu_item_id($id, $item, $args) {
  return null;
}
add_filter('nav_menu_item_id', 'snm_nav_menu_item_id', 10, 3);
