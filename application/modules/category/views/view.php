<div class="table-responsive">
    <table class="table table-condensed" id="dataTable">
	<thead>
	    <tr>
		<th>#</th>
		<th>&nbsp; </th>
		<th>Category Name</th>
		<th>Parent </th>
		<th>&nbsp;</th>
	    </tr>
	</thead>
	<tbody>
	    <?php if ($categorys->num_rows() > 0): foreach ( $categorys->result() as $row ): ?>
		    <tr>
			<th scope="row"><?= @ ++$i ?></th>
			<td><i class="fa <?php echo str_replace('_','-',$row->icon); ?>"></i></td>
			<td><?= $row->catname ? $row->catname : ''; ?></td>
			<td><?= Modules::run('category/get_category_name', $row->parent_id) ?></td>
			
			<td>
			    
			    <div class="btn-group  btn-group-sm">
				
	                        <a href="<?= site_url('category/delete/'.$row->cat_id) ?>" class="btn btn-danger" type="button"><i class="fa fa-trash"></i> Delete</a>
				<a href="<?= site_url('category/edit/'.$row->cat_id) ?>" class="btn btn-default" type="button"><i class="fa fa-pencil"></i> Edit</a>
				
			    </div>
			   
			</td>
		    </tr>
		<?php endforeach;
	    else:
		?>
    	    <tr>
    		<th colspan="5">no category available at the moment</th>
    	    </tr>
<?php endif; ?>
	</tbody>
    </table>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->  
<!--<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $(document).ready(function () {
            var handleDataTableButtons = function () {
                if ($("#dataTable").length > 0) {
                    $("#dataTable").DataTable();

                    $(".dataTables_wrapper select").select2({
                        minimumResultsForSearch: -1
                    });
                }
            };

            TableManageButtons = function () {
                "use strict";
                return {
                    init: function () {
                        handleDataTableButtons();
                    }
                };
            }();

            TableManageButtons.init();

        });
    });

</script>-->
