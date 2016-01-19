<?php

namespace ToniPeric\Clash;

class Clan
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function name()
    {
        return $this->data['name'];
    }

    /**
     * Get experience level.
     *
     * @return int
     */
    public function level()
    {
        return $this->data['clanLevel'];
    }

    /**
     * Get total points.
     *
     * @return int
     */
    public function points()
    {
        return $this->data['clanPoints'];
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function description()
    {
        return $this->data['description'];
    }

    /**
     * Get Members.
     *
     * @return Members
     */
    public function members()
    {
        return new Members($this->data['memberList']);
    }

    /**
     * Get members count.
     *
     * @return int
     */
    public function size()
    {
        return $this->members()->count();
    }

    /**
     * Get required trophies necessary for joining the clan.
     *
     * @return int
     */
    public function requiredTrophies()
    {
        return $this->data['requiredTrophies'];
    }

    /**
     * Get clan tag.
     *
     * @return string
     */
    public function tag()
    {
        return $this->data['tag'];
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function type()
    {
        return $this->data['type'];
    }

    /**
     * Get war frequency.
     *
     * @return string
     */
    public function warFrequency()
    {
        return $this->data['warFrequency'];
    }

    /**
     * Get number of wins in Clan Wars.
     *
     * @return int
     */
    public function warWins()
    {
        return $this->data['warWins'];
    }

    /**
     * Data getter.
     *
     * @return array
     */
    public function data()
    {
        return $this->data;
    }
}
