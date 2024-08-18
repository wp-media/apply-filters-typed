#  Apply Filters Typed
Library for usage of WordPress filters in a typesafe way.

##  What problem does it solve?
  When using a filter with `apply_filters()`, there is currently no guarantee that the type of the final value (after all callbacks have been called) will match the type of the initial value for this filter.

This can cause unexpected errors in your code if you do some processing with this value later on, assuming the final value type is the same as the original one.

This library is a way to solve this problem, by introducing functions that are applying strict type checking.

It is also a a proof of concept for a WordPress change that has been proposed in this core ticket: https://core.trac.wordpress.org/ticket/51525.

## Limitation
If the end value type returned by the filter doesn't match the initial value type, the end value is discarded and the initial (default) one is returned. It's a limitation caused by the impossibility to access the internals of the hook system.

If the value is discarded, an error message will be added to the error.log when `WP_DEBUG` is enabled: `Return value of "hook_name" filter must be of the type "expected", "unexpected" returned.`

The patch proposed to core handles the situation better, discarding callbacks that return an unexpected type instead of discarding the final value.

##  Installation
You can install the library using composer:

`composer require wp-media/apply-filters-typed`

##  Usage
You have 2 functions available to replace the default `apply_filters()` function:

### `wpm_apply_filters_typesafe( $hook_name, $value, ...$args )`
This function takes the same parameters as the `apply_filters()` function. It will automatically determine the type to use for validation by checking the type of the `$value` parameter.

### `wpm_apply_filters_typed( $type, $hook_name, $value,  ...$args )`
This function takes as its first parameter the expected type of the value to be filtered, in addition to the usual parameters of the `apply_filters()` function.

In the context of WordPress, the common types would be:

- boolean
- integer
- double
- string
- array
- object 

##  Create your own type validation
If you have a need for more complex type validation of the value passed to the filter, for example in case of an array that should only have values with a specific type, you can use the dynamic filter `wpm_is_type_{$type}`, where `$type` would match with the `$type` value you pass to `wpm_apply_filters_typed()`.

Here is an example to do custom type validation on an array of strings:
 `wpm_apply_filters_typed( 'string[]', 'filter_this_array', $value );`
 
    add_filter( 'wpm_is_type_string[], function( $value ) {
        if ( ! is_array( $value ) ) {
            return false;
        }
 
        foreach ( $value as $val ) {
            if ( ! is_string( $val ) ) {
                return false;
            }
        }
 
	    return true;
    } );
