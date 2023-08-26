<?php
include('helpers/db_connection.php');

$userId = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null; 
$usename = "dummass"; //ეს მაგალითისთვის ჩავწერე, ისე წესით დათაბეიზთან უნდა დაკავშირდე და $userIdით მოძებნო userის სახელი
//sellect data from database that has user_id same as $userId
$query = $connection->query("SELECT * FROM vouch WHERE user_id = ". $userId);
$vouches = $query->fetch_all(MYSQLI_ASSOC);

$vouchNum  = $query->num_rows;//count the rows.
?>
<div class="container">
    <div class="vouches">
        <div class="logo">desolo</div>
        <div class="vouch-num"><?=$vouchNum?>Vouches</div><!-- vouch num -->
    </div>
    <div class="buttons">
        <a href="vouches.php?sa=submit&id=558308">Vouch</a>
        <button>Message</button>
    </div>
</div>

<div class="container">
    <?php foreach($vouches as $vouch) :?>
        <!-- writing data -->
        <img src="" alt=""><!-- ლაიქის აიქონის ლინკი ჩაწერე -->
        <p class="comment"><?=$vouch['comment']?></p>
        <div class="date"><?=$vouch['date']?></div>
        <div class="user">
            <div class="username"><?=$usename?></div>
            <div class="status"><?=ucfirst($vouch['status'])?></div>
        </div>
        <button>Report</button>
    <?php endforeach?>
</div>