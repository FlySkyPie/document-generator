<?php

namespace FlySkyPie\DocumentGenerator;

use FlySkyPie\DocumentGenerator\Segment;

class Odt extends Odtphp\Odf {
  
  /*
   * Override, set default encode as utf-8.
   */
  public function setVars($key, $value, $encode = true, $charset = 'UTF-8') {
    parent::setVars($key, $value, $encode, $charset);
  }
  
  /**
   * Declare a segment in order to use it in a loop
   * @copyright  GPL License 2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
   * @license    http://www.gnu.org/copyleft/gpl.html  GPL License
   * @param string $segment
   * @throws OdfException
   * @return Segment
   */
  public function setSegment($segment)
  {
    if (array_key_exists($segment, $this->segments)) {
        return $this->segments[$segment];
    }
    $reg = "#\[!--\sBEGIN\s$segment\s--\](.*?)\[!--\sEND\s$segment\s--\]#smU";
    if (preg_match($reg, html_entity_decode($this->contentXml), $m) == 0) {
        throw new OdfException("'$segment' segment not found in the document");
    }
    $this->segments[$segment] = new Segment($segment, $m[1], $this);
    return $this->segments[$segment];
  }
}
