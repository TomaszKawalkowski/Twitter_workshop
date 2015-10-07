<?php

/**
 * CREATE TABLE Tweets)
 * tweet_id INT AUTO_INCREMENT,
 * text VARCHAR(140) NOT NULL,
 * creation_date DATETIME,
 * user_id INT,
 * PRIMARY KEY(tweet_id),
 * FOREIGN KEY(user_id) REFERENCES Users(user_id) ON DELETE CASCADE
 * }
 */
class Tweet
{

    static private $conn;
    private $id;
    private $userId;
    private $text;
    private $createDate;

    public static function setConnection(mysqli $newConnection)
    {
        self::$conn = $newConnection;
    }

    public static function createTweet($userId, $text)
    {
        if (is_string($text) && strlen($text) <= 140) {
            $sql = "INSERT INTO Tweets(text, creation_date, user_id) VALUES ('$text',NOW(), $userId)";
            $result = self::$conn->query($sql);
            if ($result == true) {
                $myTweet = new Tweet(self::$conn->insert_id, $userId, date('Y-m-d H:i:s'), $text);
                return $myTweet;
            }
        }
        return false;
    }

    public function loadAllTweets()
    {
        $sql = "SELECT * FROM Tweets";
        $result = self::$conn->query($sql);
        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $loadedTweet = new Tweet($row['tweet_id'], $row['user_id'], $row['creation_date'], $row['text']);
                    $ret[] = $loadedTweet;
                }
            }
        }
        $y = count($ret);
        $k = -1;
        for ($n = $y - 1; $n >= $y-20; $n--) {
            $p = $k++;
            $sortret[$p] = $ret[$n];
        }
        return $sortret;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        if (is_string($text) && strlen($text) <= 140) {
            $this->text = $text;
        }
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }

    private function __construct($newId, $newUserId, $newDate, $newText)
    {
        $this->createDate = $newDate;
        $this->setText($newText);
        $this->id = $newId;
        $this->userId = $newUserId;


    }


}