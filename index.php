<?php

require_once "./Model/entity/PageEntity.php";

$page = new PageEntity();
$page->setId(2);
$page->setUrl('url');

echo $page->getId(); echo "<br />";
echo $page->getUrl();

