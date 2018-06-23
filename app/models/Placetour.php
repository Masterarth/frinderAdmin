<?php

class Placetour extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="tour_id", type="integer", length=11, nullable=false)
     */
    public $tour_id;

    /**
     *
     * @var integer
     * @Column(column="place_id", type="integer", length=11, nullable=false)
     */
    public $place_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("frinder");
        $this->setSource("placetour");
        $this->belongsTo('tour_id', '\Tour', 'id', ['alias' => 'Tour']);
        $this->belongsTo('place_id', '\Place', 'id', ['alias' => 'Place']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'placetour';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Placetour[]|Placetour|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Placetour|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
