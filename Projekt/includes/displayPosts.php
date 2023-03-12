<?php
// Display all posts in guestbook
$posts = $guestbook->getPosts();
foreach ($posts as $post) {
    echo '<div class="post">';
    echo '<h3>' . $post->getName() . '</h3>';
    echo '<p>' . $post->getMessage() . '</p>';
    echo '<p>' . $post->getDate() . '</p>';
    //button that deletes post from guestbook using the deletePost function with the index of the post
    echo '<form action="index.php" method="post">';
    echo '<input type="hidden" name="deletePost" value="' . $post->getUid() . '">';
    echo '<input class="btn" type="submit" value="Ta bort inlägg">';
    echo '</form>';    
    echo '</div>';
}

?>