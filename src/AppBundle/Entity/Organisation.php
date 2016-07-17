<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Organisation
 *
 * @ORM\Table(name="organisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrganisationRepository")
 */
class Organisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=255)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=255, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="address3", type="string", length=255, nullable=true)
     */
    private $address3;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=32)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=64, nullable=true)
     */
    private $county;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=64)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=32, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="web_address", type="string", length=255, nullable=true)
     */
    private $webAddress;

    /**
     * @ORM\OneToOne(targetEntity="Contact")
     * @ORM\JoinColumn(name="primary_contact_id", referencedColumnName="id", nullable=true)
     */
    private $primaryContact;

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="organisation")
     */
    private $contacts;

    /**
     * Organisation constructor.
     */
    public function __construct()
    {
        $this->contacts = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Organisation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Organisation
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Organisation
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     *
     * @return Organisation
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Organisation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Organisation
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set county
     *
     * @param string $county
     *
     * @return Organisation
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Organisation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Organisation
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set webAddress
     *
     * @param string $webAddress
     *
     * @return Organisation
     */
    public function setWebAddress($webAddress)
    {
        $this->webAddress = $webAddress;

        return $this;
    }

    /**
     * Get webAddress
     *
     * @return string
     */
    public function getWebAddress()
    {
        return $this->webAddress;
    }

    /**
     * Set primaryContact
     *
     * @param string $primaryContact
     *
     * @return Organisation
     */
    public function setPrimaryContact($primaryContact)
    {
        $this->primaryContact = $primaryContact;

        return $this;
    }

    /**
     * Get primaryContact
     *
     * @return string
     */
    public function getPrimaryContact()
    {
        return $this->primaryContact;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }


    public function addContact(Contact $contact)
    {
        $contact->setOrganisation($this);
        $this->contacts->add($contact);
    }

    public function removeContact($contact)
    {
        $contact->setOrganisation(null);
        $this->contacts->removeElement($contact);
    }

    public function __toString()
    {
        return null !== $this->name ? $this->name : '';
    }


}

