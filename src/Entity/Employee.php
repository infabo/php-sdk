<?php

namespace Justimmo\Api\Entity;

use Justimmo\Api\Annotation as JUSTIMMO;
use Justimmo\Api\Entity\Traits\Identifiable;
use Justimmo\Api\Entity\Traits\Nameable;

/**
 * @JUSTIMMO\Entity()
 */
class Employee implements Entity
{
    use Identifiable, Nameable;

    /**
     * @var int
     * @JUSTIMMO\Column(path="number", type="integer")
     */
    private $number;

    /**
     * @var string
     * @JUSTIMMO\Column(path="firstName", type="string")
     */
    private $firstName;

    /**
     * @var string
     * @JUSTIMMO\Column(path="lastName", type="string")
     */
    private $lastName;

    /**
     * @var string
     * @JUSTIMMO\Column(path="suffix", type="string")
     */
    private $suffix;

    /**
     * @var string
     * @JUSTIMMO\Column(path="position", type="string")
     */
    private $position;

    /**
     * @var string
     * @JUSTIMMO\Column(path="biography", type="string")
     */
    private $biography;

    /**
     * @var string
     * @JUSTIMMO\Column(path="mobile", type="string")
     */
    private $mobile;

    /**
     * @var string
     * @JUSTIMMO\Column(path="phone", type="string")
     */
    private $phone;

    /**
     * @var string
     * @JUSTIMMO\Column(path="fax", type="string")
     */
    private $fax;

    /**
     * @var string
     * @JUSTIMMO\Column(path="email", type="string")
     */
    private $email;

    /**
     * @var string
     * @JUSTIMMO\Column(path="website", type="string")
     */
    private $website;

    /**
     * @var Address
     * @JUSTIMMO\Relation(path="address", targetEntity="Justimmo\Api\Entity\Address")
     */
    private $address;

    /**
     * @var Attachment
     * @JUSTIMMO\Relation(path="profilePicture", targetEntity="Justimmo\Api\Entity\Attachment")
     */
    private $profilePicture;

    /**
     * @var Attachment[]|\Justimmo\Api\ResultSet\ResultSet
     * @JUSTIMMO\Relation(path="pictures", targetEntity="Justimmo\Api\Entity\Attachment", multiple=true)
     */
    private $pictures;

    /**
     * @var EmployeeCategory[]|\Justimmo\Api\ResultSet\ResultSet
     * @JUSTIMMO\Relation(path="employeeCategories", targetEntity="Justimmo\Api\Entity\EmployeeCategory", multiple=true)
     */
    private $employeeCategories;

    /**
     * @var Link[]|\Justimmo\Api\ResultSet\ResultSet
     * @JUSTIMMO\Relation(path="links", targetEntity="Justimmo\Api\Entity\Link", multiple=true)
     */
    private $links;

    /**
     * @var int[]
     * @JUSTIMMO\Column(path="realtyIds", type="integer", multiple=true)
     */
    private $realtyIds;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }


}
