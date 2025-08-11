<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MACHINE MANAGEMENT SYSTEM</li>
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '1') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Configuration</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_type_insert_form"><i class="fa fa-circle-o"></i> Add Factory Type Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_type_list"><i class="fa fa-circle-o"></i> Factory Type List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>



						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>



						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_insert_form"><i class="fa fa-circle-o"></i>Add Machine Purpose</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_list"><i class="fa fa-circle-o"></i>Machine Purpose List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_insert_form"><i class="fa fa-circle-o"></i>Add Machine Name</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_list"><i class="fa fa-circle-o"></i>Machine List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_insert_form"><i class="fa fa-circle-o"></i>Add Model</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_list"><i class="fa fa-circle-o"></i>Model List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_insert_form"><i class="fa fa-circle-o"></i>Add Machine Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_list"><i class="fa fa-circle-o"></i>Machine Type List</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Floor</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_list"><i class="fa fa-circle-o"></i>Sewing Floor List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_list"><i class="fa fa-circle-o"></i>Sewing Line List</a></li>

							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Others Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_insert_form"><i class="fa fa-circle-o"></i>Add Brand</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_list"><i class="fa fa-circle-o"></i>Brand List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/off_day_insert_form"><i class="fa fa-circle-o"></i>Add Off Day</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Machine</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_insert_form"><i class="fa fa-circle-o"></i>Add Machine Inventory</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line Return</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_transfer_list_form"><i class="fa fa-circle-o"></i>Machine Transfer List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_rent_list_form"><i class="fa fa-circle-o"></i>Machine Rent List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_running_line_list"><i class="fa fa-circle-o"></i>Machine IN Line List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair Return</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_repair_list_form"><i class="fa fa-circle-o"></i>Machine Repair List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_disposal_insert_form"><i class="fa fa-circle-o"></i>Add Machine Disposal</a></li> -->
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert_form"><i class="fa fa-circle-o"></i>Add Machine Sell</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_disposal_list"><i class="fa fa-circle-o"></i>Machine Disposal List</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '2') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_insert_form"><i class="fa fa-circle-o"></i>Add Machine Purpose</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_list"><i class="fa fa-circle-o"></i>Machine Purpose List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_insert_form"><i class="fa fa-circle-o"></i>Add Machine Name</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_list"><i class="fa fa-circle-o"></i>Machine List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_insert_form"><i class="fa fa-circle-o"></i>Add Model</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_list"><i class="fa fa-circle-o"></i>Model List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_insert_form"><i class="fa fa-circle-o"></i>Add Machine Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_list"><i class="fa fa-circle-o"></i>Machine Type List</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Floor</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_list"><i class="fa fa-circle-o"></i>Sewing Floor List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_list"><i class="fa fa-circle-o"></i>Sewing Line List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Others Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_insert_form"><i class="fa fa-circle-o"></i>Add Brand</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_list"><i class="fa fa-circle-o"></i>Brand List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/off_day_insert_form"><i class="fa fa-circle-o"></i>Add Off Day</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Machine</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_insert_form"><i class="fa fa-circle-o"></i>Add Machine Inventory</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_additional_info_insert_form"><i class="fa fa-circle-o"></i>Add Additional Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_requisition_insert_form"><i class="fa fa-circle-o"></i>Add Machine Requisition</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_requisition_list_form"><i class="fa fa-circle-o"></i>Machine Requisition List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_transfer_list_form"><i class="fa fa-circle-o"></i>Machine Transfer List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_rent_list_form"><i class="fa fa-circle-o"></i>Machine Rent List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_intransit_form"><i class="fa fa-circle-o"></i>IN Transit</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_running_line_list"><i class="fa fa-circle-o"></i>Machine IN Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_repair_list_form"><i class="fa fa-circle-o"></i>Machine Repair List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_disposal_insert_form"><i class="fa fa-circle-o"></i>Add Machine Disposal</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert_form"><i class="fa fa-circle-o"></i>Add Machine Sell</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_assetcode_print_form"><i class="fa fa-circle-o"></i>Machine A.Code Print</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>


			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '3') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_insert_form"><i class="fa fa-circle-o"></i>Add Machine Purpose</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_list"><i class="fa fa-circle-o"></i>Machine Purpose List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_insert_form"><i class="fa fa-circle-o"></i>Add Machine Name</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_list"><i class="fa fa-circle-o"></i>Machine List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_insert_form"><i class="fa fa-circle-o"></i>Add Model</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_list"><i class="fa fa-circle-o"></i>Model List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_insert_form"><i class="fa fa-circle-o"></i>Add Machine Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_list"><i class="fa fa-circle-o"></i>Machine Type List</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Floor</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_list"><i class="fa fa-circle-o"></i>Sewing Floor List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_list"><i class="fa fa-circle-o"></i>Sewing Line List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Others Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_insert_form"><i class="fa fa-circle-o"></i>Add Brand</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_list"><i class="fa fa-circle-o"></i>Brand List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/off_day_insert_form"><i class="fa fa-circle-o"></i>Add Off Day</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Machine</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_insert_form"><i class="fa fa-circle-o"></i>Add Machine Inventory</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_additional_info_insert_form"><i class="fa fa-circle-o"></i>Add Additional Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_requisition_insert_form"><i class="fa fa-circle-o"></i>Add Machine Requisition</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_requisition_list_form"><i class="fa fa-circle-o"></i>Machine Requisition List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_transfer_list_form"><i class="fa fa-circle-o"></i>Machine Transfer List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_rent_list_form"><i class="fa fa-circle-o"></i>Machine Rent List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_intransit_form"><i class="fa fa-circle-o"></i>IN Transit</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_running_line_list"><i class="fa fa-circle-o"></i>Machine IN Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_repair_list_form"><i class="fa fa-circle-o"></i>Machine Repair List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_disposal_insert_form"><i class="fa fa-circle-o"></i>Add Machine Disposal</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert_form"><i class="fa fa-circle-o"></i>Add Machine Sell</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_assetcode_print_form"><i class="fa fa-circle-o"></i>Machine A.Code Print</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '4') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_insert_form"><i class="fa fa-circle-o"></i>Add Machine Purpose</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_list"><i class="fa fa-circle-o"></i>Machine Purpose List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_insert_form"><i class="fa fa-circle-o"></i>Add Machine Name</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_list"><i class="fa fa-circle-o"></i>Machine List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_insert_form"><i class="fa fa-circle-o"></i>Add Model</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_list"><i class="fa fa-circle-o"></i>Model List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_insert_form"><i class="fa fa-circle-o"></i>Add Machine Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_list"><i class="fa fa-circle-o"></i>Machine Type List</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Floor</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_list"><i class="fa fa-circle-o"></i>Sewing Floor List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_list"><i class="fa fa-circle-o"></i>Sewing Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_assetcode_print_form"><i class="fa fa-circle-o"></i>Machine A.Code Print</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Others Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_insert_form"><i class="fa fa-circle-o"></i>Add Brand</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_list"><i class="fa fa-circle-o"></i>Brand List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/off_day_insert_form"><i class="fa fa-circle-o"></i>Add Off Day</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Machine</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
				<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
				<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_insert_form"><i class="fa fa-circle-o"></i>Add Machine Inventory</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_additional_info_insert_form"><i class="fa fa-circle-o"></i>Add Additional Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_requisition_insert_form"><i class="fa fa-circle-o"></i>Add Machine Requisition</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_requisition_list_form"><i class="fa fa-circle-o"></i>Machine Requisition List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_transfer_list_form"><i class="fa fa-circle-o"></i>Machine Transfer List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_rent_list_form"><i class="fa fa-circle-o"></i>Machine Rent List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_intransit_form"><i class="fa fa-circle-o"></i>IN Transit</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_running_line_list"><i class="fa fa-circle-o"></i>Machine IN Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_repair_list_form"><i class="fa fa-circle-o"></i>Machine Repair List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_disposal_insert_form"><i class="fa fa-circle-o"></i>Add Machine Disposal</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert_form"><i class="fa fa-circle-o"></i>Add Machine Sell</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '5') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_insert_form"><i class="fa fa-circle-o"></i>Add Machine Purpose</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_purpose_list"><i class="fa fa-circle-o"></i>Machine Purpose List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_insert_form"><i class="fa fa-circle-o"></i>Add Machine Name</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_name_list"><i class="fa fa-circle-o"></i>Machine List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_insert_form"><i class="fa fa-circle-o"></i>Add Model</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/model_list"><i class="fa fa-circle-o"></i>Model List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_insert_form"><i class="fa fa-circle-o"></i>Add Machine Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_type_list"><i class="fa fa-circle-o"></i>Machine Type List</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Floor</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_floor_list"><i class="fa fa-circle-o"></i>Sewing Floor List</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert_form"><i class="fa fa-circle-o"></i>Add Sewing Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/sewing_line_list"><i class="fa fa-circle-o"></i>Sewing Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_assetcode_print_form"><i class="fa fa-circle-o"></i>Machine A.Code Print</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Others Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_insert_form"><i class="fa fa-circle-o"></i>Add Brand</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/brand_list"><i class="fa fa-circle-o"></i>Brand List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/off_day_insert_form"><i class="fa fa-circle-o"></i>Add Off Day</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Machine</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Machine Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
				<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
				<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_insert_form"><i class="fa fa-circle-o"></i>Add Machine Inventory</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_list"><i class="fa fa-circle-o"></i>Machine Inventory List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_inventory_additional_info_insert_form"><i class="fa fa-circle-o"></i>Add Additional Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_requisition_insert_form"><i class="fa fa-circle-o"></i>Add Machine Requisition</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_requisition_list_form"><i class="fa fa-circle-o"></i>Machine Requisition List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Rent Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_transfer_list_form"><i class="fa fa-circle-o"></i>Machine Transfer List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_rent_list_form"><i class="fa fa-circle-o"></i>Machine Rent List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_intransit_form"><i class="fa fa-circle-o"></i>IN Transit</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Line Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/machine_running_line_list"><i class="fa fa-circle-o"></i>Machine IN Line List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_return_insert_form"><i class="fa fa-circle-o"></i>Add Machine Repair Return</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_machine_repair_list_form"><i class="fa fa-circle-o"></i>Machine Repair List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_disposal_insert_form"><i class="fa fa-circle-o"></i>Add Machine Disposal</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert_form"><i class="fa fa-circle-o"></i>Add Machine Sell</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>
		</ul>

	</section>
</aside>