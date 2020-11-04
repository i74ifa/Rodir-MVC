<?php
if (empty($_SESSION['token']))
    $_SESSION['token'] = bin2hex(random_bytes(32));
include "app/con.php";
include "view/head.php";
include "view/navbar.php";

?>
<div class="container">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="text-center">
        <label for="title" class="mt-2">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        <label for="body" class="mt-2">Body</label>
        <input type="text" class="form-control" name="body" id="body">
        <div class="text-center mt-4">
            <button class="btn btn-primary mr-5" name="submit"  id="submit">Submit</button>
        </div>
    </div>
    </form>
    <div id="body">

    </div>
    <?php 
    
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $body = $_REQUEST['body'];
            $title = $_REQUEST['title'];

            if(empty($body or $title))
            echo "Sorry is Empty";
            else {
                    $sql = "INSERT INTO posts
                    (posts.title, posts.body, posts.created_at, posts.updated_at)
                    VALUES ('$title' , '$body', NOW(), NOW())";
                    if($conn->query($sql) === true)
                    echo "success";
                    else 
                    echo $conn->error;  
            }}
        ?>
</div>
<script src="/public/js/jquery-slim.min.js"></script>