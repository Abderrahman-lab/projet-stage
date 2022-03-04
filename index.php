<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="etudiant.css">
    <title>Document</title>
</head>
<body dir="rtl">
<?php
try{
    $conn =mysqli_connect('localhost','root','','student');
}catch(exeption $e){
    $e->GetMessage();
}
$res=mysqli_query($conn,'SELECT * FROM student');
    if(isset($_POST['add'])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $adresse=$_POST["adresse"];
        $req = "insert into student(name,adresse) values ('$name','$adresse')";
        $res = mysqli_query($conn, $req);
        header("location: index.php");
    }
    if(isset($_POST['sup'])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $adresse=$_POST["adresse"];
        $sql="DELETE FROM student WHERE id='$id'";
        mysqli_query($conn,$sql);
        header("location:index.php");
    } 
?>

    <div id='mother'>
    <form action="" method="post">
        <aside>
            <div id="div">
                <!---tableau de canduire----->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_m65Dwh9IgTs1PMrRSvw9rMcqgqOAHj3TIg&usqp=CAU" alt="Logo de Site" width="250px">
                <h2>Gestion des etudants</h3>
                <label for="">numero d'etudiant :</label><br>
                <input type="number" name="id"><br>
                <label for="">Nom d'etudiant : </label><br>
                <input type="text" name="name"><br>
                <label for="">Adresse d'etudiant:</label><br>
                <input type="text" name="adresse"><br><br>
                <input type="submit" name="add" value="ajouter"><br><br>
                <input type="submit" name="sup" value="suprimer">
               <!-- <button name="add">Ajouter</button>-->
                 <!--<button name="sup">Suprimer</button>-->
            </div>
        </aside>
        </form>
        <!---tableau des donnees--->
        <main>
            <table id="tbl">
                <tr>
                    <th>Nombre d'etudiant</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                </tr>
                <?php
                   while($row=mysqli_fetch_array($res)){
                       //while($row=$res->fetch()){ 
                echo "<tr>";
                echo "<th>".$row["id"]."</th>";
                echo "<th>".$row["name"]."</th>";
                echo "<th>".$row["adresse"]."</th>";
                echo"</tr>";
                }
                ?>

            </table>
        </main>
    
    </div>
</body>
    
</html>