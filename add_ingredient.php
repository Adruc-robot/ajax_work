<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Ingredient</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <?php
            include ("includes/dbinfo.inc.php");
        ?>
        <div class="thisdumb"><h4>Ingredient management</h4>
            <div class="genFlex">
                <div class="wrapper" id="add_ingredient">
                    <div class="index-login-signup">
                        <h4>add ingredient</h4>
                        <!--<form action="includes/writeto.inc.php" method="post">-->
                        <form action="includes/writeto.inc.php" method="post">
                            <?php 
                                $GLOBALS["returnFile"] = __FILE__;
                            ?>
                            <label for="name">Ingredient name:</label>
                            <input type="text" name="name" placeholder="enter text" maxlength="200">
                            <label for="state">Ingredient state:</label>
                            <select name="state">
                                <?php
                                    $queryString = "select group_concat(thing separator '\n') doot from (select concat(thing,'</option>') thing,'1' doot from (select concat(thing,name) thing from (select concat(thing,'''>') thing,name from (select concat('<option value=''',the_key) thing,name from states order by name) d) d) d) d group by doot;";
                                    $pdo = new PDO($dns, $user, $pass, $opt);
                                    $stmt = $pdo->query($queryString);
                                    $row = $stmt->fetch();
                                    echo $row['doot'];

                                    $stmt->connection = null;
                                ?>
                            </select>
                            <label for="location">Location in store:</location>
                            <select name="location">
                                <?php
                                    $queryString = "select the_key,name from locations order by name;";
                                    $pdo = new PDO($dns, $user, $pass, $opt);
                                    $stmt = $pdo->query($queryString);
                                    $i=1;
                                    while ($row = $stmt->fetch()) {
                                        if ($i<>1) {
                                            echo chr(9).chr(9).chr(9).chr(9).chr(9).chr(9)."<option value='".$row['the_key']."'>".$row['name']."</option>".chr(10);
                                        } else {
                                            echo "<option value='".$row['the_key']."'>".$row['name']."</option>".chr(10);
                                            $i++;
                                        }
                                    }
                                    $stmt->connection = null;
                                ?>
                            </select>
                            <input type="text" name="tablename" class="noShow" value="ingredients" >
                            <input type="text" name="pageOrigin" class="noShow" value="<?php echo basename(__FILE__); ?>">
                            <br>
                            <button type="submit" name="submit">add to db</button>
                        </form>
                    </div>
                </div>    
            </div>
        </div>    
    </body>
</html>