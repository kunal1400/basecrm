<?php

$unzip = new ZipArchive;
$out = $unzip->open('vcard-master6.zip');
if ($out === TRUE) {
  $unzip->extractTo(getcwd());
  $unzip->close();
  echo 'File unzipped';
} else {
  echo 'Something went wrong?';
}