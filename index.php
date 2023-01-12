<?php 
session_start();

$basedir = __DIR__ . '/fokonyvtar/';
echo 'basedir > '.$basedir.'<br>';
//$dir =  "fokonyvtar";

$current = '';
if (array_key_exists('current', $_GET) && $_GET['current'] !== '') {
    $current = ''. $_GET['current'] . '/';
}

echo 'current > '.$current.'<br>';

//$_SESSION["urlhome"] = $dir;

$target = scandir($basedir.$current);
echo 'target > '.$basedir.$current.'<br>';

if (is_dir($basedir.$current)){
    foreach($target as $file) {
        $link = $current.$file;

        if ($file === '.' || $file === '.DS_Store') {
            continue;
        }
        if ($file === '..') {
            if ($current === '') {
                continue;
            }
            $linkArray = explode('/', $link);
            array_pop($linkArray);
            array_pop($linkArray);
            $link = implode('/', $linkArray);
        }

        if(is_dir($basedir.$current.$file)) {
        echo "<a href='?current=" . $link . "'>" . trim($file) . "</a><br>";
    } else {
        echo trim($file) . "<br>";
    }

}
}
