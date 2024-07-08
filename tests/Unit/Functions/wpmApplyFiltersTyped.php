<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use Brain\Monkey\Filters;
use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmApplyFiltersTyped extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $type, $value, $filter_return, $expected ) {
		Filters\expectApplied( 'hook_name' )
			->once()
			->with( $value )
			->andReturn( $filter_return );

		$this->assertSame(
			$expected,
			wpm_apply_filters_typed( $type, 'hook_name', $value )
		);
	}
}
