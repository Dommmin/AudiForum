<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Slug(fields: ['name'])]
    private $slug;

    #[ORM\Column(type: 'text')]
    private $question;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $askedAt;


    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Answer::class)]
    private $answers;

    #[ORM\ManyToOne(targetEntity: General::class, inversedBy: 'questions')]
    private $general;

    #[ORM\ManyToOne(targetEntity: Technical::class, inversedBy: 'questions')]
    private $technical;

    #[ORM\ManyToOne(targetEntity: Tuning::class, inversedBy: 'questions')]
    private $tuning;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAskedAt(): ?\DateTimeInterface
    {
        return $this->askedAt;
    }

    public function setAskedAt(?\DateTimeInterface $askedAt): self
    {
        $this->askedAt = $askedAt;

        return $this;
    }


    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }

    public function getGeneral(): ?General
    {
        return $this->general;
    }

    public function setGeneral(?General $general): self
    {
        $this->general = $general;

        return $this;
    }

    public function getTechnical(): ?Technical
    {
        return $this->technical;
    }

    public function setTechnical(?Technical $technical): self
    {
        $this->technical = $technical;

        return $this;
    }

    public function getTuning(): ?Tuning
    {
        return $this->tuning;
    }

    public function setTuning(?Tuning $tuning): self
    {
        $this->tuning = $tuning;

        return $this;
    }
}
