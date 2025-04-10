<?php
include_once 'autoload.php';

class Etudiant
{
    private $bd;
    public function __construct()
    {
        $this->bd=ConnexionBD::getInstance();
    }

    public function ListeEtudiant()
    {
        $query = "select * from etudiant";
        $req = $this->bd->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);

    }

    public function afficherEtudiant(bool $isAdmin,$etudiants)
    {
        $section = new Section();
        $i = 0;
        foreach ($etudiants as $etudiant) {
        
        echo "<tr>";
            echo "<td>" . $etudiant->id . "</td>";
            echo "<td><img src='" . $etudiant->image . "' width='60' height='60'></td>";
            echo "<td>" . $etudiant->name . "</td>";
            echo "<td>" . $etudiant->birthday . "</td>";
            echo "<td>" . $section->getSectionById($etudiant->section) . "</td>";
            echo "<td><form  method='POST'><button type='submit' name='detail" . $i . "' class='btn btn-link'><img src='https://cdn-icons-png.flaticon.com/512/189/189664.png' alt='Details' width='25' height='25'></button>";
            if ($isAdmin) {
                echo "<button type='submit' name='delete" . $i . "' class='btn btn-link'>
                    <img src='https://icons.veryicon.com/png/o/education-technology/learning-to-bully-the-king/delete-351.png' alt='delete' width='25' height='25'>
                </button>
                <button type='submit' name='edit" . $i . "' class='btn btn-link'>
                    <img src='https://cdn4.iconfinder.com/data/icons/social-messaging-ui-coloricon-1/21/30-512.png' alt='edit' width='25' height='25'>
                </button>
              </form>";
        echo "</tr>";
            } else {
                echo "</form></td></tr>";
            }
        $i++;
    }
    
   }


public function afficher($e)
{
    
    $section=new Section();
    $i=0;
    foreach ($e as $etudiant)
    {
        
        echo "<tr>";
        echo "<td>".$etudiant->id."</td>";
        echo "<td><img src='".$etudiant->image."' width='60' height='60'></td>";
        echo "<td>".$etudiant->name."</td>";
        echo "<td>".$etudiant->birthday."</td>";
        echo "<td>".$section->getSectionById($etudiant->section)."</td>";
        echo "</tr>";
        $i++;

        

    }



}

    public function Filtrer($filter)
    {
        $query ="select * from etudiant where name like ? or birthday like ? or section like ?";
        $req = $this->bd->prepare($query);
        $req->execute(['%' . $filter . '%', '%' . $filter . '%', '%' . $filter . '%']);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    
    
   
public function deleteEtudiant($id)
   {
    $query="delete from etudiant where id=?"; 
    $req=$this->bd->prepare($query);
    $req->execute([$id]);
   }
public function getEtudiantById($id)
   {
    $query="select * from etudiant where id=?";
    $req=$this->bd->prepare($query);
    $req->execute([$id]);
    return $req->fetch(PDO::FETCH_OBJ);
   }
public function updateEtudiant($name,$birthday,$section,$id,$photo)
   {
    $query="update etudiant set name=?,birthday=?,section=?,image=? where id=?"; 
    $req=$this->bd->prepare($query);
    $req->execute([$name,$birthday,$section,$photo,$id]);
   }
public function addEtudiant($name,$birthday,$section,$photo)
   {
    $query="insert into etudiant (name,birthday,section,image) values(?,?,?,?)"; 
    $req=$this->bd->prepare($query);
    $req->execute([$name,$birthday,$section,$photo]);
   }
}
?>