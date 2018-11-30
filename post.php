<?php
    include 'header.php';
    // zodat de value (om de waarde te behouden na foutmelding) in form niet als tekst wordt geprint.
    $title = '';
    $content = '';
   
    if(isset($_POST['post'])) {
        $title = strip_tags($_POST['title']);
        $title = mysqli_real_escape_string($db, $title);
        $content = strip_tags($_POST['content']); 
        $content = mysqli_real_escape_string($db, $content);
        $author = strip_tags($_SESSION['username']);
        $cats = strip_tags($_POST['cats']);
        //$sql =  "INSERT into post (tagid) VALUES ('$tagid')";
        //$author = mysqli_real_escape_string($db, $author);
        $captcha = strip_tags($_POST['captcha']); 
        $code = $_POST['cap'];
        $sql =  "INSERT into post (title, content, author, cat_id) VALUES ('$title', '$content', '$author', '$cats')";
           if($title == "" || $content == "" || $author == "id" || $captcha != $code || $captcha == "") {
            echo "De post is niet compleet ingevuld!";
        }
        else {
            mysqli_query($db, $sql);
            header("Location: index.php");
        }
      }

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/post_style.css">
    <title>Blog - berichten</title>
</head>

<body>
    <form action="post.php" method="post" enctype="multipart/form-data">
        <?php
            $sql = "SELECT * FROM categories ORDER BY id ASC";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
            //$post ="";
            if(mysqli_num_rows($res) >0) {
            while($row = mysqli_fetch_assoc($res)) {
                $tagid = $row['id'];
                echo "<input type='radio' name= 'cats[]' value='.$tagid.'  />";
                echo $row['category'];
                //echo $tagid;
                //echo $post;

                }
            }else {echo "Geen categorieën.";
                }
        ?>   
            <!-- <input type="checkbox" name="cats" value="tagid" /> -->
        
    </form>
    <!--<?php echo $_SESSION['username']; ?> -->
    <form action="post.php" method="post" enctype="multipart/form-data"><br/>
        <input placeholder="Title" name="title" type="text" autofocus size="48" value="<?php echo $title; ?>"><br/><br/>
        <textarea placeholder="Content" name="content" rows="20" cols="50"><?php echo $content; ?></textarea><br/><br/>
        <input name="post" type="submit" value="Post">
        <input name="reset" type="reset" value="Reset">
        <input type="button" value="Terug" onclick="location.href='index.php';"><br/><br/>
        <?php echo $cap = (rand(100,1000)); ?>
        <input placeholder="Wat is de code?" type="text" name="captcha">
        <input type="hidden" name="cap" value="<?php echo $cap;?>">
    </form>
    
</body>    
</html>