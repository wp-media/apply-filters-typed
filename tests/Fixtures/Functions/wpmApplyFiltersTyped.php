<?php

return [
	'testShouldReturnOriginalValueWhenFilterReturnsIncorrectType' => [
		'type' => 'boolean',
		'value' => true,
		'filter_return' => 'string',
		'warning' => true,
		'expected' => true,
	],
	'testShouldReturnExpected' => [
		'type' => 'boolean',
		'value' => false,
		'filter_return' => true,
		'warning' => false,
		'expected' => true,
	],
	'testShouldReturnStringWhenUnionType' => [
		'type' => 'boolean|string',
		'value' => 'string',
		'filter_return' => 'string',
		'warning' => false,
		'expected' => 'string',
	],
	'testShouldReturnNullWhenUnionType' => [
		'type' => 'NULL|string',
		'value' => 'string',
		'filter_return' => null,
		'warning' => false,
		'expected' => null,
	],
	'testShouldReturnOriginalWhenUnionTypeNotMatched' => [
		'type' => 'NULL|string',
		'value' => 'string',
		'filter_return' => 0,
		'warning' => true,
		'expected' => 'string',
	],
	'testShouldReturnStringWhenNullable' => [
		'type' => '?string',
		'value' => 'string',
		'filter_return' => 'string',
		'warning' => false,
		'expected' => 'string',
	],
	'testShouldReturnNullWhenNullable' => [
		'type' => '?string',
		'value' => 'string',
		'filter_return' => null,
		'warning' => false,
		'expected' => null,
	],
];
