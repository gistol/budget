<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="type")
 */
class Group
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
    protected $title = '';

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @var string
     */
    protected $icon = '';

    public function __toString()
    {
        return $this->title;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getIcon() : string
    {
        return $this->icon;
    }

    public function setIcon(string $icon) : void
    {
        $this->icon = $icon;
    }
}
