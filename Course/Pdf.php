<?php namespace App;

use DOMPDF;

class Pdf {

  protected static $conf = false;

  public static function configure()
  {
    // disable DOMPDF's internal autoloader if you are using Composer
    define('DOMPDF_ENABLE_AUTOLOAD', false);

    // include DOMPDF's default configuration
    require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';

    static::$conf = true;
  }

  public static function render($file, $html)
  {
    if (static::$conf) return;

    static::configure();
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("$file.pdf");
  }
}
