<?php

namespace CheminDuSon\SiteBundle\Form\Model;

class ConcertModel
{
    private $name;

    private $groups;

    private $date;

    private $location;

    private $concertHall;

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of groups.
     *
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Sets the value of groups.
     *
     * @param mixed $groups the groups
     *
     * @return self
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Gets the value of concertHall.
     *
     * @return mixed
     */
    public function getConcertHall()
    {
        return $this->concertHall;
    }

    /**
     * Sets the value of concertHall.
     *
     * @param mixed $concertHall the concert hall
     *
     * @return self
     */
    public function setConcertHall($concertHall)
    {
        $this->concertHall = $concertHall;

        return $this;
    }

    /**
     * Gets the value of location.
     *
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the value of location.
     *
     * @param mixed $location the location
     *
     * @return self
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }
}