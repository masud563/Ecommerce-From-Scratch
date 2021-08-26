<?php
session_start();

//initialising variable
$username= "";
$email= "";
$password="";
$errors=array();
//connect to db

$db= mysqli_connect('localhost','root','','practice') or die("could not connect to DB");

//register user
if(isset($_POST['reg_user'])) {
//Recieve all input  from registration
$username = mysqli_real_escape_string($db, $_POST['username']);

$email = mysqli_real_escape_string($db, $_POST['email']);

$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


//form validation

if(empty($username))
 {
     array_push($errors, "Username is required");
    }
if(empty($email)) 
{
    array_push($errors, "Email is required");
}
if(empty($password_1)) 
{
    array_push($errors, "Password is required");
}
if($password_1 != $password_2)
{
    array_push($errors, "Password do not match");
}


//check db for existing info

$user_check_query ="SELECT * FEOM 'user'  WHERE username = '$username' or email='$email' limit 1";
$results= mysqli_query($db , $user_check_query);
$user =mysqli_fetch_assoc($results);
if($user){
    if($user['username']=== $username){array_push($errors, "Username already exists");}
    if($user['email']=== $email){array_push($errors, "email already exists");}
}

//register the user

if(count($errors) == 0){
    $password = md5($password_1);//encrypt pass
    $query= "INSERT INTO user (username, email ,password) VALUES('$username', '$email','$password' )";
    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header('location: index.php');
}

}
//login user

if(isset($_POST['login_user'])){

    $username= mysqli_real_escape_string($db, $_POST['username']);
    $password= mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }

    if(empty($password)){
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0 ){
        $password = md5($password);
        $query="SELECT * FROM user WHERE username='$username' AND password= '$password'";
        $results=mysqli_query($db, $query);

        if(mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = " Logged in success";
            header('location: index.php');
        }
        else {
            array_push($errors, "wrong user/pass");

        }
        
    }
}


?>