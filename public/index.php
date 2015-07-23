<?php

// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../vendor/autoload.php';

$data = $arrayName = array(
  'name' => 'Moises Gonzalez',
  'course' => 'Aprendiendo Laravel'
);
$html = App\Template::render('pdf/certificate', $data);
//die($html);
App\Pdf::render('certificate',$html);
