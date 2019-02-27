<?php
function get_events() {
    global $db;
    $query = 'SELECT * FROM events
              ORDER BY eventID';
    $statement = $db->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}

function get_events_by_sport($sport_id) {
    global $db;
    $query = 'SELECT * FROM events
              WHERE events.sportID = :sport_id
              ORDER BY eventID';
    $statement = $db->prepare($query);
    $statement->bindValue(":sport_id", $sport_id);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}

function get_event($event_id) {
    global $db;
    $query = 'SELECT * FROM events
              WHERE eventID = :event_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":event_id", $event_id);
    $statement->execute();
    $event = $statement->fetch();
    $statement->closeCursor();
    return $event;
}

function delete_event($event_id) {
    global $db;
    $query = 'DELETE FROM events
              WHERE eventID = :event_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':event_id', $event_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_event($sport_id, $name, $date, $location) {
    global $db;
    $query = 'INSERT INTO events
                 (sportID, eventName, startDate, location)
              VALUES
                 (:sport_id, :name, :date, :location)';
    $statement = $db->prepare($query);
    $statement->bindValue(':sport_id', $sport_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':location', $location);
    $statement->execute();
    $statement->closeCursor();
}

function update_event($event_id, $sport_id, $name, $date, $location) {
    global $db;
    $query = 'UPDATE events
              SET sportID = :sport_id,
                  eventName = :name,
                  startDate = :date,
                  location = :location
               WHERE eventID = :event_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sport_id', $sport_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':event_id', $event_id);
    $statement->execute();
    $statement->closeCursor();
}
?>