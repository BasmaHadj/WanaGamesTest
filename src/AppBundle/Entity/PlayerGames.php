<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerGames
 *
 * @ORM\Table(name="player_games")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerGamesRepository")
 */
class PlayerGames
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
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="playerGame")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="playerGame")
     */
    private $game;






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
     * Set player
     *
     * @param \AppBundle\Entity\Player $player
     * @return PlayerGames
     */
    public function setPlayer(\AppBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     * @return PlayerGames
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }
}
