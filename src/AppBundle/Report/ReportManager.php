<?php

namespace AppBundle\Report;

final class ReportManager
{
	protected $resultArray;

	public function __construct(Array $results)
	{
		$this->resultArray = $results;
	}

	public function getReportData()
	{
		$prices = $types = [];

		foreach ($this->resultArray as $data)
		{
			$prices[] = $data['price'];
			$types[] = $data['type'];
		}

		return [
			'averagePrice' => $this->getAverage($prices),
			'sdPrice' => $this->getStandardDeviation($prices),
			'numberOfRoomsSold' => count($this->resultArray),
			'typesOfRoomsSold' => array_unique($types)
		];
	}

	protected function getAverage(Array $data)
	{
		return array_sum($data) / count($data);
	}

	protected function getStandardDeviation(Array $data)
	{
        $average = $this->getAverage($data);
        $carry = 0.0;

        foreach ($data as $value)
        {
            $d = ((float) $value) - $average;
            $carry += $d * $d;
        }

        return sqrt($carry / count($data));
	}
}
