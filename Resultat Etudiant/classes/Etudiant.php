<?php
class Etudiant
{
    private $nom;
    private $notes;

    public function __construct($nom, ...$arg)
    {
        $this->nom = $nom;
        $this->notes = $arg;
    }

   public function affiche()
    {
        echo '<ul class="list-group">';
        echo '<li class="list-group-item list-group-item-secondary">'."Nom: " . $this->nom . "</li>";
        foreach ($this->notes as $note) {
            if($note < 10){
                echo '<li class="list-group-item list-group-item-danger">'. $note . "</li>";}
            elseif($note == 10 ){
                echo '<li class="list-group-item list-group-item-warning">'. $note . "</li>";}
            else{
                echo '<li class="list-group-item list-group-item-success">'. $note . "</li>";
        }
    }
}
    public function moyenne()
    {
        $somme = 0;
        foreach ($this->notes as $note) {
            $somme += $note;
        }
        return $somme / count($this->notes);
    }
    public function resultat()
    {
        if ($this->moyenne() >= 10) {
            echo "admis";
        } else {
            echo "non admis";
        }
    }


}
?>