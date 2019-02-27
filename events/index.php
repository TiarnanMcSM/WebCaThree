<?php
require('../model/database.php');
require('../model/event_db.php');
require('../model/sport_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_events';
    }
} 

if ($action == 'list_events') {
    $sport_id = filter_input(INPUT_GET, 'sport_id', 
            FILTER_VALIDATE_INT);
    if ($sport_id == NULL || $sport_id == FALSE) {
        $sport_id = 1;
    }
    $sports = get_sports();
    $sport_name = get_sport_name($sport_id);
    $events = get_events_by_sport($sport_id);

    include('event_list.php');
} else if ($action == 'view_event') {
    $event_id = filter_input(INPUT_GET, 'event_id', 
            FILTER_VALIDATE_INT);   
    if ($event_id == NULL || $event_id == FALSE) {
        $error = 'Missing or incorrect event id.';
        include('../errors/error.php');
    } else {
        $sports = get_sports();
        $event = get_event($event_id);

        // Get product data
        $name = $event['eventName'];
        $date = $event['startDate'];
        $location = $event['location'];

        

        include('event_view.php');
    }
}
?>