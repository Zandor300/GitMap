<?php
$page = "login";
include_once 'template/head.php';
?>

    <br><br>
    <div class="jumbotron jumbotron-page">
        <div class="container">
            <h1>Login</h1>
        </div>
    </div>

    <div class="container content">
        <div class="row">

            <div class="col-md-9">
                <?php if (!isset($_SESSION['username'])) {
                    if ($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
                        <form method="post" action="">
                            <div class='input-group'>
                                <span class='input-group-addon'>Gebruikersnaam</span>
                                <input id="username" class='form-control' type='text' name='username'
                                       onchange="lcheckinput()" onpaste="this.onchange()" oninput="this.onchange()">
                            </div>
                            <br>

                            <div class='input-group'>
                                <span class='input-group-addon'>Wachtwoord</span>
                                <input id="password" class='form-control' type='password' name='password'>
                            </div>
                            <br>
                            <input type="submit" value="Login" name="login" class="btn btn-info">
                        </form>
                    <?php
                    } else {
                        /* so, the form has been posted, we'll process the data in three steps:
                            1.  Check the data
                            2.  Let the user refill the wrong fields (if necessary)
                            3.  Varify if the data is correct and return the correct response
                        */
                        $errors = array(); /* declare the array for later use */

                        if (!isset($_POST['username'])) {
                            $errors[] = 'Het is verplicht om een gebruikersnaam op te geven.';
                        }

                        if (!isset($_POST['password'])) {
                            $errors[] = 'Het is verplicht om een wachtwoord op te geven.';
                        }

                        if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
                            echo 'Sommige velden zijn incorrect ingevoerd. <a href="login.php">Probeer het opnieuw.</a>';
                            echo '<ul>';
                            foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
                                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
                            }
                            echo '</ul>';
                        } else {
                            //the form has been posted without errors, so save it
                            //notice the use of mysql_real_escape_string, keep everything safe!
                            //also notice the sha1 function which hashes the password
                            $sql = "SELECT
										*
									FROM
										users
									WHERE
										username = '" . mysql_real_escape_string($_POST['username']) . "'
									AND
										password = '" . sha1($_POST['password']) . "'";

                            $result = mysql_query($sql);
                            if (!$result) {
                                //something went wrong, display the error
                                echo 'Iets ging fout bij het verbinden met de database. Probeer het later opnieuw.';
                                //echo mysql_error(); //debugging purposes, uncomment when needed
                            } else {
                                //the query was successfully executed, there are 2 possibilities
                                //1. the query returned data, the user can be signed in
                                //2. the query returned an empty result set, the credentials were wrong
                                if (mysql_num_rows($result) == 0) {
                                    echo 'Deze gebruikersnaam en/of wachtwoord bestaat niet in onze database. <a href="login.php">Probeer het opnieuw.</a>';
                                } else {
                                    //set the $_SESSION['signed_in'] variable to TRUE
                                    $_SESSION['signed_in'] = true;

                                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                                    while ($row = mysql_fetch_assoc($result)) {
                                        $_SESSION['id'] = $row['id'];
                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['fullname'] = $row['fullname'];
                                        $_SESSION['rank'] = $row['rank'];
                                    }

                                    echo 'Welkom, ' . $_SESSION['username'] . '. <a href="admin.php?page=home">Ga naar het admin paneel</a>.';
                                }
                            }
                        }
                    }
                } else {
                    echo 'U bent al ingelogt! <a href="admin.php?page=home">Ga naar het admin paneel</a> of <a href="logout.php">log uit</a>.';
                }
                ?>
            </div>

            <div class="col-md-3">
                <?php include_once 'template/sidebar.php'; ?>
            </div>

        </div>
    </div>

<?php
include_once 'template/footer.php';
?>