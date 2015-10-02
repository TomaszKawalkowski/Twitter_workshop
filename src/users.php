<?php
/*
CREATE TABLE Users(

    user_id INT AUTO_INCREMENT,
    email VARCHAR(60) UNIQUE,
    password CHAR(60),
    description VARCHAR(255),
    PRIMARY KEY (user_id)
)
*/

class User
{
    static private $conn;
    private $id;
    //private $userName;
    private $email;
    private $description;

    /* - funkcje statyczne - login, rejestrator - nie działają na obiekcie bo go jeszcze nie ma, funkcje statyczne działają na klasie*/


    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    static public function logIn($email, $password)
    {
        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $result = self::$conn->query($sql);

        if ($result == true) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    $loggedUser = new User($row['user_id'], $row["email"], $row["description"]);
                    return $loggedUser;
                }
                return false;
            }
        }
    }

    static public function register($newEmail, $password, $password2, $newDescription)
    {
        if ($password != $password2) {
            return false;
        }
        $hasshedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO Users(email, password, description) VALUES ('$newEmail', '$hasshedPassword', '$newDescription');";

        $result = self::$conn->query($sql);

        if ($result == true) {
            $newId = self::$conn->insert_id;
            $newUser = new User($newId, $newEmail, $newDescription);
            return $newUser;
        }
        echo(self::$conn->error);
        return false;
    }

    static public function getUserById($id){
        $sql = "SELECT * FROM Users WHERE user_id = $id";
        $result = self::$conn->query($sql);
        if($result == true){
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $loggedUser = new User ($row['user_id'], $row['email'], $row['description']);
                return $loggedUser;
            }
        }
    }

    public function __construct($newId, $newEmail, $newDescription)
    {
        $this->id = $newId;
        $this->email = $newEmail;
        $this->setDescription($newDescription);

    }

    public function saveToDB()
    {
        $sql = "UPDATE Users SET description='{$this->description}' WHERE user_id='{$this->id}'";
        $result = self::$conn->query($sql);
        return $result;
    }

    public function getid()
    {
        return $this->id;
    }

    public function setUserName($newUserName)
    {
        if (is_string($newUserName) && strlen($newUserName) < 60) {
            $this->userName = $newUserName;
        }
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setDescription($newDescription)
    {
        if (is_string($newDescription) && strlen($newDescription) < 255) {
            $this->description = $newDescription;
        }
    }

    public function createTweet($tweetText)
    {
        //TODO: After implementing tweet add functionality to create new Tweet
    }

    public function getAllTweets(){
    $ret = [];
        //TODO:After implementign tweet add functionality load all tweets by user to table
    }
    public function createComents(){

        //TODO: aFTER IMPLEMENTING COMMENT ADD FUNCTIONALY to create new comment
    }
    public function getAllComents(){
        $ret = [];
        //TODO: aFTER IMPLEMENTING COMMENT ADD FUNCTIONALY LOAD ALL commentd
    }
    public function getAllUsers(){
        $ret = [];
        $sql = "SELECT * FROM Users";
        var_dump($sql);
        $result = self::$conn->query($sql);
        if($result == true){
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $loadedUser = new User($row['user_id'], $row['email'], $row['description']);
                    $ret[] = $loadedUser;
                }
            }

        }
        return $ret;
    }
}



