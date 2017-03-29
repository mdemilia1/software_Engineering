<?php
    if($link = mysqli_connect('localhost', 'root', '', 'software_engineering'))
    {
        //echo "here";
        if(isset($_POST['username']) && isset($_POST['pass']))
        {
            if(!empty($_POST['username']) && !empty($_POST['pass']))
            {
                $un = $_POST['username'];
                if( mysqli_num_rows( $checkUser = mysqli_query($link, "select Username, Password FROM users WHERE Username = '$un'") ) >= 1)
                {
                    $user = mysqli_fetch_assoc($checkUser);
                    if($user['Password'] == $_POST['pass'])
                    {
                        if(!$logged)
                        {
                            echo "<script> alert('You have logged in succesfully!');</script>";
                            $logged = true;
                            //making changes
                            //redirect to next page
                        }
                    }
                    else
                    {
                        echo "<script> alert('Login credentials are incorrect');</script>";
                    }
                }
                else
                {
                    echo "<script> alert('Couldnt find user');</script>";
                }
            }
            else
            {
                echo "<script> alert('dont submit empty fields. ass hole.');</script>";
            }
        }

        /*$result = mysqli_query($link, "Select Username, Password FROM users");
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['Username'] = $_POST['username'] && $row['Password'] = $_POST['pass'])
            {
                echo "logged in succesfully"
            }
        }  */
    }

?>
<html>
    <header style = "font-size: 55px; width: 100%; text-align: center;">Welcome to DBL Management!</header>
        <div style = "left: 50%; position: fixed;">
            <div style = "left: -50%; position: relative; margin-top: 50%">
                <h1>LOGIN</h1>
                <div style = "left: -19%; position: relative;">
                    <form action = "index.php" method = "POST">
                        <input type = "text" name = "username" id = "un" placeholder = "User Name"><br>
                        <br><input type = "password" name = "pass" id = "pw" placeholder="Password"><br>
                        <br><button type = "Submit" style = "margin-left: 27%;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</html>
