<?php

namespace AppBundle\Entity\Source;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="schema_name.marriott_archive_table")
 */
final class MarriottEntitySource
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $room;
	
	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	protected $price;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date;
	
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $type;
	
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
	public function getRoom()
	{
		return $this->room;
	}

	/**
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
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
	public function getType()
	{
		return $this->type;
	}
}
