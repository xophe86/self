<?php

namespace Innova\SelfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Duration
 *
 * @ORM\Table("questionnaireDuration")
 * @ORM\Entity
 */
class Duration
{
    /**
     * @var integer
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
    * @ORM\OneToMany(targetEntity="Questionnaire", mappedBy="duration")
    */
    protected $questionnaires;


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
     * @return Duration
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
     * Constructor
     */
    public function __construct()
    {
        $this->questionnaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add questionnaires
     *
     * @param \Innova\SelfBundle\Entity\Questionnaire $questionnaires
     * @return Duration
     */
    public function addQuestionnaire(\Innova\SelfBundle\Entity\Questionnaire $questionnaires)
    {
        $this->questionnaires[] = $questionnaires;
    
        return $this;
    }

    /**
     * Remove questionnaires
     *
     * @param \Innova\SelfBundle\Entity\Questionnaire $questionnaires
     */
    public function removeQuestionnaire(\Innova\SelfBundle\Entity\Questionnaire $questionnaires)
    {
        $this->questionnaires->removeElement($questionnaires);
    }

    /**
     * Get questionnaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestionnaires()
    {
        return $this->questionnaires;
    }
}