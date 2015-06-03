<?php

namespace tomzx\Mathematics\Statistics\Correlation;

class Pearson
{
	public function calculate(array $sequenceA, array $sequenceB){
		$sizeA = count($sequenceA);
		$sizeB = count($sequenceB);
		if ($sizeA === 0 || $sizeB === 0 || $sizeA !== $sizeB) {
			throw InvalidArgumentException();
		}
		$averageA = array_sum($sequenceA) / $sizeA;
		$averageB = array_sum($sequenceB) / $sizeB;

		$numerator = 0;
		for ($i = 0; $i < $sizeA; ++$i) {
			$numerator += ($sequenceA[$i] - $averageA) * ($sequenceB[$i] - $averageB);
		}

		$x = 0;
		for ($i = 0; $i < $sizeA; ++$i) {
			$value = $sequenceA[$i] - $averageA;
			$x += $value * $value;
		}

		$y = 0;
		for ($i = 0; $i < $sizeB; ++$i) {
			$value = $sequenceB[$i] - $averageB;
			$y += $value * $value;
		}

		return in_array(0, [$x, $y]) ? NAN : $numerator / (sqrt($x) * sqrt($y));
	}
}
