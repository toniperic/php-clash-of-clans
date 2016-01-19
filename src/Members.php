<?php

namespace ToniPeric\Clash;

use Countable;

class Members implements Countable
{
    /** @var array */
    protected $members;

    public function __construct(array $members)
    {
        $this->members = array_map(function ($item) {
            return new Member($item);
        }, $members);
    }

    /**
     * Array of Member objects.
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Returns the member count.
     *
     * @return int
     */
    public function count()
    {
        return count($this->getMembers());
    }

    /**
     * Return the member first on the list
     * (usually one with most trophies).
     *
     * @return Member
     */
    public function top()
    {
        $members = $this->getMembers();

        return $members[0];
    }

    /**
     * Filter members by role.
     *
     * @param $role
     *
     * @return array
     */
    public function getByRole($role)
    {
        return array_filter($this->getMembers(), function ($member) use ($role) {
            return $member->role() === $role;
        });
    }

    /**
     * Get clan leader.
     *
     * @return Member
     */
    public function leader()
    {
        $results = $this->getByRole('leader');

        // since there's always only one leader
        return $results[0];
    }

    /**
     * Get clan co-leaders.
     *
     * @return array
     */
    public function coLeaders()
    {
        return $this->getByRole('coLeader');
    }

    /**
     * Get clan elders.
     *
     * @return array
     */
    public function elders()
    {
        return $this->getByRole('admin');
    }
}
