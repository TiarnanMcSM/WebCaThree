<?php
function get_sports() {
    global $db;
    $query = 'SELECT * FROM sports
              ORDER BY sportID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_sport_name($sport_id) {
    global $db;
    $query = 'SELECT * FROM sports
              WHERE sportID = :sport_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':sport_id', $sport_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $sport_name = $sport['sportName'];
    return $sport_name;
}

function add_sport($name) {
    global $db;
    $query = 'INSERT INTO sports (sportName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_sport($sport_id) {
    global $db;
    $query = 'DELETE FROM sports
              WHERE sportID = :sport_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sport_id', $sport_id);
    $statement->execute();
    $statement->closeCursor();
}
?>

