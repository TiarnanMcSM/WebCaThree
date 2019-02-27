<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Sports</h1>
        <?php include '../view/sport_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $name; ?></h1>
        <div id="right_column">
            <p><b>Event Name:</b> <?php echo $name; ?></p>
            <p><b>Start Date:</b> <?php echo $date; ?></p>
            <p><b>Location:</b> <?php echo $location; ?></p>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>