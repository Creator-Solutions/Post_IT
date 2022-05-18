<?php

include 'simple_html_dom.php';

$html = file_get_html('https://blog.hubspot.com/sales/famous-quotes');

$list = $html->find('div[class="hsg-featured-snippet__wrapper--content"]', 0);
$list1 = $html->find('div[class="hsg-featured-snippet__wrapper--content"]', 1);
$list2 = $html->find('div[class="hsg-featured-snippet__wrapper--content"]', 2);

$list_array = $list->find('li');
$list_array2 = $list1->find('li');
$list_array3 = $list2->find('li');

$list_array = array_merge($list_array2, $list_array3);


for ($i=0; $i < sizeof($list_array); $i++){
    $quote = explode("-", $list_array[$i]->plaintext, 2);
    echo "<div class=container>".
           "<div class=box>".
             "<p>".'"'.trim($quote[0]).'"'."</p>".
            "</div>".
            "<div class=author>".
             "<p>$quote[1]</p>".
            "</div>".
         "</div>";
}

?>