<?php
  class Templates {
    
    public function _render($module, $content, $data = array()) {
        if(file_exists($content)){
            require_once($module.'templates/header.php');
            require_once($content);
            require_once($module.'templates/footer.php');
        }
    }

    public function _cdn($cdn = array()) {
      $files = array();
      foreach ($cdn as $key => $row) {
        $files[$key] = $row;
      }
      return $files;
    }

    public function _css($css = array()) {
      $files = array();
      foreach ($css as $key => $row) {
        $files[$key] = $row;
      }
      return $files;
    }

    public function _js($js = array()) {
      $files = array();
      foreach ($js as $key => $row) {
        $files[$key] = $row;
      }
      return $files;
    }

  }

  $temp = new Templates;

?>