<?php
$sql = "SELECT blog.id, blog.title, blog.content, blog.time_created ,user.id as user_id, user.username
FROM blogs AS blog
JOIN users AS user ON blog.user_id = user.id";
$blogs = mysqli_query($conn, $sql); ?>

<?php if (mysqli_num_rows($blogs) > 0) : ?>
    <?php while ($blog = mysqli_fetch_assoc($blogs)) : ?>
        <?= $blog["username"] . " - title: " . $blog["title"] . " - content: " . $blog["content"] . " - time_created: " . $blog["time_created"] . "<br>"; ?>
        <div>
            <?php if ($blog["user_id"] == $_SESSION["id"]) : ?>

                <a href="dashboard_UPDATE.php" type="button"><input type="button" value="UPDATE" /></a>
                <a href="crud/delete.php?id=<?= $blog["id"] ?>" type="button"><input type="button" value="DELETE" /></a>
            <?php endif ?>

        </div>
    <?php endwhile ?>
<?php else : ?>
    <p>no blogs</p>
<?php endif ?>

<?php
mysqli_close($conn);

?>