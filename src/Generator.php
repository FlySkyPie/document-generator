<?php

namespace FlySkyPie\DocumentGenerator;

abstract class Generator {

  private $TemplatePath;

  /*
   * set open document file of template taht will been load
   * @param string $FilePath
   */

  public function setTemplate($FilePath) {
    $this->TemplatePath = $FilePath;
  }

}
