<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Type
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @var string
     */
    protected $title;

    public function __toString()
    {
        return $this->title;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title) : void
    {
        $this->title = $title;
    }
}
