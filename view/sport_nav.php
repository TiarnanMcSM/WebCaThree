<nav>
            <ul>
                <!-- display links for all events -->
                <?php foreach($sports as $sport) : ?>
                <li>
                    <a href="?sport_id=<?php 
                              echo $sport['sportID']; ?>">
                        <?php echo $sport['sportName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
