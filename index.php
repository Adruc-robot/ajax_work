<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recipe Maintenance</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>
    <body>
        <section class="heading"><h1 id="recipe_name"></h1></section>
        <?php
            include ("includes/dbinfo.inc.php");
        ?>
        <section class="input_region" id="recipe">
            <h4>Recipe name</h4>
            <form action="includes/writeto.inc.php" method="post">
                <label for="name">Enter recipe name:</label>
                <input type="text" name="name" placeholder="enter text" maxlength="200">
                <input type="text" name="tablename" class="noShow" value="recipes" >
                <input type="text" name="pageOrigin" class="noShow" value="<?php echo basename(__FILE__); ?>">
                <br>
                <button type="submit" name="submit">add to db</button>
            </form>
        </section>
        <section class="input_region" id="recipe_ingredients">
            <h4>Recipe ingredients</h4>
            <form action="includes/writeto.inc.php" method="post">
                <input type="number" name="recipe" class="recipe_holder">
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
        </section>
        <section class="input_region" id="recipe_steps">
            <h4>Recipe steps</h4>
            <form action="includes/writeto.inc.php" method="post">
                <label for="recipe">Select the recipe</label>
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
                <label for="step_number">Which step?</label>
                <input type="number" step="1" name="step_number">
                <label for="step_text">Input the step text:</label>
                <textarea name="step_text" rows="4" cols="50">enter text</textarea>
                <input type="text" name="tablename" class="noShow" value="recipe_steps">
                <input type="text" name="pageOrigin" class="noShow" value="<?php echo basename(__FILE__); ?>">
                <br>
                <button type="submit" name="submit">add to db</button>
            </form>
        </section>
        <script src="app/scripts.js" charset="utf-8"></script>
    </body>
</html>