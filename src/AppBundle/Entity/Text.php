<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="text")
 */
class Text
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	/**
     * @ORM\Column(type="string", length=255)
     */
    private $textId;
    /**
     * @ORM\Column(type="text")
     */
    private $french;
    /**
     * @ORM\Column(type="boolean")
     */
    private $editable;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set textId
     *
     * @param string $textId
     *
     * @return Text
     */
    public function setTextId($textId)
    {
        $this->textId = $textId;

        return $this;
    }

    /**
     * Get textId
     *
     * @return string
     */
    public function getTextId()
    {
        return $this->textId;
    }

    /**
     * Set french
     *
     * @param string $french
     *
     * @return Text
     */
    public function setFrench($french)
    {
        $this->french = $french;

        return $this;
    }

    /**
     * Get french
     *
     * @return string
     */
    public function getFrench()
    {
        return $this->french;
    }

    /**
     * Set editable
     *
     * @param boolean $editable
     *
     * @return Text
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * Get editable
     *
     * @return boolean
     */
    public function getEditable()
    {
        return $this->editable;
    }
}
