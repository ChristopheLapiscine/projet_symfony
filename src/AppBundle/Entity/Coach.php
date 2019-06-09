<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Coach
 *
 * @ORM\Table(name="coach")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoachRepository")
 * @Vich\Uploadable()
 */
class Coach
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="coach")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Sport", inversedBy="coach")
     */
    private $sport;

    /**
     * @ORM\OneToMany(targetEntity="Avis", mappedBy="coach")
     */
    public $avis;

    /**
     * @ORM\OneToMany(targetEntity="Messages", mappedBy="coach")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="coach")
     */
    private $reservation;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Vous ne pouvez pas mettre une valeur négative à {{ limit }}"
     * )
     */
    public $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(
     *     min = 40,
     *     max = 350,
     *     minMessage = "La description ne peut être en dessous de {{ limit }} caractère de longueur",
     *     maxMessage = "La description ne peut dépasser {{ limit }} caractère de longueur"
     * )
     */
    public $description;


    /**
     * @var File|null
     * @Assert\Image
     *     mimeTypes
     *
     * @Vich\UploadableField(mapping="coach_avatar", fileNameProperty="avatarName")
     */
    private $avatarFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatarName;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    public function __construct(){

        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Coach
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Coach
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * @param mixed $sport
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * @param mixed $avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;
    }

    /**
     * @return File|null
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    /**
     * @param File|null $avatarFile
     * @return Coach
     * @throws \Exception
     */
    public function setAvatarFile($avatarFile)
    {
        $this->avatarFile = $avatarFile;
        if ($this->avatarFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarName()
    {
        return $this->avatarName;
    }

    /**
     * @param string|null $avatarName
     * @return Coach
     */
    public function setAvatarName($avatarName)
    {
        $this->avatarName = $avatarName;
        return $this;
    }

}

