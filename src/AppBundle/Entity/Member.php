<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity
 * @ORM\Table(name="member")
 */
class Member implements UserInterface, \Serializable
{
	public function __toString() {
		return $this->firstname . ' ' . $this->name;
	}
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_MEMBER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }






	/**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;
    /**
     * @ORM\Column(type="text")
     */
    private $address;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mobile;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityOfBirth;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $studentCardPath;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idCardPath;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cvPath;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $licensePath;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $grayCardPath;
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
    private $isImportant;
    /**
     * @ORM\Column(type="boolean")
     */
    private $hasKey;
    /**
     * @ORM\ManyToOne(targetEntity="Job", inversedBy="members")
     * @ORM\JoinColumn(name="job_id", referencedColumnName="id")
     */
    private $job;

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
     * Set username
     *
     * @param string $username
     *
     * @return Member
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Member
     */
    public function setPassword($password) {
    	if($password !== null) {
        	$this->password = $password; }
        return $this; }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Member
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Member
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Member
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Member
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
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Member
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set cityOfBirth
     *
     * @param string $cityOfBirth
     *
     * @return Member
     */
    public function setCityOfBirth($cityOfBirth)
    {
        $this->cityOfBirth = $cityOfBirth;

        return $this;
    }

    /**
     * Get cityOfBirth
     *
     * @return string
     */
    public function getCityOfBirth()
    {
        return $this->cityOfBirth;
    }

    /**
     * Set studentCardPath
     *
     * @param string $studentCardPath
     *
     * @return Member
     */
    public function setStudentCardPath($studentCardPath)
    {
        $this->studentCardPath = $studentCardPath;

        return $this;
    }

    /**
     * Get studentCardPath
     *
     * @return string
     */
    public function getStudentCardPath()
    {
        return $this->studentCardPath;
    }

    /**
     * Set idCardPath
     *
     * @param string $idCardPath
     *
     * @return Member
     */
    public function setIdCardPath($idCardPath)
    {
        $this->idCardPath = $idCardPath;

        return $this;
    }

    /**
     * Get idCardPath
     *
     * @return string
     */
    public function getIdCardPath()
    {
        return $this->idCardPath;
    }

    /**
     * Set cvPath
     *
     * @param string $cvPath
     *
     * @return Member
     */
    public function setCvPath($cvPath)
    {
        $this->cvPath = $cvPath;

        return $this;
    }

    /**
     * Get cvPath
     *
     * @return string
     */
    public function getCvPath()
    {
        return $this->cvPath;
    }

    /**
     * Set licensePath
     *
     * @param string $licensePath
     *
     * @return Member
     */
    public function setLicensePath($licensePath)
    {
        $this->licensePath = $licensePath;

        return $this;
    }

    /**
     * Get licensePath
     *
     * @return string
     */
    public function getLicensePath()
    {
        return $this->licensePath;
    }

    /**
     * Set grayCardPath
     *
     * @param string $grayCardPath
     *
     * @return Member
     */
    public function setGrayCardPath($grayCardPath)
    {
        $this->grayCardPath = $grayCardPath;

        return $this;
    }

    /**
     * Get grayCardPath
     *
     * @return string
     */
    public function getGrayCardPath()
    {
        return $this->grayCardPath;
    }
    /**
     * Set isImportant
     *
     * @param boolean $isImportant
     *
     * @return Member
     */
    public function setIsImportant($isImportant)
    {
        $this->isImportant = $isImportant;

        return $this;
    }

    /**
     * Get isImportant
     *
     * @return boolean
     */
    public function getIsImportant()
    {
        return $this->isImportant;
    }

    /**
     * Set hasKey
     *
     * @param boolean $hasKey
     *
     * @return Member
     */
    public function setHasKey($hasKey)
    {
        $this->hasKey = $hasKey;

        return $this;
    }

    /**
     * Get hasKey
     *
     * @return boolean
     */
    public function getHasKey()
    {
        return $this->hasKey;
    }

    /**
     * Set job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return Member
     */
    public function setJob(\AppBundle\Entity\Job $job = null)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \AppBundle\Entity\Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Member
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
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
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
		    __DIR__.'/../../../web/images/profils',
		    $this->imageName);
		$this->file = null;}}
