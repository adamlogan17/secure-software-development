<html>
    <head>
        <link href="../css/style.css" type="text/css" rel="stylesheet">

        <title>SQLi Example and Code Rewrite</title>
    </head>

    <body>
        <div class="wrapper">
            <h2 class="title" id="site-title">Results</h2>

            <div class="row">
                <div class="full-col">
                    <?php
                    $servername = "localhost";
                    $dbusername = "root"; // replace with your username
                    $dbpassword = ""; // replace with your password
                    $dbname = "csc3063";

                    // Create connection
                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    echo "Connected successfully <br> <br>";

                    $username = $_GET["username"];
                    $password = $_GET["password"];

                    $conn->query("DROP PROCEDURE IF EXISTS getUser");

                    $procedure = "CREATE PROCEDURE getUser(IN username_in VARCHAR(100), IN password_in VARCHAR(100)) SELECT * FROM users WHERE username=password_in AND password=password_in";

                    $conn->query($procedure);

                    $sql = "CALL getUser('" . $username . "', '" . $password . "')";
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo $row["username"] . ":" . $row["password"] . "<br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    
                    <br>
                    <br>

                    <a class="labelButton" href="../index.php">Go Back</a>

                </div>
            </div>
        </div>
    </body>
</html>