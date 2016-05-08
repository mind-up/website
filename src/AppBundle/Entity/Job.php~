<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\JobRepository")
 */
class Job
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="jobs")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;
    /**
     * @ORM\Column(type="integer")
     */
    private $order;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;
    /**
     * @ORM\Column(type="boolean")
     */
    private $browseBackOffice;
    /**
     * @ORM\Column(type="boolean")
     */
    private $editSelfInfos;
    /**
     * @ORM\Column(type="boolean")
     */
    private $readOtherInfos;
    /**
     * @ORM\Column(type="boolean")
     */
    private $manageProject;
    /**
     * @ORM\Column(type="boolean")
     */
    private $editFigures;
    /**
     * @ORM\Column(type="boolean")
     */
    private $editOtherInfos;
    /**
     * @ORM\Column(type="boolean")
     */
    private $editPublicTexts;
    /**
     * @ORM\Column(type="boolean")
     */
    private $managePositions;
    /**
     * @ORM\Column(type="boolean")
     */
    private $manageMembers;
    /**
     * @ORM\OneToMany(targetEntity="Member", mappedBy="job")
     */
    private $members;
	
    public function __construct()
    {
        $this->members = new ArrayCollection();
    }
    
    /**
     * Set id
     *
     * @param id $department
     *
     * @return id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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
     * Set department
     *
     * @param string $department
     *
     * @return Job
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    

    /**
     * Set browseBackOffice
     *
     * @param boolean $browseBackOffice
     *
     * @return Job
     */
    public function setBrowseBackOffice($browseBackOffice)
    {
        $this->browseBackOffice = $browseBackOffice;

        return $this;
    }

    /**
     * Get browseBackOffice
     *
     * @return boolean
     */
    public function getBrowseBackOffice()
    {
        return $this->browseBackOffice;
    }

    /**
     * Set editSelfInfos
     *
     * @param boolean $editSelfInfos
     *
     * @return Job
     */
    public function setEditSelfInfos($editSelfInfos)
    {
        $this->editSelfInfos = $editSelfInfos;

        return $this;
    }

    /**
     * Get editSelfInfos
     *
     * @return boolean
     */
    public function getEditSelfInfos()
    {
        return $this->editSelfInfos;
    }

    /**
     * Set readOtherInfos
     *
     * @param boolean $readOtherInfos
     *
     * @return Job
     */
    public function setReadOtherInfos($readOtherInfos)
    {
        $this->readOtherInfos = $readOtherInfos;

        return $this;
    }

    /**
     * Get readOtherInfos
     *
     * @return boolean
     */
    public function getReadOtherInfos()
    {
        return $this->readOtherInfos;
    }

    /**
     * Set manageProject
     *
     * @param boolean $manageProject
     *
     * @return Job
     */
    public function setManageProject($manageProject)
    {
        $this->manageProject = $manageProject;

        return $this;
    }

    /**
     * Get manageProject
     *
     * @return boolean
     */
    public function getManageProject()
    {
        return $this->manageProject;
    }

    /**
     * Set editFigures
     *
     * @param boolean $editFigures
     *
     * @return Job
     */
    public function setEditFigures($editFigures)
    {
        $this->editFigures = $editFigures;

        return $this;
    }

    /**
     * Get editFigures
     *
     * @return boolean
     */
    public function getEditFigures()
    {
        return $this->editFigures;
    }

    /**
     * Set editOtherInfos
     *
     * @param boolean $editOtherInfos
     *
     * @return Job
     */
    public function setEditOtherInfos($editOtherInfos)
    {
        $this->editOtherInfos = $editOtherInfos;

        return $this;
    }

    /**
     * Get editOtherInfos
     *
     * @return boolean
     */
    public function getEditOtherInfos()
    {
        return $this->editOtherInfos;
    }

    /**
     * Set editPublicTexts
     *
     * @param boolean $editPublicTexts
     *
     * @return Job
     */
    public function setEditPublicTexts($editPublicTexts)
    {
        $this->editPublicTexts = $editPublicTexts;

        return $this;
    }

    /**
     * Get editPublicTexts
     *
     * @return boolean
     */
    public function getEditPublicTexts()
    {
        return $this->editPublicTexts;
    }

    /**
     * Set managePositions
     *
     * @param boolean $managePositions
     *
     * @return Job
     */
    public function setManagePositions($managePositions)
    {
        $this->managePositions = $managePositions;

        return $this;
    }

    /**
     * Get managePositions
     *
     * @return boolean
     */
    public function getManagePositions()
    {
        return $this->managePositions;
    }

    /**
     * Set manageMembers
     *
     * @param boolean $manageMembers
     *
     * @return Job
     */
    public function setManageMembers($manageMembers)
    {
        $this->manageMembers = $manageMembers;

        return $this;
    }

    /**
     * Get manageMembers
     *
     * @return boolean
     */
    public function getManageMembers()
    {
        return $this->manageMembers;
    }

    /**
     * Add member
     *
     * @param \AppBundle\Entity\Member $member
     *
     * @return Job
     */
    public function addMember(\AppBundle\Entity\Member $member)
    {
        $this->members[] = $member;

        return $this;
    }

    /**
     * Remove member
     *
     * @param \AppBundle\Entity\Member $member
     */
    public function removeMember(\AppBundle\Entity\Member $member)
    {
        $this->members->removeElement($member);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembers()
    {
        return $this->members;
    }
    
    public function __toString() {
		return $this->text;
	}

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Job
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return Job
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }
}
