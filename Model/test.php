<?php

require_once "./entity/PageEntity.php";

$page = new PageEntity(array('id' => 1,));
print_r($page->toArray());

