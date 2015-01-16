<?php
/**
 * @package B3
 * @subpackage B3/API
 */

if (!defined('WPINC')) {
	die;
}

/**
 * Extends the default Post resource API.
 */
class B3_ACF_Options extends B3_API {

	/**
	 * Register new API routes for the Post resource.
	 *
	 * @param  array $routes API routes.
	 * @return array         Changed API routes.
	 */
	public function register_routes($routes) {

		$option_routes = array(
			'/b3_acf/options' => array(
				array(array($this, 'get_options'), WP_JSON_Server::READABLE),
			)
			// ,
			// '/B3_acf/options/(?P<slug>\w+)' => array(
			// 	array(array($this, 'get_options'), WP_JSON_Server::READABLE),
			// )
		);

		return array_merge($routes, $option_routes);
	}

	/**
	 * Retrieve all ACF options.
	 *
	 * @param  string         $context Context in which the post appears.
	 *
	 * @return array|WP_Error          Options entity, or error.
	 */
	public function get_options($context = 'view') {
		global $wp_json_posts;
		
		$option = get_fields('option', false);

		if (!$option) {
			return B3_JSON_REST_API::error('json_option_invalid_slug',
				__('Invalid option slug.', 'b3-rest-api'), 404);
		}

		return $option;
	}





	/**
	 * Retrieve all ACF options by slug.
	 *
	 * @param  string         $slug    Options slug.
	 * @param  string         $context Context in which the post appears.
	 *
	 * @return array|WP_Error          Options entity, or error.
	 */
	// public function get_options($slug, $context = 'view') {
	// 	global $wp_json_posts;

	// 	// if (empty($slug)) {
	// 	// 	return B3_JSON_REST_API::error('json_option_invalid_slug',
	// 	// 		__('Invalid option slug.'), 404);
	// 	// }
		
	// 	$option = get_fields('option', false);

	// 	if (!$option) {
	// 		return B3_JSON_REST_API::error('json_option_invalid_slug',
	// 			__('Invalid option slug.', 'b3-rest-api'), 404);
	// 	}

	// 	return $option;

	// 	// return $wp_json_posts->get_options($post->ID, $context);
	// }

}
