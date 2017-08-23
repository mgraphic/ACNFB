<?php

namespace AppBundle\Entity;

interface AdapterInterface
{
	public function getIdFieldName();

	public function getRoomNumberFieldName();

	public function getDateFieldName();

	public function getPriceFieldName();

	public function getRoomTypeFieldName();

	public function getTableName();
}
