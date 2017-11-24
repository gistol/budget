<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Item
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $price = 0;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(nullable=false)
     * @var Type
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $description = '';

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getPrice() : int
    {
        return $this->price;
    }

    public function setPrice(int $price) : void
    {
        $this->price = $price;
    }

    public function getDate() : \DateTime
    {
        return $this->date;
    }

//    public function setDate(\DateTime $date) : void
//    {
//        $this->date = $date;
//    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type) : void
    {
        $this->type = $type;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
}
