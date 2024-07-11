<?php

return [
	'testShouldReturnOriginalValueWhenFilterReturnsIncorrectType' => [
		'value' => true,
		'filter_return' => 'string',
		'expected' => true,
	],
	'testShouldReturnExpected' => [
		'value' => false,
		'filter_return' => true,
		'expected' => true,
	],
];
