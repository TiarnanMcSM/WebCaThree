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
    // Get the current sport ID
    $sport_id = filter_input(INPUT_GET, 'sport_id', 
            FILTER_VALIDATE_INT);
    if ($sport_id == NULL || $sport_id == FALSE) {
        $sport_id = 1;
    }
    
    // Get event and sport data
    $sport_name = get_sport_name($sport_id);
    $sports = get_sports();
    $events = get_events_by_sport($sport_id);

    // Display the event list
    include('event_list.php');
} else if ($action == 'show_edit_form') {
    $event_id = filter_input(INPUT_POST, 'event_id', 
            FILTER_VALIDATE_INT);
    if ($event_id == NULL || $event_id == FALSE) {
        $error = "Missing or incorrect product id.";
        include('../errors/error.php');
    } else { 
        $event = get_event($event_id);
        include('event_edit.php');
    }
} else if ($action == 'update_event') {
    $event_id = filter_input(INPUT_POST, 'event_id', 
            FILTER_VALIDATE_INT);
    $sport_id = filter_input(INPUT_POST, 'sport_id', 
            FILTER_VALIDATE_INT);
    $name= filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $location = filter_input(INPUT_POST, 'location');

    // Validate the inputs
    if ($event_id == NULL || $event_id == FALSE || $sport_id == NULL || 
            $sport_id == FALSE || $name == NULL || $date == NULL || 
            $location == NULL) {
        $error = "Invalid event data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_event($event_id, $sport_id, $name, $date, $location);

        // Display the Product List page for the current category
        header("Location: .?sport_id=$sport_id");
    }
} else if ($action == 'delete_event') {
    $event_id = filter_input(INPUT_POST, 'event_id', 
            FILTER_VALIDATE_INT);
    $sport_id = filter_input(INPUT_POST, 'sport_id', 
            FILTER_VALIDATE_INT);
    if ($sport_id == NULL || $sport_id == FALSE ||
            $event_id == NULL || $event_id == FALSE) {
        $error = "Missing or incorrect event ID or sport ID.";
        include('../errors/error.php');
    } else { 
        delete_event($event_id);
        header("Location: .?sport_id=$sport_id");
    }
} else if ($action == 'show_add_form') {
    $sports = get_sports();
    include('event_add.php');
} else if ($action == 'add_event') {
    $sport_id = filter_input(INPUT_POST, 'sport_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $location = filter_input(INPUT_POST, 'location');
    if ($sport_id == NULL || $sport_id == FALSE || $name == NULL || 
            $date == NULL || $location == NULL) {
        $error = "Invalid event data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_event($sport_id, $name, $date, $location);
        header("Location: .?sport_id=$sport_id");
    }
} else if ($action == 'list_sports') {
    $sports = get_sports();
    include('sport_list.php');
} else if ($action == 'add_sport') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid sport name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_sport($name);
        header('Location: .?action=list_sports');  // display the Category List page
    }
} else if ($action == 'delete_sport') {
    $sport_id = filter_input(INPUT_POST, 'sport_id', 
            FILTER_VALIDATE_INT);
    delete_sport($sport_id);
    header('Location: .?action=list_sports');      // display the Category List page
}
?>
