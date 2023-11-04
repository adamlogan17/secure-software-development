<!DOCTYPE html>

<html>
    <head>
        <link href="css/style.css" type="text/css" rel="stylesheet">

        <title>SQLi Example and Code Rewrite</title>
    </head>

    <body>
        <div class="wrapper">

            <h2 class="title" id="site-title">SQLi Example and Code Rewrite</h2>

            <br>

            <?php
                $servername = "localhost";
                $username = "root"; // your username
                $password = ""; // your password
                $dbname = "csc3063";

                // Create connection
                $conn = new mysqli($servername, $username, $password);

                // Check connection
                if ($conn->connect_error) {
                    die("<p>Connection failed: " . $conn->connect_error . "<p>");
                }

                // Create database
                $dbSql = "CREATE DATABASE IF NOT EXISTS csc3063";
                if ($conn->query($dbSql) === TRUE) {
                    echo "<p>Database created successfully</p>";
                } else {
                    echo "<p>Error creating database: " . $conn->error . "</p>";
                }

                $conn->close();

                $conndb = new mysqli($servername, $username, $password, $dbname);

                // Create the table
                $tableSql = "CREATE TABLE IF NOT EXISTS users (
                    userId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL,
                    password VARCHAR(30) NOT NULL
                    )";
                if ($conndb->query($tableSql) === TRUE) {
                    echo "<p>Table created successfully</p>";
                } else {
                    echo "<p>Error creating table: " . $conndb->error . "</p>";
                }

                // Inserts the data, with an UPSERT (requires the userId to be inserted directly to allow for UPSERT to work correctly)
                $dataSql = "REPLACE INTO users (userId, username, password) VALUES (1, 'admin','admin'),(2, 'john', 'pass'), (3, 'adam', 'secureP@55')";
                if ($conndb->query($dataSql) === TRUE) {
                    echo "<p>Data entered successfully</p>";
                } else {
                    echo "<p>Error entering data: " . $conndb->error . "</p>";
                }

                $conndb->close();
            ?>

            <div class="row">
                <div class="full-col">
                    <h3 class="title">Vulnerable Form</h3>
                    <br>
                    <form action="php/injectionVul.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>
                        <input type="submit" value="Start" hidden="hidden" id="start-vul">
                        <label class="labelButton" for="start-vul">Start</label>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="full-col" id="input-data-section">
                    <h3 class="title">Input Sanitation</h3>
                    <br>

                    <form action="php/blacklist.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>

                        <input type="submit" value="Start" hidden="hidden" id="start-blacklist">
                        <label class="labelButton" for="start-blacklist">Start</label>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="full-col">
                    <h3 class="title">Escaping</h3>
                    <br>

                    <form action="php/escaping.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>

                        <input type="submit" value="Start" hidden="hidden" id="start-escape">
                        <label class="labelButton" for="start-escape">Start</label>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="full-col">
                    <h3 class="title">Parameterised Input</h3>
                    <br>

                    <form action="php/parameterisedInput.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>

                        <input type="submit" value="Start" hidden="hidden" id="start-param">
                        <label class="labelButton" for="start-param">Start</label>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="full-col">
                    <h3 class="title">Stored Procedure</h3>
                    <br>

                    <form action="php/storedProcedures.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>

                        <input type="submit" value="Start" hidden="hidden" id="start-stored">
                        <label class="labelButton" for="start-stored">Start</label>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="full-col">
                    <h3 class="title">All Prevention Techniques</h3>
                    <br>

                    <form action="php/allTechniques.php" method="get">
                        <div class="data-input">
                            <label for="username" class="text-left">Username:</label>
                            <input id="username" class="entry" type="text" name="username">
                            <br>

                            <label for="password">Password:</label>
                            <input id="password" class="entry" type="text" name="password">
                            <br>
                        </div>

                        <input type="submit" value="Start" hidden="hidden" id="start-all">
                        <label class="labelButton" for="start-all">Start</label>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
