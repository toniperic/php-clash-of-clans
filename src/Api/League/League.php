<?php


namespace ClashOfClans\Api\League;


use ClashOfClans\Api\AbstractResource;

/**
 * @method int id()
 * @method string name()
 */
class League extends AbstractResource
{
    protected $casts = [
        'iconUrls' => Icon::class
    ];

    /**
     * @return Icon
     */
    public function icon()
    {
        return $this->get('iconUrls');
    }
}
