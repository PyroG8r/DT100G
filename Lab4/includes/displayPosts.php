<?php
// Display all posts in guestbook
$posts = $guestbook->getPosts();
foreach ($posts as $post) {
    echo '<div class="post">';
    echo '<h3>' . $post->getName() . '</h3>';
    echo '<p>' . $post->getMessage() . '</p>';
    echo '<p>' . $post->getDate() . '</p>';
    //button that deletes post from guestbook using the deletePost function
    echo '<button class="btn">Ta bort</button>';
    echo '</div>';
}
?>