<?php

namespace AppBundle\Entity\Source;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="schema_name.hilton_archive_table")
 */
final class HiltonEntitySource
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=5)
	 */
	protected $roomNumber;
	
	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	protected $finalPrice;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date;
	
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $roomType;
	
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
		return $this->roomNumber;
	}

	/**
	 * @return float
	 */
	public function getFinalPrice()
	{
		return $this->finalPrice;
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
		return $this->roomType;
	}
}
