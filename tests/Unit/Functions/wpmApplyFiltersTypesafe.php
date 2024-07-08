<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use Brain\Monkey\Filters;
use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmApplyFiltersTypesafe extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $value, $filter_return, $expected ) {
		Filters\expectApplied( 'hook_name' )
			->once()
			->with( $value )
			->andReturn( $filter_return );

		$this->assertSame(
			$expected,
			wpm_apply_filters_typesafe( 'hook_name', $value )
		);
	}
}
