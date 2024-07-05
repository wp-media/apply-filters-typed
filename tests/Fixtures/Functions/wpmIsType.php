<?php

return [
	'testIsBool' => [
		'boolean',
		true,
		true,
	],
	'testIsNotBool' => [
		'boolean',
		1,
		false,
	],
	'testIsInt' => [
		'integer',
		1,
		true,
	],
	'testIsNotInt' => [
		'integer',
		1.1,
		false,
	],
	'testIsFloat' => [
		'double',
		1.1,
		true,
	],
	'testIsNotFloat' => [
		'double',
		1,
		false,
	],
	'testIsString' => [
		'string',
		'1',
		true,
	],
	'testIsNotString' => [
		'string',
		1,
		false,
	],
	'testIsArray' => [
		'array',
		[],
		true,
	],
	'testIsNotArray' => [
		'array',
		1,
		false,
	],
	'testIsObject' => [
		'object',
		(object) [],
		true,
	],
	'testIsNotObject' => [
		'object',
		1,
		false,
	],
	'testIsResource' => [
		'resource',
		fopen( 'php://memory', 'r' ),
		true,
	],
	'testIsNotResource' => [
		'resource',
		1,
		false,
	],
	'testIsNull' => [
		'NULL',
		null,
		true,
	],
	'testIsNotNull' => [
		'NULL',
		1,
		false,
	],
	'testIsAbsInt' => [
		'absint',
		1,
		true,
	],
	'testIsNotAbsInt' => [
		'absint',
		1.1,
		false,
	],
];
