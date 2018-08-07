<?php
$this->load->view('assets/header.php');
$this->load->view('assets/navigation.php');
if ($this->uri->segment(1) == 'home'
|| $this->uri->segment(1) == null
|| $this->uri->segment(1) == 'help'):
    $this->load->view('assets/slider.php');
endif;

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

$this->load->view('assets/footer.php');
