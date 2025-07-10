<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $titre;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salairemin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salairemax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualification;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $eduexp;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $responsibilities;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $autres;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $city;

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param mixed $exp
     */
    public function setExp($exp): void
    {
        $this->exp = $exp;
    }

    /**
     * @return mixed
     */
    public function getSalairemin()
    {
        return $this->salairemin;
    }

    /**
     * @param mixed $salairemin
     */
    public function setSalairemin($salairemin): void
    {
        $this->salairemin = $salairemin;
    }

 /**
     * @return mixed
     */
    public function getSalairemax()
    {
        return $this->salairemax;
    }

    /**
     * @param mixed $salairemax
     */
    public function setSalairemax($salairemax): void
    {
        $this->salairemax = $salairemax;
    }

    /**
     * @return mixed
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param mixed $qualification
     */
    public function setQualification($qualification): void
    {
        $this->qualification = $qualification;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getEduexp()
    {
        return $this->eduexp;
    }

    /**
     * @param mixed $eduexp
     */
    public function setEduexp($eduexp): void
    {
        $this->eduexp = $eduexp;
    }

    /**
     * @return mixed
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    /**
     * @param mixed $responsibilities
     */
    public function setResponsibilities($responsibilities): void
    {
        $this->responsibilities = $responsibilities;
    }

    /**
     * @return mixed
     */
    public function getAutres()
    {
        return $this->autres;
    }

    /**
     * @param mixed $autres
     */
    public function setAutres($autres): void
    {
        $this->autres = $autres;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return \DateTime
     */
    public function getExpire(): ?\DateTimeInterface
    {
        return $this->expire;
    }

    /**
     * @param \DateTime $expire
     */
    public function setExpire(\DateTime $expire): void
    {
        $this->expire = $expire;
    }

    /**
     * @var \DateTime $ expire
     *
     * @ORM\Column(type="datetime")
     */
    private $expire;

    /**
     * @var \DateTime $ created_at
     * 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\Column(type="string", length=255 )
     */
    private $categorie;

    

    /**
     * @ORM\OneToMany(targetEntity=Apply::class, mappedBy="annonce", orphanRemoval=true)
     */
    private $apply;

    

    public function __construct()
    {
        $this->apply = new ArrayCollection();
    }

    

    

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Apply[]
     */
    public function getApply(): Collection
    {
        return $this->apply;
    }

    public function addApply(Apply $apply): self
    {
        if (!$this->apply->contains($apply)) {
            $this->apply[] = $apply;
            $apply->setAnnonce($this);
        }

        return $this;
    }

    public function removeApply(Apply $apply): self
    {
        if ($this->apply->removeElement($apply)) {
            // set the owning side to null (unless already changed)
            if ($apply->getAnnonce() === $this) {
                $apply->setAnnonce(null);
            }
        }

        return $this;
    }

    

    

    

   


}
