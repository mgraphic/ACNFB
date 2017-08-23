<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityManager;

final class Lookup
{
	protected $source;
	protected $adapter;
	protected $em;
	//protected $entity;

	public function __construct($useAdapter)
	{
		$this->source = $useAdapter;

		$this->adapter = $this->getEntityAdapter();

		$this->em = $this->getEntityManager();
	}

	public function getRoomsSoldByDateRange(\DateTime $from, \DateTime $to)
	{
		$queryBuilder = $this->em->createQueryBuilder();

		$queryBuilder
			->select($this->getSelectFields())
			->from($this->adapter->getTableName())
			->where($this->adapter->getDateFieldName() . " BETWEEN ? AND ?", $from->format('Y-m-d H:i:s'), $to->format('Y-m-d H:i:s'));

		return $queryBuilder->getQuery()->getArrayResult();
	}

	protected function getSelectFields()
	{
		$fields = [
			'id' => $this->adapter->getIdFieldName(),
			'room' => $this->adapter->getRoomNumberFieldName(),
			'date' => $this->adapter->getDateFieldName(),
			'price' => $this->adapter->getPriceFieldName(),
			'type' => $this->adapter->getRoomTypeFieldName()
		];

		$selectArray = [];

		foreach ($fields as $key => $value)
		{
			$selectArray[] = "`{$value}` AS $key";
		}

		return implode(", ", $selectArray);
	}

	protected function getEntityAdapter()
	{
		try
		{
			$class = "AppBundle\\Entity\\Adapter\\{$this->source}EntityAdapter";
			$adapter = new $class;
		}
		catch (Exception $e)
		{
			throw new Exception("Adapter for '{$this->source}' does not exist");
		}

		return $adapter;
	}

	protected function getEntityManager()
	{
		return new EntityManager;
	}
}
