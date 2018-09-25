<?php

$this->load->view('header.php');
/**
 *   This handles the rendering of the content from modules
 */

if (!isset($viewFile)) {
    $viewFile = "";
}
if (!isset($module)) {
    $module = $this->uri->segment(1);
}
if ($viewFile != "" && $module != "") {
    $path = $module . '/' . $viewFile;
    $this->load->view($path);
} else {
    echo nl2br($body);
}

$this->load->view('footer.php');

