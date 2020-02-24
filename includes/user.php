
<?php
require_once "database.php";
require_once "sessions.php";

class User{

    public function user_authenticate($username, $password)
    {
        global $database;

        $enc_password = md5($password);

        $stmt = $database->connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");

        $stmt->bind_param('ss', $username, $enc_password);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }

    }


    public function check_user($username, $email)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `email` = ?");

        $stmt->bind_param('ss', $username, $email);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }
    }

    public function user_register($fullname,$username, $email, $password)
    {
         global $database;
         
         $enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `users` (`fullname`,`username`,`email`, `password`) VALUES (?,?,?,?)");

        $stmt->bind_param('ssss', $fullname,$username,$email, $enc_password);

        if($stmt->execute()){
            $stmt->close(); 
            return true;
            
        }

    }

}

// $user = new User();
// $session = new Session();

// $errors = array();

// $result = $user->user_register("omar", "rashid", "omar@mail", "123");

// if($result)
// {
//     echo var_dump($result);
// }

// $found_user = $user->user_authenticate("omar", 123);

// if($found_user)
// {
//     $user_id = "";
//     $username = "";
//     while($results = $found_user->fetch_assoc())
//     {
//         $user_id = $results["id"];
//         $username = $results["username"];
//     }

//     echo $user_id . "<br>";
    
//     echo $username;

//     $session_values = $session->create_session($user_id, $username);

//     if($session_values['id'] && $session_values['username']){
         
//         header('Location: ../index.php');	
//     }else{

//         $errors[] = "wrong username and password";
//     }

// }

?>
