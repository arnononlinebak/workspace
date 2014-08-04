<?php

function php_net_feed($limit) {
    $output = array();
    $feed_url = 'http://www.php.net/feed.atom';
    $feed = simplexml_load_file($feed_url);
    $x = 1;

    foreach ($feed->entry as $item) {
        if ($x <= $limit) {
            $title = $item->title;
            $url = $item->id;

            $output[] = array(
                'title' => $title,
                'url' => $url
            );
        }
        $x++;
    }
    return $output;
}

$feed = php_net_feed(5);
?>

<ul>
    <?php
    foreach ($feed as $item) {
        echo '<li>' . $item['title'] . '</li>';
    }
    ?>
</ul>
