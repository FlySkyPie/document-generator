<?php

namespace FlySkyPie\DocumentGenerator;

use FlySkyPie\DocumentGenerator\OdtRenderer;

 abstract class Generator {

  protected $OdtRenderer;
  protected $Parameter = [];
  protected $ContentIndexs = [];

  public function __construct($FilePath, $Parameter) {
    $this->Parameter = $Parameter;
    $this->checkParameter();
    $this->OdtRenderer = new OdtRenderer($FilePath);
    $this->loadContent();
  }

  protected function checkParameter() {
    foreach ($this->ContentIndexs as $ContentIndex) {
      if (!array_key_exists($ContentIndex, $this->Parameter)) {
        $this->Parameter["$ContentIndex"] = ""; //default is empty string
      }
    }
  }

  abstract protected function loadContent();

  /*
   * Rplace Key with Content from template.
   * @param string $Key
   * @param string $Content  
   */

  protected function setContent($Key, $Content) {
    $this->OdtRenderer->setVars($Key, $Content);
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
