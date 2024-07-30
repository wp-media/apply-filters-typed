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
];
