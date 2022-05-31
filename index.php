<!-- stop at minutes 23, il faut aussi arranger le css -->
<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main_section">
        <h1 class="title">My To-Do List</h1>

        <div class="add_section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="item" placeholder="This field is required" style="border-color:red">
                    <!-- non-breaking space: space that will not break as a new&nbsp; <span>&#43</span> line; &#43 is the + sign: &nbsp; <span>&#43</span> -->
                    <button type="submit" class="btn"><i class="fa fa-plus"></i></button>
                <?php } else {?>
                    <input type="text" name="item" placeholder="What do you need to do ?">
                    <!-- non-breaking space: space that will not break as a new&nbsp; <span>&#43</span> line; &#43 is the + sign: &nbsp; <span>&#43</span> -->
                    <button type="submit" class="btn"><i class="fa fa-plus"></i></button>
                <?php } ?>
            </form>        
        </div>

        <?php 
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>

        <div class="tasks_section">
            <?php if($todos->rowCount() <= 0) { ?>
                <div class="task">
                    <div class="empty">
                        <p>No pending tasks.</p>
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="task">
                    <span id="<?php echo $todo['id']; ?>"
                        class="remove-to-do"><i class="icon fa fa-trash"></i></span>
                    <?php if($todo['checked']){ ?>
                        <input type="checkbox" class="check-box" checked />
                        <h2 class="checked"><?php echo $todo['title']; ?></h2>
                    <?php } else { ?>
                        <input type="checkbox" class="check-box"/>
                        <h2><?php echo $todo['title']; ?></h2>
                     <?php } ?>
                    <br>
                    <small>Created: <?php echo $todo['date_time']; ?></small>
                </div>
            <?php } ?>
            <div class="pending">You have <?php echo $todos->rowCount() ?> pending tasks</div>
        </div>
    </div>
</body>

</html>