<!DOCTYPE html>
<html>
    <head>
        <title>afspraak insert</title>
        <link rel="stylesheet" href="">
          <meta charset="utf-8">
     </head>
    <?php
    include "afspraken.php";
   
      table($connb);
      ?>
    <body>
    <form action="redirect.php" method="post">
          <p>
             Voornaam:<br>
             <input type="text" name="voornaam" pattern=".{2,}" title="Minimaal 2 tekens" placeholder="Geef uw voorsnaam" required>
             </p>
            <p>
             Achternaam:<br>
             <input type="text" name="achternaam" pattern=".{2,}" title="Minimaal 2 tekens" placeholder="Geef uw achternaam" required>
             </p>
          <p>
             email:<br>
             <input type="text" name="email" pattern=".{2,}" title="Minimaal 2 tekens" placeholder="Geef het email" required>
             </p>
          <p>
             Datum:<br>
             <input id="date" type="date" name="datum" required>
             </p>
         <p>
            <input type="submit" value="Insert">
            <br>
            <br>
            <input type="reset" value="Reset">
         </p>
    </from>
     </body>
</html>