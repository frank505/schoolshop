<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_Settings
{

     /**
   * pageSettings allows the user to configure the page to be rendered
   *
   * @param mixed $viewFile :: The name of the file to render. from view/
   * @param mixed $viewData :: The data to be passed to the view must be an array or null
   * @param mixed $dataName :: The variable name to be used to retrieve $viewData passed to viewFile
   * @param mixed $pageTitle:: The title of the page
   * @param mixed $module   :: The current module this file belongs too.
   * @return array
   */

  public static function set_page($viewFile, $viewData, $dataName = 'result', $pageTitle = null, $module = 'home')
  {
    if ($dataName == null) {
        $data = $viewData;
    } else {
        $data[$dataName] = $viewData;
    }
    $data['viewFile'] = $viewFile;
    $data['pageTitle'] = $pageTitle;
    if ($module != null) {
        $data['module'] = $module;
    }

    return $data;

  }

  public function debug($array)
  {
      echo '<pre>' . print_r($array, 1) . '</pre>';
      die();
  }


   




}