<?php include '../view/header.php'; ?>
<main>

    <h1>Sport List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($sports as $sport) : ?>
        <tr>
            <td><?php echo $sport['sportName']; ?></td>
            <td>
                <form id="delete_event_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_sport">
                    <input type="hidden" name="sport_id"
                           value="<?php echo $sport['sportID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Sport</h2>
    <form id="add_sport_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_sport">

        <label>Sport Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_events">List Events</a></p>

</main>
<?php include '../view/footer.php'; ?>