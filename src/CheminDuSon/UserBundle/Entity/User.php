<?php
namespace CheminDuSon\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="cds_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="CheminDuSon\UserBundle\Entity\ContactDetails",cascade={"persist"})
     * @Assert\Type(type="CheminDuSon\UserBundle\Entity\ContactDetails")
     */
    protected $contactDetailsPrincipal;

    /**
     * @Gedmo\Slug(fields={"username"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    
    public function __construct()
    {
        parent::__construct();
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
     * Set contactDetailsPrincipal
     *
     * @param \CheminDuSon\UserBundle\Entity\ContactDetails $contactDetailsPrincipal
     * @return User
     */
    public function setContactDetailsPrincipal(\CheminDuSon\UserBundle\Entity\ContactDetails $contactDetailsPrincipal = null)
    {
        $this->contactDetailsPrincipal = $contactDetailsPrincipal;
    
        return $this;
    }

    /**
     * Get contactDetailsPrincipal
     *
     * @return \CheminDuSon\UserBundle\Entity\ContactDetails 
     */
    public function getContactDetailsPrincipal()
    {
        return $this->contactDetailsPrincipal;
    }
    
   /**
	 * @ORM\PrePersist
	 */
    public function onPrePersist(){
    	
    	if($this->getContactDetailsPrincipal()===null){
    		var_dump($this->getContactDetailsPrincipal());
    		$this->contactDetailsPrincipal = new ContactDetails();
    	}
    }
    
    public function getSlug(){
    	return $this->slug;
    }
}