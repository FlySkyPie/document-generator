<?php

namespace FlySkyPie\DocumentGenerator;

class Segment extends Odtphp\Segment {

  public function setVars($key, $value, $encode = true, $charset = 'UTF-8') {
    parent::setVars($key, $value, $encode, $charset);
  }

}
