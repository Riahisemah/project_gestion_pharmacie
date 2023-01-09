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
    .container{
        max-width: 700px;
        width: 100%;
        background-color: white;
        padding: 25px 30px ;
        border-radius: 5px;
    }
    .container .title{
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }
    .container .title::before{
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        background: linear-gradient(153deg,rgb(39, 152, 239),rgb(71, 8, 68));
    }
    .container form .user-detaile
    {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin:20px 0 12px 0;

    }
    form .user-detaile .impotbox{
        margin-bottom: 15px;
        width: calc(100%/2 - 20px);
    }
    .user-detaile .impotbox .detaie{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;

    }
    .user-detaile .impotbox input{
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid whitesmoke;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;

    }
   .user-detaile .impotbox input:focus,
    .user-detaile .impotbox input:hover{
        border-color: rgb(253, 72, 190);
    }
    .user-detaile .impotbox input:valid{
        border-color: aquamarine;
    }
    form .button input {
        height: 100%;
        width: 100%;
        outline: none;
        color: rgb(255, 255, 255);
        border: none;
        font-size: 18px;
        font-weight: 500;
        border-radius: 5px;
        border-radius: 5px;
        letter-spacing: 1px;
        background: linear-gradient(133deg,rgb(39, 152, 239),rgb(71, 8, 68));

    }
    form .button :hover{
        background: linear-gradient(-190deg,rgb(39, 152, 239),rgb(71, 8, 68));

    }
</style>

<body>
<?php

if(!empty($_GET)){
    $x1=$_GET['code'];
    $x2=$_GET['nom'];
    $x3=$_GET['forme'];
    $x4=$_GET['prix'];
}

    ?>
    
    
    
   <div class="container">
    <div class="title">modify</div>
        <form  action="modify_2.php" method="POST">
            <div class="user-detaile">
                <div class="impotbox">
                    <span class="detaie">code</span>
                   <?php echo "<input type='number' name='a1' value='$x1' placeholder='entre plasse' required>";?>
                </div>
                
                <div class="impotbox">
                    <span class="detaie">nomcomrcial</span>
                    <?php echo "<input type='text' name='a2' value='' placeholder='entre plasse' required>";?>
                </div>
                <div class="impotbox">
                    <span class="detaie">form</span>
                    <?php echo "<input type='text' name='a3' value='' placeholder='entre plasse' required>";?>
                </div>
                <div class="impotbox">
                    <span class="detaie">prix</span>
                    <?php echo "<input type='number' name='a4' value='' placeholder='entre plasse' required>";?>
                </div>
                
               
            </div>
            <div class="button">
                <input type="submit" value="modify">
            </div>
        </form>


        <?php
        session_start();
            if (!empty($_POST))
            {
            $code=$_POST['a1'];
            $nom=$_POST['a2'];
            $forme=$_POST['a3'];
            $prix=$_POST['a4'];

            try
            {
            $db =new PDO('mysql:host=localhost;dbname=pharmacie;charset=utf8',
            'root', '');
            }
            
            catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
            
            
            
            
            
            $sqlQuery = "UPDATE medicament SET
            nomcomercial='$nom',forme='$forme',prix='$prix'
            WHERE code=$code";
            $requete = $db->prepare($sqlQuery);
            $requete->execute();
            
            
            


            if($requete==true){
                $x=$_SESSION['nom'];
                header("location:bib.php?nom=$x");
            }else{
                
            }

        

            
            
            }
        ?>
    

   </div>
</body>
</html>