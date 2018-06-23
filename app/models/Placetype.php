<?php

class Placetype extends \Phalcon\Mvc\Model
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
     * @Column(column="type_id", type="integer", length=11, nullable=false)
     */
    public $type_id;

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
        $this->setSource("placetype");
        $this->belongsTo('place_id', '\Place', 'id', ['alias' => 'Place']);
        $this->belongsTo('type_id', '\Type', 'id', ['alias' => 'Type']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'placetype';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Placetype[]|Placetype|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Placetype|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
