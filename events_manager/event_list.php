<?php include '../view/header.php'; ?>
<main>

    <h1>Event List</h1>

    <aside>
        <!-- display a list of sports -->
        <h2>Sports</h2>
        <?php include '../view/sport_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of events -->
        <h2><?php echo $sport_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($events as $event) : ?>
            <tr>
                <td><?php echo $event['eventName']; ?></td>
                <td><?php echo $event['startDate']; ?></td>
                <td><?php echo $event['location']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="event_id"
                           value="<?php echo $event['eventID']; ?>">
                    <input type="hidden" name="sport_id"
                           value="<?php echo $event['sportID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_event">
                    <input type="hidden" name="event_id"
                           value="<?php echo $event['eventID']; ?>">
                    <input type="hidden" name="sport_id"
                           value="<?php echo $event['sportID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Event</a></p>
        <p><a href="?action=list_sports">List Sports</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>
