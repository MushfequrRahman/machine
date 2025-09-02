<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Sewing Line Insert</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')): ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                        <?php if ($responce = $this->session->flashdata('Un Successfully')): ?>
                          <div class="text-center">
                            <div class="alert alert-danger text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body ">
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/sewing_line_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Factory<em>*</em></label>
                        <input type="text" class="form-control" readonly name="factoryid" value="<?php echo $this->session->userdata('factoryid'); ?>">
                        <!-- <select class="form-control" name="factoryid" id="factoryid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['factoryid']; ?>" <?php echo set_select('factoryid', $row['factoryid']); ?>><?php echo $row['factoryname']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?> -->
                      </div>
                      <div class="form-group">
												<label>Sewing Floor<em>*</em></label>
												<select class="form-control" name="sfnid" id="sfnid">
													<option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['sfnid']; ?>" <?php echo set_select('sfnid', $row['sfnid']); ?>><?php echo $row['sfname']; ?></option>
                          <?php
                          }
                          ?>
												</select>
												<?php echo form_error('sfnid', '<div class="error">', '</div>');  ?>
											</div>
                      <div class="form-group">
                        <label>Sewing Line Name<em>*</em></label>
                        <input type="text" class="form-control" name="sln" placeholder="Enter Sewing Line Name" value="<?php echo set_value('sln'); ?>">
                        <?php echo form_error('sln', '<div class="error">', '</div>');  ?>
                      </div>
                  </div>
                  <div class="box-footer text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <script type="text/javascript">
			$(document).ready(function() {

				$('#factoryid').change(function(event) {
					event.preventDefault();
					var factoryid = $('#factoryid').val();

					$.ajax({
						type: 'get',
						url: "<?php echo base_url(); ?>Dashboard/show_factory_wise_sewing_floor",
						dataType: "json",
						data: {
							factoryid: factoryid
						},
						success: function(res) {
							//$('#pgid').find('option');
							$('#sfnid').find('option').not(':first').remove();
							// Add options
							$.each(res, function(index, data) {
								$('#sfnid').append('<option value="' + data['sfnid'] + '">' + data['sfname'] + '</option>');
							});
						}
					});
				});
			});
		</script>