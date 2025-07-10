<?php

namespace App\Entity;

class Search
{

   private $city;

   private $exp;
   private $categorie;	
   private $max ;
   private $min ;
   private $type;
   private $sex;
   private $qualification;
	private $titre;
	private $salairemin;
	private $salairemax;

public function getCity(): ?string
     {
		return $this->city;
	}

	public function setCity(string $city): self
     {
		$this->city = $city;

        return $this;
	}


	public function getSalairemin(): ?string
	{
	   return $this->salairemin;
   }

   public function setSalairemin(string $salairemin): self
	{
	   $this->salairemin = $salairemin;

	   return $this;
   }

   public function getSalairemax(): ?string
	{
	   return $this->salairemax;
   }

   public function setSalairemax(string $salairemax): self
	{
	   $this->salairemax = $salairemax;

	   return $this;
   }


	public function getCategorie(): ?string
     {
		return $this->categorie;
	}

	public function setCategorie(string $city): self
     {
		$this->categoire = $categorie;
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

	public function getType(): ?string
     {
		return $this->type;
	}

	public function setType(string $type): self
     {
		$this->type = $type;

        return $this;
	}

	public function getExp(): ?string
     {
		return $this->exp;
	}

	public function setExp(string $exp): self
     {
		$this->exp = $exp;

        return $this;
	}

	public function getQualification(): ?string
	{
	   return $this->qualification;
   }

   public function setQualification(string $qualification): self
	{
	   $this->qualification = $qualification;

	   return $this;
   }

   public function getSex(): ?string
	{
	   return $this->sex;
   }

   public function setSex(string $sex): self
	{
	   $this->sex = $sex;

	   return $this;
   }


    


}