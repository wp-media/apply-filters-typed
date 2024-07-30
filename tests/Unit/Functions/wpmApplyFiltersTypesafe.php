<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use Brain\Monkey\{Filters, Functions};
use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmApplyFiltersTypesafe extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $value, $filter_return, $warning, $expected ) {
		$this->stubEscapeFunctions();

		Filters\expectApplied( 'hook_name' )
			->once()
			->with( $value )
			->andReturn( $filter_return );
		
		if ( $warning ) {
			Functions\expect( '_doing_it_wrong' )
				->once();
		} else {
			Functions\expect( '_doing_it_wrong' )
				->never();
		}

		$this->assertSame(
			$expected,
			wpm_apply_filters_typesafe( 'hook_name', $value )
		);
	}
}
