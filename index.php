<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KONVERSI BITCOIN</title>
    <style>
        .error {color: #FF0000;} 
        .submit {background-color: #4CAF50;color: #FF0000;}
        .submit:hover {background-color: #3e8e41;}
        .txt {background-color: #008CBA; color: #FF0000;}
        .txt:hover {background-color: #68f3f8}
    </style><!--ini syntax css fungsinya buat warnain yg ada di dlm websitenya-->
</head>
<body>  
    <?php
        include ("method.php");
        $bitcoinErr = "";
        $bitcoin = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST")  
        {
            if (empty($_POST["bitcoin"])) {
                $bitcoinErr = "Wajib diisi!";
            } else { 
                 // ngecheck klo yg dimasukkin itu cmn angka
                if (!preg_match('~[0-9]+~', $_POST["bitcoin"])) {
                    $bitcoinErr = "Hanya Angka Saja yang bisa dinput";
                }else {
                    $bitcoin = $_POST["bitcoin"]; 
                }
            }
        }     
    ?>

    <h2>KONVERSI BITCOIN</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    bitcoin: <input type="text" class= "txt" name="bitcoin" placeholder="Masukan jumlah bitcoin">
    <span class="error">* <?php echo $bitcoinErr;?></span> <!--span fungsinya buat nampilin kalimat "Wajib diisi!"-->
    <br><br>
    <input type="submit" class="submit" name="submit" value="Convert">  
    </form>
    <?php
        if (!$bitcoinErr == "Wajib diisi!")  
        {
            $kelas = new konversi($bitcoin);
            echo"<h2>MENAMPILKAN KONVERSI: </h2>"; 
            $hasil = $kelas->getbitcoin();
            $hasil1 = $kelas->getbitcoin1();
            echo"<ul>"; 
            echo rupiah($hasil) . "<br>";
            echo dollar($hasil1) . "<br>";
            echo"<ul>"; 
        }
    ?>
</body>
</html>