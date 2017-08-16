<?php

/**
 * Created by PhpStorm.
 * User: Nuwan rathnayaka
 * Date: 8/16/2017
 * Time: 7:07 PM
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="issues")
 */

class Issue
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Recommendation", mappedBy="issue")
     */
    private $recommendations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recommendations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Issue
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add recommendations
     *
     * @param \AppBundle\Entity\Recommendation $recommendations
     * @return Issue
     */
    public function addRecommendation(\AppBundle\Entity\Recommendation $recommendations)
    {
        $this->recommendations[] = $recommendations;

        return $this;
    }

    /**
     * Remove recommendations
     *
     * @param \AppBundle\Entity\Recommendation $recommendations
     */
    public function removeRecommendation(\AppBundle\Entity\Recommendation $recommendations)
    {
        $this->recommendations->removeElement($recommendations);
    }

    /**
     * Get recommendations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }
}
