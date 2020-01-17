<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(collectionOperations={"get", "post"},
 *              itemOperations={"get"})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Shibe", mappedBy="user", orphanRemoval=true)
     * @ApiSubresource()
     */
    private $shibes;

    public function __construct()
    {
        $this->shibes = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Collection|Shibe[]
     */
    public function getShibes(): Collection
    {
        return $this->shibes;
    }

    public function addShibe(Shibe $shibe): self
    {
        if (!$this->shibes->contains($shibe)) {
            $this->shibes[] = $shibe;
            $shibe->setUser($this);
        }

        return $this;
    }

    public function removeShibe(Shibe $shibe): self
    {
        if ($this->shibes->contains($shibe)) {
            $this->shibes->removeElement($shibe);
            // set the owning side to null (unless already changed)
            if ($shibe->getUser() === $this) {
                $shibe->setUser(null);
            }
        }

        return $this;
    }
}
