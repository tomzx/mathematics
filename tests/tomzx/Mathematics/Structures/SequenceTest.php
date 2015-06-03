<?php

namespace tomzx\Mathematics\Tests;

use tomzx\Mathematics\Structures\Sequence;

class SequenceTest extends \PHPUnit_Framework_TestCase {

	public function testContains()
	{
		$sequence = new Sequence([2, 1, 3]);
		$this->assertTrue($sequence->contains(3));
		$this->assertFalse($sequence->contains(0));
	}

	public function testMinimum()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->minimum();
		$this->assertSame(1, $actual);
	}

//	public function testMinimumWithoutValues()
//	{
//		$sequence = new Sequence();
//		$sequence->minimum();
//	}

	public function testMaximum()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->maximum();
		$this->assertSame(3, $actual);
	}

//	public function testMaximumWithoutValues()
//	{
//		$sequence = new Sequence();
//		$sequence->maximum();
//	}

	public function testAverage()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->average();
		$this->assertSame(2, $actual);
	}

	public function testSum()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->sum();
		$this->assertSame(6, $actual);
	}

	public function testMedian()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->median();
		$this->assertSame(2, $actual);

		$sequence = new Sequence([2, 1, 3, 4]);
		$actual = $sequence->median();
		$this->assertSame(2.5, $actual);
	}

//	public function testMedianWithoutValues()
//	{
//		$sequence = new Sequence([]);
//		$actual = $sequence->median();
//		$this->assertSame(2.5, $actual);
//	}

	public function testMode()
	{
		$sequence = new Sequence([2]);
		$actual = $sequence->mode();
		$this->assertSame(2, $actual);

		$sequence = new Sequence([2, 1, 3, 1, 3, 1]);
		$actual = $sequence->mode();
		$this->assertSame(1, $actual);
	}

//	public function testMedianWithoutValues()
//	{
//		$sequence = new Sequence([]);
//		$actual = $sequence->mode();
//		$this->assertSame(2.5, $actual);
//	}

	public function testRange()
	{
		$sequence = new Sequence([2, 1, 3, 6]);
		$actual = $sequence->range();
		$this->assertSame(5, $actual);
	}

	public function testRangeWithoutValues()
	{
		$sequence = new Sequence();
		$actual = $sequence->range();
		$this->assertSame(0, $actual);
	}

	public function testVariance()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->variance();
		$this->assertSame(2/3, $actual);
	}

	public function testVarianceWithoutValues()
	{
		$sequence = new Sequence();
		$actual = $sequence->variance();
		$this->assertSame(0, $actual);
	}

	public function testStandardDeviation()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->standardDeviation();
		$this->assertSame(sqrt(2/3), $actual);
	}

	public function testStandardDeviationWithoutValues()
	{
		$sequence = new Sequence();
		$actual = $sequence->standardDeviation();
		$this->assertSame(0.0, $actual);
	}

//	public function testQuartiles()
//	{
//		$sequence = new Sequence([1, 2, 3, 4, 5]);
//		$actual = $sequence->quartiles();
//		$this->assertSame([1.5, 3, 4.5], $actual);
//
//		$sequence = new Sequence([6, 7, 15, 36, 39, 40, 41, 42, 43, 47, 49]);
//		$actual = $sequence->quartiles();
//		$this->assertSame([20.25, 40, 42.75], $actual);
//	}

	public function testNormalize()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->normalize();
		$this->assertSame([1/2, 0, 1], $actual);
	}

	public function testCount()
	{
		$sequence = new Sequence([2, 1, 3]);
		$actual = $sequence->maximum();
		$this->assertSame(3, $actual);
	}

	public function testIsEmpty()
	{
		$sequence = new Sequence();
		$this->assertTrue($sequence->isEmpty());

		$sequence = new Sequence([2]);
		$this->assertFalse($sequence->isEmpty());
	}
}
