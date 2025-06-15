<?php
namespace Dompdf;
class Dompdf {
    public function __construct($options = null) {}
    public function loadHtml($html) {}
    public function setPaper($size, $orientation = 'portrait') {}
    public function render() {}
    public function stream($filename, $options = array()) {}
}
