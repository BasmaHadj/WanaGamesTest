<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\Column(name="score", type="decimal", precision=10, scale=0)
     */
    private $score;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFinished", type="boolean")
     */
    private $isFinished;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;


    /**
     * @ORM\OneToMany(targetEntity="PlayerGames", mappedBy="game",cascade={"remove"})
     */
    private $playerGame;


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
     * Set score
     *
     * @param string $score
     * @return Game
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set isFinished
     *
     * @param boolean $isFinished
     * @return Game
     */
    public function setIsFinished($isFinished)
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    /**
     * Get isFinished
     *
     * @return boolean 
     */
    public function getIsFinished()
    {
        return $this->isFinished;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Game
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Game
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->playerGame = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add playerGame
     *
     * @param \AppBundle\Entity\PlayerGames $playerGame
     * @return Game
     */
    public function addPlayerGame(\AppBundle\Entity\PlayerGames $playerGame)
    {
        $this->playerGame[] = $playerGame;

        return $this;
    }

    /**
     * Remove playerGame
     *
     * @param \AppBundle\Entity\PlayerGames $playerGame
     */
    public function removePlayerGame(\AppBundle\Entity\PlayerGames $playerGame)
    {
        $this->playerGame->removeElement($playerGame);
    }

    /**
     * Get playerGame
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayerGame()
    {
        return $this->playerGame;
    }
}
