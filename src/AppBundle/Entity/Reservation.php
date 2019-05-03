<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @ORM\ManyToOne(targetEntity="Coach", inversedBy="reservation")
     */
    private $coach;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="reservation")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="reservation")
     */
    private $status;

    /**
     * @return mixed
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * @param mixed $coach
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="courseDate", type="datetime")
     */
    private $courseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

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
     * Set courseDate
     *
     * @param \DateTime $courseDate
     *
     * @return Reservation
     */
    public function setCourseDate($courseDate)
    {
        $this->courseDate = $courseDate;

        return $this;
    }

    /**
     * Get courseDate
     *
     * @return \DateTime
     */
    public function getCourseDate()
    {
        return $this->courseDate;
    }
}

