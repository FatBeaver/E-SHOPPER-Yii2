<?php

?>
<?php foreach($reviews as $review): ?>

    <ul>
        <li><a href=""><i class="fa fa-user"></i><?=$review->user->username?></a></li>
        <li><a href=""><i class="fa fa-clock-o"></i><?=$review->date?></a></li>
    </ul>
    <p><?=ucfirst($review->text)?></p>
    <hr/>
<?php endforeach; ?>


