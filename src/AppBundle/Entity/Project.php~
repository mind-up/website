<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
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
    private $name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $image;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;
    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;
    /**
	   * @ORM\ManyToMany(targetEntity="Member", cascade={"persist"})
	   */
	private $members;
	/**
	   * @ORM\ManyToMany(targetEntity="Techno", cascade={"persist"})
	   */
	private $technos;

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
     * Set name
     *
     * @param string $name
     *
     * @return Project
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
     * Set client
     *
     * @param string $client
     *
     * @return Project
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Project
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Project
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Member $category
     *
     * @return Project
     */
    public function addCategory(\AppBundle\Entity\Member $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Member $category
     */
    public function removeCategory(\AppBundle\Entity\Member $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add member
     *
     * @param \AppBundle\Entity\Member $member
     *
     * @return Project
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
    public function getMembers(){
        return $this->members;}
    /**
     * Add techno
     *
     * @param \AppBundle\Entity\Techno $techno
     *
     * @return Project
     */
    public function addTechno(\AppBundle\Entity\Techno $techno)
    {
        $this->technos[] = $techno;

        return $this;
    }

    /**
     * Remove techno
     *
     * @param \AppBundle\Entity\Techno $techno
     */
    public function removeTechno(\AppBundle\Entity\Techno $techno)
    {
        $this->technos->removeElement($techno);
    }

    /**
     * Get technos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnos()
    {
        return $this->technos;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Project
     */
    public function setImageName($imageName){
        $this->imageName = $imageName;
        return $this;}
    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName(){
        return $this->imageName;}
    
    public function upload(){
		if (null === $this->getImage()) {
			if (null === $this->imageName){
				$this->imageName= 'default.png';}
		    return;}
		$this->imageName = 
			md5(uniqid()).'.'
			.$this->getImage()->guessExtension();
		$this->getImage()->move(
		    __DIR__.'/../../../web/images/projects',
		    $this->imageName);
		$this->file = null;}}
