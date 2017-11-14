<?php
/**
 * Created by PhpStorm.
 * User: WalterWiesnekker
 * Date: 13-Nov-17
 * Time: 22:07
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceAverage;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceLow;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceHigh;

    /**
     * @ORM\Column(type="boolean")
     */
    private $member;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPriceAverage()
    {
        return $this->priceAverage;
    }

    /**
     * @param mixed $priceAverage
     */
    public function setPriceAverage($priceAverage)
    {
        $this->priceAverage = $priceAverage;
    }

    /**
     * @return mixed
     */
    public function getPriceLow()
    {
        return $this->priceLow;
    }

    /**
     * @param mixed $priceLow
     */
    public function setPriceLow($priceLow)
    {
        $this->priceLow = $priceLow;
    }

    /**
     * @return mixed
     */
    public function getPriceHigh()
    {
        return $this->priceHigh;
    }

    /**
     * @param mixed $priceHigh
     */
    public function setPriceHigh($priceHigh)
    {
        $this->priceHigh = $priceHigh;
    }

    /**
     * @return mixed
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member)
    {
        $this->member = $member;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}