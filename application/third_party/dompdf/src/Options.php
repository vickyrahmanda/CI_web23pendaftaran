<?php
namespace Dompdf;
class Options {
    protected $options = array();
    public function set($key, $value) { $this->options[$key] = $value; }
    public function get($key) { return isset($this->options[$key]) ? $this->options[$key] : null; }
    public function getOptions() { return $this->options; }
}
