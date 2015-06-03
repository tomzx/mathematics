<?php

namespace tomzx\Mathematics\Tests\Statistics\Correlation;

use tomzx\Mathematics\Statistics\Correlation\Pearson;

class PearsonTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider calculateProvider
	 */
	public function testCalculate($sequenceA, $sequenceB, $coefficient)
	{
		$pearson = new Pearson();
		$actual = $pearson->calculate($sequenceA, $sequenceB);
		if (is_nan($coefficient)) {
			$this->assertTrue(is_nan($actual));
		} else {
			$this->assertSame($coefficient, $actual);
		}
	}

	public function calculateProvider()
	{
		return [
			[[1, 2, 3], [1, 2, 3], 1.0],
			[[1, 2, 3], [3, 2, 1], -1.0],
			[[1, 2, 3], [10, 20, 30], 1.0],
			[[0, 0, 0], [0, 0, 0], NAN],
			[[0, 10, 101, 102], [1, 100, 500, 2000], 0.75442370834542472],
		];
	}
}
