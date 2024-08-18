<?php

return [
	'testShouldReturnOriginalValueWhenFilterReturnsIncorrectType' => [
		'value' => true,
		'filter_return' => 'string',
		'warning' => true,
		'expected' => true,
	],
	'testShouldReturnExpected' => [
		'value' => false,
		'filter_return' => true,
		'warning' => false,
		'expected' => true,
	],
];
