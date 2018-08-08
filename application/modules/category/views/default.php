<div class="ads-grid">
    <div class="side-bar col-sm-3">
	<div class="search-hotel">
	    <?php echo $this->load->view('add') ?>
	</div>
    </div>
    <div class="agileinfo-ads-display col-md-9">
	<div class="wrapper">	
	    <?php
	    if ($this->session->flashdata('error') != NULL) {
		echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
	    }

	    if ($this->session->flashdata('success') != NULL) {
		echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
	    }
	    ?>
	<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
	   <?php echo Modules::run('category/view') ?>
	</div>
    </div>
    <div class="clearfix"></div>
</div>
