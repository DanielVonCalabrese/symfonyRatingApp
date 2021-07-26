<?php

namespace App\Entity;

use App\Repository\RatingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RatingsRepository::class)
 */
class Ratings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating_value;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $song_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRatingValue(): ?int
    {
        return $this->rating_value;
    }

    public function setRatingValue(int $rating_value): self
    {
        $this->rating_value = $rating_value;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getSongId(): ?int
    {
        return $this->song_id;
    }

    public function setSongId(int $song_id): self
    {
        $this->song_id = $song_id;

        return $this;
    }
}
