<?php

namespace FlySkyPie\DocumentGenerator;

use FlySkyPie\DocumentGenerator\OdtRenderer;

abstract class Generator {

  private $OdtRenderer;
  private $ContentIndexs = [];
  private $Parameter = [];

  public function __construct($FilePath, $Parameter) {
    $this->Parameter = $Parameter;
    $this->checkParameter();
    $this->OdtRenderer = new OdtRenderer($FilePath);
    $this->loadContent();
  }

  private function checkParameter() {
    foreach ($this->ContentIndexs as $ContentIndex) {
      if (!array_key_exists($ContentIndex, $this->Parameter)) {
        $this->Parameter["$ContentIndex"] = ""; //default is empty string
      }
    }
  }

  private function loadContent() {
    //override
  }

  /*
   * Rplace Key with Content from template.
   * @param string $Key
   * @param string $Content  
   */

  private function setContent($Key, $Content) {
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
