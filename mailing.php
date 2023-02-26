<?php
include_once 'db.php';
include_once 'functions.php';
if (isset($_POST['mailing']))
{
    $query = "SELECT id, name, number FROM users" ;
    $result = $conn->query($query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $usersArray[] = $row;
    }

    $mailingQuery = "SELECT id, title, body FROM posts" ;
    $result = $conn->query($mailingQuery);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $mailsArray[] = $row;
    }

    foreach ($mailsArray as $m) {
        $checkQuery = "
            SELECT
	            u.id, u.name, u.number  
            FROM users u
            LEFT JOIN usersposts up ON up.user_id = u.id AND up.post_id = " . $m['id'] . "
            WHERE up.id IS NULL 
        ";
        $result = $conn->query($checkQuery);
        $notMailedUsers = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $notMailedUsers[] = $row;
        }
        foreach ($notMailedUsers as $user) {
            doMailing($user['number'], $user['name'], $m['title'], $m['body']);
            $insertQuery = "
                INSERT INTO usersposts (user_id, post_id) VALUES (".$user['id'].", ".$m['id'].")
            ";
            $conn->query($insertQuery);
        }
    }

    header("Location: index.php");
}
