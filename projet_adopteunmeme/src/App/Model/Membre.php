<?php

namespace App\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class Membre implements UserInterface
{

    private $IDMEMBRE,
            $NOMMEMBRE,
            $PRENOMMEMBRE,
            $EMAILMEMBRE,
            $MDPMEMBRE,
            $ROLEMEMBRE,
            $DATEINSCRIPTION;


    /**
     * Membre constructor.
     * @param $IDMEMBRE
     * @param $NOMMEMBRE
     * @param $PRENOMMEMBRE
     * @param $EMAILMEMBRE
     * @param $MDPMEMBRE
     * @param $ROLEMEMBRE
     * @param $DATEINSCRIPTION
     */
    public function __construct($IDMEMBRE, $NOMMEMBRE, $PRENOMMEMBRE, $EMAILMEMBRE, $MDPMEMBRE, $ROLEMEMBRE, $DATEINSCRIPTION)
    {
        $this->IDMEMBRE         = $IDMEMBRE;
        $this->NOMMEMBRE        = $NOMMEMBRE;
        $this->PRENOMMEMBRE     = $PRENOMMEMBRE;
        $this->EMAILMEMBRE      = $EMAILMEMBRE;
        $this->MDPMEMBRE        = $MDPMEMBRE;
        $this->ROLEMEMBRE       = $ROLEMEMBRE;
        $this->DATEINSCRIPTION  = $DATEINSCRIPTION;
    }

    /**
     * @return mixed
     */
    public function getIDMEMBRE()
    {
        return $this->IDMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getNOMMEMBRE()
    {
        return $this->NOMMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getPRENOMMEMBRE()
    {
        return $this->PRENOMMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getEMAILMEMBRE()
    {
        return $this->EMAILMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getMDPMEMBRE()
    {
        return $this->MDPMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getROLEMEMBRE()
    {
        return $this->ROLEMEMBRE;
    }

    /**
     * @return mixed
     */
    public function getDATEINSCRIPTION()
    {
        return $this->DATEINSCRIPTION;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->EMAILMEMBRE;
    }

    public function eraseCredentials(){}

}