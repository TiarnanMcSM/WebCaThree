<nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($sports as $sport) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $sport['sportID']; ?>">
                        <?php echo $sport['sportName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
