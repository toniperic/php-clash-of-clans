<?php

namespace ToniPeric\Clash;

class Member
{
    /** @var array */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function data()
    {
        return $this->data;
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
     * Get role.
     *
     * @return string
     */
    public function role()
    {
        return $this->data['role'];
    }

    /**
     * Get donations.
     *
     * @return int
     */
    public function donations()
    {
        return $this->data['donations'];
    }

    /**
     * Get donations received.
     *
     * @return int
     */
    public function donationsReceived()
    {
        return $this->data['donationsReceived'];
    }

    /**
     * Get experience level.
     *
     * @return int
     */
    public function level()
    {
        return $this->data['expLevel'];
    }

    /**
     * Get league badge images.
     *
     * @return array
     */
    public function leagueBadge()
    {
        return $this->data['leagueBadgeImg'];
    }

    /**
     * Get previous clan rank.
     *
     * @return int
     */
    public function previousClanRank()
    {
        return $this->data['previousClanRank'];
    }

    /**
     * Get trophies.
     *
     * @return int
     */
    public function trophies()
    {
        return $this->data['trophies'];
    }
}
