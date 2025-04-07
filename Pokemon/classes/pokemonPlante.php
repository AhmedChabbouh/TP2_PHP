<?php class PokemonPlante extends Pokemon
{
    public function __construct($nom, $image, $hp, AttackPokemon $attackPokemon)
    {
        parent::__construct($nom, $image, $hp, $attackPokemon);
    }
    public function attack(Pokemon $p)
    {
        if($p instanceof PokemonEau){
            $attaque=rand($this->attackPokemon->getAttackMinimal(),$this->attackPokemon->getAttackMaximal());
            $val=rand(0,100);
            if($val<=$this->attackPokemon->getProbabilitySpecialAttack())
            {
                $attaque*=$this->attackPokemon->getSpecialAttack();}
            $attaque*=2;
            $p->setHp($p->getHp()-$attaque);
            return $attaque;
        }
        elseif($p instanceof PokemonFeu)
        {
            $attaque=rand($this->attackPokemon->getAttackMinimal(),$this->attackPokemon->getAttackMaximal());
            $val=rand(0,100);
            if($val<=$this->attackPokemon->getProbabilitySpecialAttack())
            {
                $attaque*=$this->attackPokemon->getSpecialAttack();}
            $attaque*=0.5;
            $p->setHp($p->getHp()-$attaque);
            return $attaque;
        }
        else
        {return parent::attack($p);}
    }
}
?>