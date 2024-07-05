<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Unit\Functions;

use WPMedia\ApplyFiltersTyped\Tests\Unit\TestCase;

class TestWpmIsType extends TestCase {
	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $type, $value, $expected ) {
		$this->assertSame(
			$expected,
			wpm_is_type( $type, $value )
		);
	}
}
