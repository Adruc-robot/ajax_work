<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Recipe Ingredient</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <?php
            include ("includes/dbinfo.inc.php");
        ?>
        <div class="thisdumb"><h4>Recipe Management</h4>
            <div class="genFlex">
                <div class="wrapper">
                    <div class="index-login-signup">
                        <h4>add recipe ingredients</h4>
                        <form action="includes/writeto.inc.php" method="post">
                            <label for="recipe">Select recipe:</label>
                            <select name="recipe">
                                <?php
                                    $queryString = "select the_key,name from recipes order by name;";
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
                            <label for="ingredient">Select ingredient:</label>
                            <select name="ingredient">
                                <?php
                                    $queryString = "select the_key,name from ingredients order by name;";
                                    $pdo = new PDO($dns, $user, $pass, $opt);
                                    $stmt = $pdo->query($queryString);
                                    $i=1;
                                    while ($row = $stmt->fetch()){
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
                            <label for="amount">How much?</label>
                            <input type="text" maxlength="8" name="amount" placeholder="enter amount">
                            <label for="unit">What unit?</label>
                            <select name="unit">
                                <?php
                                    //$queryString = "select group_concat(thing separator '\n') doot from (select concat(thing,'</option>') thing,'1' doot from (select concat(thing,name) thing from (select concat(thing,'''>') thing,name from (select concat('<option value=''',the_key) thing,name from units order by name) d) d) d) d group by doot;";
                                    $queryString = "select the_key,name from units order by name;";
                                    $pdo = new PDO($dns, $user, $pass, $opt);
                                    $stmt = $pdo->query($queryString);
                                    $i=1;
                                    while ($row = $stmt->fetch()){
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
                            <label for="prep_instructions">Preparation instructions?</label>
                            <input type="text" name="prep_instructions" placeholder="enter text" maxlength="200">
                            <input type="text" name="tablename" class="noShow" value="recipe_ingredients">
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