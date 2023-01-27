<?php session_start(); ?>
<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="test">
        <?php

            $dateTime = new DateTime('Asia/Tokyo');         
            echo $dateTime->format('Y/m/d H:i:s');

            echo '<br>';

            $dateTime = new DateTime('now', new DateTimeZone('JST'));
            $nowDateTime = $dateTime->format('Y/m/d H:i:s');
            echo $nowDateTime;

        ?>



    </div>
    
</div>

<?php require 'h&f/footer.php'; ?>