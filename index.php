<?php

require('./models/CSV.php');
require('./models/tags.php');
require('./views/blog.php');
require('./views/article.php');

$site = new Articles();
$site->template('./templates/Starry Night/');
$site->parseHTML('index.html', 'default.css');
$tags = new Tags($site, './data/tags.csv');
$site->setHTML($tags);
$site->display();
?>
