<?php

$posts = $veckologgen->getPosts();
foreach ($posts as $post) {
    echo '<div class="post">';
    echo '<h3>' . $post->getName() . '</h3>';
    echo '<p>' . $post->getText() . '</p>';
    echo '<p>' . $post->getDate() . '</p>';
    //button that deletes post from guestbook using the deletePost function with the index of the post
    echo '<form action="index.php" method="post">';
    echo '<input type="hidden" name="deletePost" value="' . $post->getPid() . '">';
    echo '<input class="btn" type="submit" value="Ta bort inlägg">';
    echo '</form>';    
    echo '</div>';
}





/*// Display all posts in guestbook
$posts = $veckologgen->getPosts();
while ($row = $posts->fetch_assoc()) {
    echo '<div class="post">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['text'] . '</p>';
    echo '<p>' . $row['date'] . '</p>';
    //button that deletes post from guestbook using the deletePost function with the index of the post
    echo '<form action="index.php" method="post">';
    echo '<input type="hidden" name="deletePost" value="' . $row['pid'] . '">';
    echo '<input class="btn" type="submit" value="Ta bort inlägg">';
    echo '</form>';    
    echo '</div>';
}*/
?>