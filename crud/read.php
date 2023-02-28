<?php

$sql = "SELECT blog.id, blog.title, blog.content, blog.time_created ,user.id as user_id, user.username
FROM blogs AS blog
JOIN users AS user ON blog.user_id = user.id";
$blogs = mysqli_query($conn, $sql); ?>

<?php if (mysqli_num_rows($blogs) > 0) : ?>
    <?php while ($blog = mysqli_fetch_assoc($blogs)) : ?>
        <?= $blog["username"] . " - title: " . $blog["title"] . " - content: " . $blog["content"] . " - time_created: " . $blog["time_created"] . "<br>"; ?>
        <div>
            <form action="crud/update.php" method="POST">
                <input type="hidden" name="id" value="<?= $blog["id"] ?>">
                <input type="hidden" name="title" value="<?= $blog["title"] ?>">
                <input type="hidden" name="content" value="<?= $blog["content"] ?>">

                <?php if ($blog["user_id"] == $_SESSION["id"]) : ?>
                    <button type="submit">UPDATE</button>
                <?php endif ?>
            </form>
            <form action="crud/delete.php" method="POST">
                <input type="hidden" name="id" value="<?= $blog["id"] ?>">
                <?php if ($blog["user_id"] == $_SESSION["id"]) : ?>
                    <button type="submit">DELETE</button>
                <?php endif ?>
            </form>

        </div>
    <?php endwhile ?>
<?php else : ?>
    <p>no blogs</p>
<?php endif ?>

<?php
mysqli_close($conn);

?>