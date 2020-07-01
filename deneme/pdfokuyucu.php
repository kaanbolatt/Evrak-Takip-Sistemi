<?php

$file1='test.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file1 . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-ranges: bytes');
@readfile($file1);

?>