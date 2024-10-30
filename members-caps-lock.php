<?php
/**
 * Plugin Name: Members: Caps Lock
 * Description: Adds registered CPT & custom taxonomy capabilities to Members plugin capabilities list
 * Author: UaMV
 * Author URI: http://vandercar.net
 * Version: 1.0
 * License: GPL2+
 */

// add caps to members plugin list
function capslock_add_capabilities( $capabilities ) {

	// get CPTs as objects
	$post_types = get_post_types( array( '_builtin' => FALSE ), 'objects' );

	foreach ( $post_types as $post_type => $post_type_object ) {

		// push each CPT capability to members capabilities
		foreach ( $post_type_object->cap as $meta_cap => $cap ) {
			$capabilities[] = $cap;
		}

	}

	// get custom taxonomies as objects
	$taxonomies = get_taxonomies( array( '_builtin' => FALSE ), 'objects' );

	foreach ( $taxonomies as $taxonomy => $taxonomy_object ) {

		// push each CPT capability to members capabilities
		foreach ( $taxonomy_object->cap as $meta_cap => $cap ) {
			$capabilities[] = $cap;
		}
		
	}

	return $capabilities;

}
add_filter( 'members_get_capabilities', 'capslock_add_capabilities' );