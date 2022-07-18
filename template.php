<div class="actors">

    <?php
    for($i = 0; $i <= 5; $i++) {
    ?>

        <div id="portrait">  

            <div id="picture">    
                <img src="<?= ($_FILES[$i]['profile_path']) ?>" alt="<?= ($_FILES[$i]['name']) ?>">
            </div>

            <div id="name">
                <h4><?= ($_FILES[$i]['name']) ?><div class="is"></div><div id="role">(<?= ($_FILES[$i]['character']) ?>)</div></h4>
            </div>

        </div>

    <?php }
    ?>

</div>

<?php