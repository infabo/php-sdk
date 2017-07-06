<?php

namespace Justimmo\Api\Entity;

use Justimmo\Api\Annotation as JUSTIMMO;

/**
 * @JUSTIMMO\Entity()
 */
class RealtyTexts implements Entity
{
    /**
     * @var string
     * @JUSTIMMO\Column
     */
    private $title;

    /**
     * @var string
     * @JUSTIMMO\Column
     */
    private $description;

    /**
     * @var string
     * @JUSTIMMO\Column
     */
    private $location;

    /**
     * @var string
     * @JUSTIMMO\Column
     */
    private $additionalInformation;

    /**
     * @var string
     * @JUSTIMMO\Column(path="freetext1")
     */
    private $free1;

    /**
     * @var string
     * @JUSTIMMO\Column(path="freetext2")
     */
    private $free2;

    /**
     * @var string
     * @JUSTIMMO\Column(path="freetext3")
     */
    private $free3;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @return string
     */
    public function getFree1()
    {
        return $this->free1;
    }

    /**
     * @return string
     */
    public function getFree2()
    {
        return $this->free2;
    }

    /**
     * @return string
     */
    public function getFree3()
    {
        return $this->free3;
    }
}
