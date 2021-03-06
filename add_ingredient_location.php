<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Ingredient Location</title>
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
                <div class="wrapper" id="add_location">
                    <div class="index-login-signup">
                        <h4>add ingredient location in the store</h4>
                        <form action="includes/writeto.inc.php" method="post">
                            <label for="name">Location name:</label>
                            <input type="text" name="name" placeholder="enter text" maxlength="200">
                            <input type="text" name="tablename" class="noShow" value="locations" >
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