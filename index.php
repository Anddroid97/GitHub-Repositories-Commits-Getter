<?php

require __DIR__.'/vendor/autoload.php';

use Anddroid97\CommitsGetter\CommitsGetter;

$commitsList = new CommitsGetter('Anddroid97/GitHub-Repositories-Commits-Getter');
$list = $commitsList->fetchCommitsList();

var_dump($list);