<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Sports</h2>
        <?php include '../view/sport_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $sport_name; ?></h1>
        <ul class="nav">
            <!-- display links for products in selected category -->
            <?php foreach ($events as $event) : ?>
            <li>
                <a href="?action=view_event&amp;event_id=<?php 
                          echo $event['eventID']; ?>">
                    <?php echo $event['eventName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>