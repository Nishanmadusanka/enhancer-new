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
 * @ORM\Table(name="recommendations")
 */

class Recommendation
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
     * @ORM\ManyToOne(targetEntity="Issue", inversedBy="recommendations")
     * @ORM\JoinColumn(name="issue_id", referencedColumnName="id")
     */
    private $issue;


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
     * @return Recommendation
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
     * Set issue
     *
     * @param \AppBundle\Entity\Issue $issue
     * @return Recommendation
     */
    public function setIssue(\AppBundle\Entity\Issue $issue = null)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     * @return \AppBundle\Entity\Issue 
     */
    public function getIssue()
    {
        return $this->issue;
    }
}
