<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmApplyFiltersTypesafe extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $value, $expected ) {
		$this->assertSame(
			$expected,
			wpm_apply_filters_typesafe( 'hook_name', $value )
		);
	}
}
