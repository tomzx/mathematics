<?php

namespace tomzx\Mathematics\Structures;

use Countable;

// TODO: Immutable sequence where every statistics is calculated upfront
class Sequence implements Countable
{
	/**
	 * @var array
	 */
	protected $data;

	public function __construct(array $data = [])
	{
		$this->data = $data;
	}

	//	public function add($value)
	//	{
	//		// TODO: Implement add() method.
	//	}

	//	public function clear()
	//	{
	//		// TODO: Implement clear() method.
	//	}

	public function contains($value)
	{
		return in_array($value, $this->data);
	}

	//	public function remove($value)
	//	{
	//		// TODO: Implement remove() method.
	//	}

	public function getIterator()
	{
		return $this->data;
	}

	public function minimum()
	{
		return min($this->data);
	}

	public function maximum()
	{
		return max($this->data);
	}

	public function average()
	{
		$valueCount = $this->count();
		assert($valueCount > 0, 'Sequence must not be empty.');
		return $this->sum() / $valueCount;
	}

	public function mean()
	{
		return $this->average();
	}

	public function sum()
	{
		return array_sum($this->data);
	}

	public function median()
	{
		$valueCount = $this->count();
		assert($valueCount > 0, 'Sequence must not be empty.');
		$data = $this->data;
		sort($data);
		$isPairCount = ($valueCount & 1) === 0;
		$middleValueIndex = floor($valueCount / 2);
		return $isPairCount ? ($data[$middleValueIndex - 1] + $data[$middleValueIndex]) / 2 : $data[$middleValueIndex];
	}

	public function mode()
	{
		$valueCount = $this->count();
		assert($valueCount > 0, 'Sequence must not be empty.');
		$data = $this->data;
		sort($data);
		$mostCommonNumber = null;
		$mostCommonNumberCount = 0;
		$currentNumber = null;
		$currentNumberCount = 0;
		foreach ($data as $number) {
			if ($currentNumber !== $number) {
				$currentNumber = $number;
				$currentNumberCount = 1;
			} else {
				$currentNumberCount += 1;
			}

			if ($currentNumberCount >= $mostCommonNumberCount) {
				$mostCommonNumber = $currentNumber;
				$mostCommonNumberCount = $currentNumberCount;
			}
		}

		return $mostCommonNumber;
	}

	public function range()
	{
		if ($this->count() === 0) {
			return 0;
		}
		$minimum = INF;
		$maximum = -INF;
		foreach ($this->data as $number) {
			if ($number > $maximum) {
				$maximum = $number;
			}
			if ($number < $minimum) {
				$minimum = $number;
			}
		}
		return $maximum - $minimum;
	}

	public function variance()
	{
		$valueCount = $this->count();
		if ($valueCount === 0) {
			return 0;
		}

		$mean = $this->mean();
		$variance = 0;
		foreach ($this->data as $number) {
			$delta = $number - $mean;
			$variance += $delta * $delta;
		}
		return $variance / $valueCount;
	}

	public function standardDeviation()
	{
		return sqrt($this->variance());
	}

//	public function quartiles()
//	{
//		$valueCount = $this->count();
//		assert($valueCount > 0, 'Sequence must not be empty.');
//		$data = $this->data;
//		sort($data);
//
//		$firstQuartileIndex = floor(0.25 * $valueCount);
//		$secondQuartileIndex = floor(0.5 * $valueCount);
//		$secondQuartileUIndex = ceil(0.5 * $valueCount);
//		$thirdQuartileIndex = floor(0.75 * $valueCount);
//
//		$firstQuartile = new Sequence(array_slice($this->data, 0, $secondQuartileIndex));
//		$secondQuartile = new Sequence(array_slice($this->data, $firstQuartileIndex, $thirdQuartileIndex));
//		$thirdQuartile = new Sequence(array_slice($this->data, $secondQuartileUIndex));
//
//		return [
//			$firstQuartile->median(),
//			$secondQuartile->median(),
//			$thirdQuartile->median(),
//		];
//	}
//
//	public function interquartileRange()
//	{
//
//	}

	public function normalize()
	{
		$minimum = $this->minimum();
		$range = $this->range();
		return array_map(function($value) use ($minimum, $range) {
			return ($value - $minimum) / $range;
		}, $this->data);
	}

	public function count()
	{
		return count($this->data);
	}

	public function isEmpty()
	{
		return $this->count() === 0;
	}
}
