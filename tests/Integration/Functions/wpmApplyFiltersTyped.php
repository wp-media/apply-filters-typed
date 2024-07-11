<?php

declare(strict_types=1);

namespace WPMedia\ApplyFiltersTyped\Tests\Integration\Functions;

use WPMedia\ApplyFiltersTyped\Tests\Integration\TestCase;

class TestWpmApplyFiltersTyped extends TestCase {
	private $filter_value;

	public function tear_down() {
		remove_filter( 'hook_name', [ $this, 'return_filter_value' ] );

		parent::tear_down();
	}

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $type, $value, $filter_return, $expected ) {
		$this->filter_value = $filter_return;

		add_filter( 'hook_name', [ $this, 'return_filter_value' ] );

		$this->assertSame(
			$expected,
			wpm_apply_filters_typed( $type, 'hook_name', $value )
		);
	}

	public function return_filter_value() {
		return $this->filter_value;
	}
}
