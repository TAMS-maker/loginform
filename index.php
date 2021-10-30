

<html>

        <head>
            <title> Registration Porn </title>
           
        </head>
        <?php


include ('connect.php');

if (isset($_POST['Register']))
{
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $User = $_POST['User'];
    $Password = $_POST['Password'];


    $sql = "INSERT INTO userinfo VALUES ('','$Fname','$Lname','$Gender','$Age','$Email','$User','$Password')";

    mysqli_query($connect,$sql);

    session_start();

    $_SESSION['Fname'] = $Fname;
    $_SESSION['Lname'] = $Lname;
    $_SESSION['Gender'] = $Gender;
    $_SESSION['Age'] = $Age;
    $_SESSION['Email'] = $Email;
    $_SESSION['User'] = $User;

    header ('location: home.php');
    exit ();

}

if (isset($_POST['Login']))
{


    $User = $_POST['User'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM userinfo WHERE User = '$User' ";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
    $numrow = mysqli_num_rows($result);

    if ($numrow > 0)
    {

        $dbpassword = $row['Password'];

        if ($Password == $dbpassword)
        {
            session_start();
            $_SESSION['Fname'] = $row['Fname'];
            $_SESSION['Lname'] = $row['Lname'];
            $_SESSION['Gender'] = $row['Gender'];
            $_SESSION['Age'] = $row['Age'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['User'] = $row['User'];

            header ('location: home.php');
            exit ();

        }

        else

        {
            echo 'Mali ka Kupal.';
        }

    }

    else
    {
        echo 'Ang iyong Username ay wala pa sa aming listahan';
        echo '<br />';

    }

}


?>

        <body>



        <div id ="qwe">
        <form action="index.php" method="POST">
                <p> Log-in </p>
                <input type="text" name="User" placeholder="Username" required/>
                <input type="Password" name="Password" placeholder="Password" required/><br /> <br />
                <div id="b">
                <button type="submit" name="Login">Login</button>
                </div>
        </form>
        </div>

        <div id ="zxc">
        <form action="index.php" method="POST">
                <p> Sign-up </p>
                <input type="text" name="Fname" placeholder="First Name" required/><br /><br />
                <input type="text" name="Lname" placeholder="Last Name" required/><br /><br />
                <input type="text" name="Gender" placeholder="Gender" required/><br /><br />
                <input type="text" name="Age" placeholder="Age" required/><br /><br />
                <input type="text" name="Email" placeholder="E-mail" required/><br /><br />
                <input type="text" name="User" placeholder="Username" required /><br /><br />
                <input type="Password" name="Password" placeholder="Password" required/><br /><br />
                <div id="a">
                <button type="submit" name="Register">Register</button>
                </div>
        </form>
        </div>
        
      

    </body>


</html>