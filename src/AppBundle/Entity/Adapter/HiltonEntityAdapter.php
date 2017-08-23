<?php

namespace AppBundle\Entity\Adapter;

use AppBundle\Entity\AdapterInterface;

final class HiltonEntityAdapter implements AdapterInterface
{
	public function getIdFieldName()
	{
		return 'id';
	}

	public function getRoomNumberFieldName()
	{
		return 'roomNumber';
	}

	public function getDateFieldName()
	{
		return 'date';
	}

	public function getPriceFieldName()
	{
		return 'finalPrice';
	}

	public function getRoomTypeFieldName()
	{
		return 'roomType';
	}

	public function getTableName()
	{
		return 'schema_name.hilton_archive_table';
	}
}
