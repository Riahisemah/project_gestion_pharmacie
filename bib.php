<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    body{
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: linear-gradient(135deg,rgb(39, 152, 239),rgb(71, 8, 68));
    }
    h1{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: rgb(58, 74, 58);
        align-items: center;
        justify-content: center;

    }
    div{
        border-radius: 5px;
        align-items: center;
        width: 120vh;
        height: 70vh;
        justify-content: center;
        background: linear-gradient(100deg,green,rgb(134, 183, 214));
    }
    table{
        margin-left: 120px;
        margin-top: 20px;
        border-radius: 10px;
        border-color: aquamarine;
        justify-items: center;
        align-items: center;
        border: 5px solid gray;
    }

        td{
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        thead{
            background-color: rgb(49, 149, 177);
            color: white;
        }
        .hader:hover{
            background-color: rgb(217, 214, 214);
            transform: scale(0.82);
            box-shadow: 2px 2px 12px rgb(30, 20, 17) rgb(24, 7, 24);
        }
    .hader{
            transition: all 0.2s ease-in;
            cursor: pointer;
        }

    
   

        a input{
            border: 1px solid #3498db;
            background: none;
            padding: 10px 20px;
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            cursor: pointer;
            margin: 20px;
            transitioon: 0.8s;
            position:relative;
            overflow:hidden;
        }
        .btn1 .btn2 .btn3{
            color: #3498db;
        }
        .btn1:hover ,
         .btn2:hover ,
         .btn3:hover{
            color: #fff;
        }
        .btn1::before , 
        .btn2::before ,
        .btn3::before{
            content: '';
            position: absolute;
            left: 0;
            width: 100%;
            height: 100%;
            background: #3498db;
            z-index: -1;
            transition: 0.8s;

        }
        .btn1::before ,
        .btn2::before , 
        .btn3::before{
            top: 0;
            border-radius: 0 0 50% 50%;
            height: 100%;

        }
        .btn1:hover:before , 
        .btn2:hover::before ,
         .btn3:hover:before{
    height: 100%;
        }
</style>
<body>
    <div>
    <h1> </h1>
        <div class="contint">
            <?php
            
               session_start();
               $x=$_SESSION['nom'];

               
               if(empty($_GET['nom'])){
                header("location:erreur.php");
               }
               

               if(!empty($_GET)){
                 echo "bonjour ".$_SESSION['nom'];
                }
                ?>
            
            <h2>list medicament :</h2>

            <?php
           
            try
            {
            $db =new PDO('mysql:host=localhost;dbname=pharmacie;charset=utf8',
            'root', '');
            }
            catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
            
            $sqlQuery = 'SELECT * FROM medicament';
            $requete = $db->prepare($sqlQuery);
            $requete->execute();
            $res = $requete->fetchAll();


            echo "<table>";
            echo "<thead><td>"."code"."</td><td>"."nomcomercial"."</td><td>"."forme"."</td><td>"."prix "."</td></thead>";

            foreach ($res as $et) {
                $x=$et['code'];
                echo '<tr class="hader"><td>'.$et['code'].'</td><td>'.$et['nomcomercial'].'</td><td>'.$et['forme'].'</td><td>'.$et['prix'].'</td>'.'</td></tr>'; 
                
                }
                echo "</table><br><br>";
               

            


               echo "<a href='insert.php?nom=$x'><input class='btn1' type='submit' value='insert'></a>";
               echo "<a href='modify.php?nom=$x'><input class='btn1' type='submit' value='modify'></a>";
               echo "<a href='delete.php?nom=$x'><input class='btn1' type='submit' value='delete'></a>";
              

               ?>
               


            
                
    </div>
</div>
</body>
</html>