<?php

namespace Justimmo\Api\Entity;

use Justimmo\Api\Annotation as JUSTIMMO;
use Justimmo\Api\Entity\Traits\DateFormatable;

/**
 * @JUSTIMMO\Entity()
 */
class EnergyCertificate implements Entity
{
    use DateFormatable;

    /**
     * @var EnergyCertificateValue
     * @JUSTIMMO\Relation(targetEntity="Justimmo\Api\Entity\EnergyCertificateValue")
     */
    private $thermalHeatRequirement;

    /**
     * @var EnergyCertificateValue
     * @JUSTIMMO\Relation(targetEntity="Justimmo\Api\Entity\EnergyCertificateValue")
     */
    private $energyEfficiencyFactor;

    /**
     * @var \DateTime
     * @JUSTIMMO\Column(type="date")
     */
    private $validUntil;

    /**
     * @return EnergyCertificateValue
     */
    public function getThermalHeatRequirement()
    {
        return $this->thermalHeatRequirement;
    }

    /**
     * @return EnergyCertificateValue
     */
    public function getEnergyEfficiencyFactor()
    {
        return $this->energyEfficiencyFactor;
    }

    /**
     * @param string $format Date format to be returned. If left empty the \DateTime class is returned.
     *
     * @return \DateTime|string
     */
    public function getValidUntil($format = null)
    {
        if (!empty($this->validUntil)) {
            return $this->formatDate($this->validUntil, $format);
        }

        return null;
    }
}
