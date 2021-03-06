<?php

namespace App\Entity;

use App\Repository\UniversRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UniversRepository::class)
 */
class Univers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=Context::class, mappedBy="univers")
     */
    private $context;

    public function __construct()
    {
        $this->context = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Context[]
     */
    public function getContext(): Collection
    {
        return $this->context;
    }

    public function addContext(Context $context): self
    {
        if (!$this->context->contains($context)) {
            $this->context[] = $context;
            $context->setUnivers($this);
        }

        return $this;
    }

    public function removeContext(Context $context): self
    {
        if ($this->context->removeElement($context)) {
            // set the owning side to null (unless already changed)
            if ($context->getUnivers() === $this) {
                $context->setUnivers(null);
            }
        }

        return $this;
    }
}
