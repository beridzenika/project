<?php
include('helpers/db_connection.php');

// insert
    $userId = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null; 
    //getting user id and inserting with other values to database so we can connect it to user later
    
if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    //get submited data
    $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : '' ;
    $status = isset($_POST['status']) ? $_POST['status'] : '' ;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '' ;
    $url = isset($_POST['url']) ? $_POST['url'] : '' ;
    //insert them in database
    if ($confirm && $confirm == "on" && $status && $comment && $url && $userId) {
        //insert values in database
        $query = $connection->prepare("INSERT INTO `vouch` (`status`, `comment`, `url`, `user_id`) VALUES (?,?,?, ?)");
        $query->bind_param('sssi',$status, $comment, $url, $userId);
        if($query->execute()) {
            header('Location: vouch.php'); // აქ ფაილის სახელი დაწერე სადაც გინდა გადავიდეს დასაბმითების მერე
        } else {
            print_r($connection->error);
            echo "Error";
        }
    }
}
?>


<div class="container">
    <h2>Important Information</h2>
    <div class="info">
        <!-- აქ ლორემის მაგივრად ტექსტი ჩაწერე -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque delectus, voluptatem nulla impedit illum quaerat exercitationem harum, eligendi obcaecati illo voluptate optio, dolorum necessitatibus quas. Optio minus saepe asperiores facilis.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque delectus, voluptatem nulla impedit illum quaerat exercitationem harum, eligendi obcaecati illo voluptate optio, dolorum necessitatibus quas.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque delectus, </p>
    </div>
</div>
<div class="container">
    <h2>Vouch - desolo</h2>
    <div class="form">
        <form action="" method="post">
            <div class="form-box">
                <input type="checkbox" name="confirm" id="">
                <label for="">I confirm that this vouch is for a deal over $5 In value and is not relating to Credits</label>
            </div>
            <div class="form-box">
                <label for="">you were the:</label>
                <select name="status" id="">
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                    <option value="trader">Trader</option>
                    <option value="middleman">Middleman</option>
                </select>
            </div>
            <div class="form-box">
                <label for="">Comment on your deal</label>
                <input type="text" name="comment">
            </div>
            <div class="form-box">
                <label for="">Sales Thread URL</label>
                <input type="text" name="url">
            </div>
            <div>
                <input type="hidden" name="action" value="insert">
                <button>Submit Vouch</button>
            </div>
        </form>
    </div>
</div>