<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Event</h1>
    <form action="index.php" method="post" id="add_event_form">

        <input type="hidden" name="action" value="update_event">

        <input type="hidden" name="event_id"
               value="<?php echo $event['eventID']; ?>">

        <label>Sport ID:</label>
        <input type="sport_id" name="sport_id"
               value="<?php echo $event['sportID']; ?>">
        <br>

        <label>Event Name:</label>
        <input type="input" name="name"
               value="<?php echo $event['eventName']; ?>">
        <br>

        <label>Start Date:</label>
        <input type="input" name="date"
               value="<?php echo $event['startDate']; ?>">
        <br>

        <label>Location:</label>
        <input type="input" name="location"
               value="<?php echo $event['location']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_events">View Event List</a></p>

</main>
<?php include '../view/footer.php'; ?>
