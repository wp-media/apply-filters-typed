<?php

/**
 * Calls the callback functions that have been added to a filter hook in a typesafe manner.
 *
 * @param string $hook_name The name of the filter hook.
 * @param mixed  $value     The value to filter.
 * @param mixed  ...$args   Additional parameters to pass to the callback functions.
 * @return mixed The filtered value after all hooked functions are applied to it.
 */
function wpm_apply_filters_typesafe( $hook_name, $value, ...$args ) {
	return wpm_apply_filters_typed( gettype( $value ), $hook_name, $value, ...$args );
}

/**
 * Calls the callback functions that have been added to a filter hook in a typed manner.
 *
 * @param string $type      The type the return value should have.
 * @param string $hook_name The name of the filter hook.
 * @param mixed  $value     The value to filter.
 * @param mixed  ...$args   Additional parameters to pass to the callback functions.
 * @return mixed The filtered value after all hooked functions are applied to it.
 */
function wpm_apply_filters_typed( $type, $hook_name, $value, ...$args ) {
	$next_value = apply_filters( $hook_name, $value, ...$args );

	if ( ! wpm_is_type( $type, $next_value ) ) {
		return $value;
	}

	return $next_value;
}

/**
 * Calls the callback functions that have been added to a filter hook and ensures
 * the returned value passes the custom guard filters.
 *
 * @param string $custom_guard_name The type the return value should have.
 * @param string $hook_name 		The name of the filter hook.
 * @param mixed  $value     		The value to filter.
 * @param mixed  ...$args   		Additional parameters to pass to the callback functions.
 * @return mixed The filtered value after all hooked functions are applied to it.
 */
function wpm_apply_filters_custom_guard( $custom_guard_name, $hook_name, $value, ...$args ) {
	$next_value = apply_filters( $hook_name, $value, ...$args );
	$custom_guard_hook = 'wpm_filter_guard_' . $custom_guard_name;
	if ( ! wpm_apply_filters_typesafe($custom_guard_hook, true, $next_value, ...$args ) ) {
		return $value;
	}

	return $next_value;
}

/**
 * Checks whether the given variable is a certain type.
 *
 * Returns whether `$value` is certain type.
 *
 * @since 1.0
 *
 * @param string $type  The type to check.
 * @param mixed  $value The variable to check.
 *
 * @return bool Whether the variable is of the type.
 */
function wpm_is_type( $type, $value ) {
	switch ( $type ) {
		case 'boolean':
			return is_bool( $value );
		case 'integer':
			return is_int( $value );
		case 'double':
			return is_float( $value );
		case 'string':
			return is_string( $value );
		case 'array':
			return is_array( $value );
		case 'object':
			return is_object( $value );
		case 'resource':
		case 'resource (closed)':
			return is_resource( $value );
		case 'NULL':
			return is_null( $value );
		case 'unknown_type':
			return false;
		case 'mixed':
			return true;
		default:
			return is_a( $value, $type ) || is_subclass_of( $value, $type );
	}
}
