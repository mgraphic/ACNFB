<?php

namespace AppBundle\Entity\Adapter;

use AppBundle\Entity\AdapterInterface;

final class MarriottEntityAdapter implements AdapterInterface
{
	public function getIdFieldName()
	{
		return 'id';
	}

	public function getRoomNumberFieldName()
	{
		return 'room';
	}

	public function getDateFieldName()
	{
		return 'date';
	}

	public function getPriceFieldName()
	{
		return 'price';
	}

	public function getRoomTypeFieldName()
	{
		return 'type';
	}

	public function getTableName()
	{
		return 'schema_name.marriott_archive_table';
	}
}
