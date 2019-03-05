<?php

namespace FlySkyPie\DocumentGenerator;

use FlySkyPie\DocumentGenerator\Odf;


abstract class Generator {

  private $Odf;
  
  public function __construct($FilePath) {
    $this->Odf = new Odf($FilePath);
  }

  /*
   * Save document to disk.
   * @string $FilePath
   */

  public function saveDocument($FilePath) {
    $this->Odt->saveToDisk($FilePath);
  }

  /*
   * Echo whole file.
   * @param string $FileName
   */

  public function exportAsAttachedFileexportAsAttachedFile($FileName = "") {
    $this->Odt->exportAsAttachedFile($FileName);
  }

}
