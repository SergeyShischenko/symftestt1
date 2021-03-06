<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // 12. Путь к валидатору


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtecRepository")
 */
class Artec
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="20",
     *     max="70",
     *     minMessage="В вашем крутом сообщении: {{ value }} очень мало текста. Должно быть минимум {{ limit }} знаков."
     *
     * )
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titleatr;

    /**
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    private $descrart;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $statusart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleatr(): ?string
    {
        return $this->titleatr;
    }

    public function setTitleatr(?string $titleatr): self
    {
        $this->titleatr = $titleatr;

        return $this;
    }

    public function getDescrart(): ?string
    {
        return $this->descrart;
    }

    public function setDescrart(?string $descrart): self
    {
        $this->descrart = $descrart;

        return $this;
    }

    public function getStatusart(): ?int
    {
        return $this->statusart;
    }

    public function setStatusart(?int $statusart): self
    {
        $this->statusart = $statusart;

        return $this;
    }
}
