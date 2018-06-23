<?php

class Place extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="gid", type="string", nullable=true)
     */
    public $gid;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=true)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="badge", type="string", length=255, nullable=true)
     */
    public $badge;

    /**
     *
     * @var string
     * @Column(column="lat", type="string", length=255, nullable=true)
     */
    public $lat;

    /**
     *
     * @var string
     * @Column(column="lon", type="string", length=255, nullable=true)
     */
    public $lon;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("frinder");
        $this->setSource("place");
        $this->hasMany('id', 'Photo', 'place_id', ['alias' => 'Photo']);
        $this->hasMany('id', 'Placetour', 'place_id', ['alias' => 'Placetour']);
        $this->hasMany('id', 'Placetype', 'place_id', ['alias' => 'Placetype']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'place';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Place[]|Place|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Place|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
