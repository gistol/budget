<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\GreaterThan(0)
     * @var int
     */
    protected $price = 0;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     * @var Group
     */
    protected $group;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $description = '';

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

    public function getDate() : ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date) : void
    {
        $this->date = $date;
    }

    public function getGroup() : ?Group
    {
        return $this->group;
    }

    public function setGroup(Group $group) : void
    {
        $this->group = $group;
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
