<?php
include_once 'connexionBD.php';
class Section
{
    private $bd;
    public function __construct()
    {
        $this->bd=ConnexionBD::getInstance();
    }
   public function ajouterSection($description,$designation)
   {
    $query="insert into section (designation,description) values(?,?)";
    $req=$this->bd->prepare($query);
    req->execute([$designation,$description]);
   }
   public function deleteSection($id)
   {
    $query="delete from section where id=?"; 
    $req=$this->bd->prepare($query);
    req->execute([$id]);
   }
   public function listSection()
   {
    $query="select * from section";
    $req=$this->bd->prepare($query);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
   }
    public function afficherSection()
    {
        $sections = $this->listSection();
        $i=0;
        foreach ($sections as $section)
        {
            echo "<tr>";
            echo "<td>".$section->id."</td>";
            echo "<td>".$section->designation."</td>";
            echo "<td>".$section->description."</td>";
            echo "<td>
                  <form  method='POST'>
                   <button type='submit' name='action".$i."' class='btn btn-link'>
                        <img src='https://cdn-icons-png.flaticon.com/512/5441/5441859.png' alt='Details' width='25' height='25'>
                    </button>
                  </form>";
            echo "</tr>";
            $i++;
        }



    }
    public function getSectionById($id)
    {
     $query="select * from section where id=?";
     $req=$this->bd->prepare($query);
     $req->execute([$id]);
     $section=$req->fetch(PDO::FETCH_OBJ);
     return $section->designation;
    }
    public function getSectionId($designation)
    {
     $query="select * from section where designation=?";
     $req=$this->bd->prepare($query);
     $req->execute([$designation]);
     $section=$req->fetch(PDO::FETCH_OBJ);
     if($section==null)
     {
        return null;
     }
     return $section->id;
    }
    public function getEtudiantBySection($id)
    {
     $query="select * from etudiant where section=?";
     $req=$this->bd->prepare($query);
     $req->execute([$id]);
     return $req->fetchAll(PDO::FETCH_OBJ);
    }
}