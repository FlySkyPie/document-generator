<?php

namespace FlySkyPie\DocumentGenerator;

use FlySkyPie\DocumentGenerator\OdtRenderer;

abstract class Generator {

  private $OdtRenderer;
  
  public function __construct($FilePath) {
    $this->OdtRenderer = new OdtRenderer($FilePath);
  }

  /*
   * Save document to disk.
   * @string $FilePath
   */

  public function saveDocument($FilePath) {
    $this->OdtRenderer->saveToDisk($FilePath);
  }

  /*
   * Echo whole file.
   * @param string $FileName
   */

  public function exportAsAttachedFileexportAsAttachedFile($FileName = "") {
    $this->OdtRenderer->exportAsAttachedFile($FileName);
  }

}
