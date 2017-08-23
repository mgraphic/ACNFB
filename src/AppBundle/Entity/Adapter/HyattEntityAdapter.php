<?php

namespace AppBundle\Entity\Adapter;

use AppBundle\Entity\AdapterInterface;

final class HyattEntityAdapter implements AdapterInterface
{
	public function getIdFieldName()
	{
		return 'id';
	}

	public function getRoomNumberFieldName()
	{
		return 'room_number';
	}

	public function getDateFieldName()
	{
		return 'date';
	}

	public function getPriceFieldName()
	{
		return 'sold_price';
	}

	public function getRoomTypeFieldName()
	{
		return 'room_type';
	}

	public function getTableName()
	{
		return 'schema_name.hyatt_archive_table';
	}
}
