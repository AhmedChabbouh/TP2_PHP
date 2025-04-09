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
    $req->execute([$designation,$description]);
   }
   public function deleteSection($id)
   {
    $query="delete from section where id=?"; 
    $req=$this->bd->prepare($query);
    $req->execute([$id]);
   }
   public function ListeSection()
   {
    $query="select * from section";
    $req=$this->bd->prepare($query);
    $req->execute();
    $sections=$req->fetchAll(PDO::FETCH_OBJ);
    $i=0;
    foreach ($sections as $section)
    {
        $i++;
        echo "<tr>";
        echo "<td>".$section->id."</td>";
        echo "<td>".$section->designation."</td>";
        echo "<td>".$section->description."</td>";
        echo "<td>
              <form  method='POST'>
               <button type='submit' name='detail".$i."' class='btn btn-link'>
                    <img src='' alt='Details' width='25' height='25'>
                </button>
              </form>";
        echo "</tr>";
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
}