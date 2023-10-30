<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="baner">
        <h1>Moja biblioteka</h1>
    </div>
    
    
    <div class="main">
        <div class="naglowek">
            <h3>Autor</h3>
            <h3>Tytuł</h3>
            <h3>Rok wydania</h3>
        </div>
    
        <?php 
            $conn = mysqli_connect("localhost","root","","biblioteka");
            $zapytanie = "SELECT id,autor,tytul,rok_wydania FROM ksiazki";
            $res = mysqli_query($conn, $zapytanie);
            while ($wynik = mysqli_fetch_row($res)){
                echo '<div class="tabelka">
                <div class="tabela1">' . $wynik[1] . '</div>
                <div class="tabela2">' . $wynik[2] . '</div>
                <div class="tabela3">' . $wynik[3] . '</div>
                <div class="usun">
                <form method="post">
                    <input type="hidden" name="delete1" id="delete1" value='.$wynik[0].'><button name="delete" id="delete" class="btn"><i class="fa fa-trash"></i></button>
                </form>
                </div>
                
              </div>';
            }

            if (isset($_POST['delete'])){
                $id = $_POST['delete1'];
                $zapytanie3 = "DELETE FROM ksiazki WHERE `ksiazki`.`id` = '$id'";
                $res3 = mysqli_query($conn, $zapytanie3);
                header("Location: biblioteka.php");
            }

            if (isset($_POST['dodaj'])) {
                $autor = $_POST['autor'];
                $tytul = $_POST['tytul'];
                $date = $_POST['date'];
                $zapytanie2 = "INSERT INTO `ksiazki`(`id`, `autor`, `tytul`, `rok_wydania`) VALUES (null,'$autor','$tytul','$date')";
                $res2 = mysqli_query($conn, $zapytanie2);
                header("Location: biblioteka.php");
            }
         ?> 
    
    
    <form action="" method="POST" class="wpis">
        <input type="text" name="tytul" id="tytul" class="tytul" placeholder="Podaj tytuł książki"><br>
        <input type="text" name="autor" id="autor" class="autor" placeholder="Podaj Autora"><br>
        <input type="text" name="date" id="date" class="date" placeholder="Podaj rok wydania">
        <button class="dodaj" name="dodaj" id="dodaj">Dodaj książkę</button>  
    </form>
    </div>
    
    <div class="footer">

    </div>
</body>
</html>