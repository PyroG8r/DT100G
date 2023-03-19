<?php

$posts = $veckologgen->getPosts();
foreach ($posts as $post) {
    //If a tag is selected, only display posts with that tag
    if (isset($_GET['tag'])) {
        $tags = $veckologgen->getTags($post->getPid());
        if (!in_array($_GET['tag'], $tags)) {
            continue;
        }
    }
    echo '<div class="post">';
    echo '<h4>' . $post->getDescription() . '</h4>';
    // Display tags for the post
    $tags = $veckologgen->getTags($post->getPid());
    foreach ($tags as $tag) {
        echo '<a href="index.php?tag=' . $tag . '" class="tag"><span>' . $tag . '</span></a>';
        
    }
    echo '<div class="postBox">';
    echo '<h3>' . $post->getName() . ': </h3>';
    echo '<p>' . $post->getText() . '</p>';
    echo '</div>';  //postText
    echo '<div class="postInfo">';
    echo '<p class="postDate">Datum: ' . date_format(date_create($post->getDate()), "y-m-d H:i") . '</p>';
    //button that deletes post from guestbook using the deletePost function with the index of the post
    echo '<form action="index.php" method="post">';
    echo '<input type="hidden" name="deletePost" value="' . $post->getPid() . '">';
    echo '<input class="btn" type="submit" value="Ta bort inlägg">';
    echo '</form>';    
    echo '</div>';  //postInfo
    echo '</div>';  //post
}
?>