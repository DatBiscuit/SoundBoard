<html>
    <head>
        <title>Sound Board</title>
        <link rel="stylesheet" href="css/main.css">
        <script>
            function playSound(elem) {
                var s = new Audio('media/' + elem.getAttribute('data-file'));
                s.currentTime=0; 
                s.play();
            }
        </script>
    </head>
    <body>
        <?php
            $user = $pswd = "";

        ?>
        <div id="top">    
            <div>
                <h1>Sound Board</h1>
                <h3>By Jennifer Borucki</h3>
            </div>
            <div id="formArea">

                <div id="loginForm">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <input name="usr" type="text" placeholder="user name" value="<?php echo $user; ?>">
                        <input name="pswd" type="password" placeholder="password">
                        <input type="submit" value="Login">
                    </form>
                </div>
                <?php 
                    include 'script/config.php';
                    
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        $userFlag = $pswdFlag = false;
                        if(!empty($_POST["usr"])) {
                            $user = $_POST["usr"];
                            if($user == $userAdmin) {
                                $userFlag = true;
                            }
                        }
                        
                        if(!empty($_POST["pswd"])) {
                            $pswd = $_POST["pswd"];
                            if($pswd == $pswdAdmin) {
                                $pswdFlag = true;
                            }
                        }
                        
                        if($pswdFlag && $userFlag) {
                            echo "Correct login";
                            echo  
                            "<script>
                            const elem = document.getElementById('loginForm');
                            elem.remove();
                            </script>
                            <form action='script/upload.php' method='post' enctype='multipart/form-data'>
                            Select media to upload:
                            <input type='file' name='fileForUpload' id='fileForUpload'>
                            <input type='submit' value='Upload Image' name='submit'>
                            </form>
                            
                            ";
                        } else {
                            echo "Incorrect password / username";
                        }
                    }
                    ?>
            </div>
        </div>

        <div id="buttons">

        <?php
        // Includes
        include 'script/db_connection.php';
        include 'script/config.php';

        // Open Connection
        $conn = OpenCon();

        // Query Setup
        $sql = "SELECT soundName, fileName FROM `sounds` WHERE 'sounds' IS NOT NULL";
        $result = $conn->query($sql);

        // Create Buttons 
        while ($row = mysqli_fetch_array($result)) {
            echo $buttonTagStart . $buttonDataName . $row[0] . " " . $buttonDataFile . $row[1] . 
                $buttonTagEnd . $row[0] . $buttonContainerTagEnd;
        }

        // Close Connection
        CloseCon($conn);
        ?>

        </div>
    </body>
</html>