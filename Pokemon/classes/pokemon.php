<?php 
include_once 'autoLoad.php';
class Pokemon
{
    protected $nom;
    protected $image;
    protected $hp;
    protected $attackPokemon;
    public function __construct($nom, $image, $hp, AttackPokemon $attackPokemon)
    {
        $this->nom = $nom;
        $this->image = $image;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getHp()
    {
        return $this->hp;
    }
    public function getAttackPokemon()
    {
        return $this->attackPokemon;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setHp($hp)
    {
        $this->hp = $hp;
    }
    public function setAttackPokemon(AttackPokemon $attackPokemon)
    {
        $this->attackPokemon = $attackPokemon;
    }
    public function isDead()
    {
        return $this->hp <= 0;
    }
    public function attack(Pokemon $p)
    {
        $attaque=rand($this->attackPokemon->getAttackMinimal(),$this->attackPokemon->getAttackMaximal());
  $val=rand(0,100);
  if($val<=$this->attackPokemon->getProbabilitySpecialAttack())
  {

$attaque*=$this->attackPokemon->getSpecialAttack();
  }

    $p->setHp($p->getHp()-$attaque);
    return $attaque;
    
    }
    public function whoAmI()
    {
        echo'<div class="col-6">';
        echo'<ul class="list-group">';
        echo'<li class="list-group-item">'.$this->getNom().'<img width="150" height="150" class="img-thumbnail" src="'.$this->getImage().'"></li>';
        echo'<li class="list-group-item">Point: '.$this->getHp().'</li>';
        echo'<li class="list-group-item">Min Attack Points: '.$this->attackPokemon->getAttackMinimal().'</li>';
        echo'<li class="list-group-item">Max Attack Points: '.$this->attackPokemon->getAttackMaximal().'</li>';
        echo'<li class="list-group-item">Special Attack: '.$this->attackPokemon->getSpecialAttack().'</li>';
        echo'<li class="list-group-item">Probability Special Attack: '.$this->attackPokemon->getProbabilitySpecialAttack().'</li>';
        echo'</ul>';
        echo'</div>';
    }
}



?>