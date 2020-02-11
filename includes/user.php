
<?php
require_once "database.php";

class User{
    public function user_authenticate($username, $password)
    {
        global $database;
        //$enc_password = md5($password);

        $stmt = $database->connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");

        $stmt->bind_param('ss', $username, $password);

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

    public function user_register($username, $fullname, $email, $password)
    {
         global $database;
         
         $enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `users` (`username`, `fullname`, `email`, `password`) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $username, $fullname, $email, $enc_password);
        if($stmt->execute()){
            $stmt->close(); 
            return true;
            
        }

    }

}

//$ps = "202cb962ac59075b964b07152d234b70";

//$user = new User();

// $result = $user->user_register("omar", "rashid", "omar@mail", "123");

// if($result)
// {
//     echo var_dump($result);
// }

//$user->user_authenticate("omar", "123");

// if($results)
// {
//      echo "hello world" . "<br>";;

//      var_dump($results) . "<br>";
//     // while($results)
//     // {
//     //     echo $results["id"];
//     //     echo $results["username"];
//     // }

//     // print_r($results);
// }



?>