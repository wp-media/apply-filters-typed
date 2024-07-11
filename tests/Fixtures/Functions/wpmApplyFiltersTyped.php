<?php

return [
	'testShouldReturnOriginalValueWhenFilterReturnsIncorrectType' => [
		'type' => 'boolean',
		'value' => true,
		'filter_return' => 'string',
		'expected' => true,
	],
	'testShouldReturnExpected' => [
		'type' => 'boolean',
		'value' => false,
		'filter_return' => true,
		'expected' => true,
	],
];
