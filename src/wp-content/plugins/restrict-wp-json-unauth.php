<?php
/**
 * Plugin Name: Отключает wp json для анонимных
 */

// код плагина

add_filter( 'rest_pre_dispatch', 'close_rest_api_routes', 10, 3 );

/**
 * Close REST API routes from public access.
 *
 * @param WP_REST_Response|WP_Error|null $result
 * @param WP_REST_Server                 $rest_server
 * @param WP_REST_Request                $request
 *
 * @return WP_Error
 */
function close_rest_api_routes( $result, $rest_server, $request ){

	// maybe authentication error already set
	if( ! is_null( $result ) ){
		return $result;
	}

	if(
		// only for `/wp/v2` namespace
		'/wp/v2' === substr( $request->get_route(), 0, 6 )
		// Administrator
		&& ! current_user_can( 'manage_options' )
	){
		return new WP_Error( 'rest_not_logged_in', 'Your capability is low.', [ 'status' => 401 ] );
	}

	return $result;
}