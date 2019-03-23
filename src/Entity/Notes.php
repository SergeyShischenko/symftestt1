<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // 12. Путь к валидатору

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotesRepository")
 */
class Notes
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
     *     min="3",
     *     max="20",
     *     minMessage="Ваша сообщение:{{ value }} слишком короткое. Количество символов не должно быть  менее {{ limit }} знаков",
     *     maxMessage="Количество символов не более {{ limit }}"
     * )
     * @Assert\Email(
     *     message="Ваша электронная почта {{ value }} неверная. Введите правильную электронную почту.",
     *     checkMX=true,
     *
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     *@Assert\NotBlank()
     * @Assert\Choice(
     *     {"Город", "Деревня"}
     * )
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    private $descroption;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescroption(): ?string
    {
        return $this->descroption;
    }

    public function setDescroption(?string $descroption): self
    {
        $this->descroption = $descroption;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
