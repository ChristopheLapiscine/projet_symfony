<?php


namespace AppBundle\Entity;


class CoachSearch
{

    /*
     * @var string|null
     */
    private $city;

    /*
    * @var string|null
    */
    private $category;

    /*
    * @var string|null
    */
    private $sport;

    /*
    * @var int|null
    */
    private $price;

    /*
    * @var int|null
    */
    private $note;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return CoachSearch
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return CoachSearch
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
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
     * @return CoachSearch
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return CoachSearch
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return CoachSearch
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

}