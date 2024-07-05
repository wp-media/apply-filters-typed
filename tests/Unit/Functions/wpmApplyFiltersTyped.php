<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmApplyFiltersTyped extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $type, $value, $expected ) {
		$this->assertSame(
			$expected,
			wpm_apply_filters_typed( $type, 'hook_name', $value )
		);
	}
}
