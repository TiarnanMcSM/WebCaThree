<?php include '../view/header.php'; ?>
<main>
    <h1>Add Event</h1>
    <form action="index.php" method="post" id="add_event_form">
        <input type="hidden" name="action" value="add_event">

        <label>Sport:</label>
        <select name="sport_id">
        <?php foreach ( $sports as $sport ) : ?>
            <option value="<?php echo $sport['sportID']; ?>">
                <?php echo $sport['sportName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Event Name:</label>
        <input type="input" name="name">
        <br>

        <label>Start Date:</label>
        <input type="input" name="date">
        <br>

        <label>Location:</label>
        <input type="input" name="location">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Event">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_events">View Events List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>