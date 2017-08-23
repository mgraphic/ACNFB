<?php

namespace AppBundle\Entity\Source;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="schema_name.hyatt_archive_table")
 */
final class HyattEntitySource
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $room_number;
	
	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	protected $sold_price;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date;
	
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $room_type;
	
	/**
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return integer
	 */
	public function getRoomNumber()
	{
		return $this->room_number;
	}

	/**
	 * @return float
	 */
	public function getSoldPrice()
	{
		return $this->sold_price;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}
	
	/**
	 * @return string
	 */
	public function getRoomType()
	{
		return $this->room_type;
	}
}
