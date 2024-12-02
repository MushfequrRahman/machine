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
                    <span style="text-align:center" id="error"></span>
                    <div style="text-align:center" id="item_table"></div>
                    <!-- <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/sewing_line_insert" method="post" enctype="multipart/form-data"> -->
                    <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Factory<em>*</em></label>
                        <select class="form-control" name="factoryid" id="factoryid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['factoryid']; ?>" <?php echo set_select('factoryid', $row['factoryid']); ?>><?php echo $row['factoryname']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Sewing Floor<em>*</em></label>
                        <select class="form-control sfnid" name="sfnid" id="sfnid">
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
                      <!-- <div class="form-group">
                        <label>Sewing Line Name<em>*</em></label>
                        <input type="text" class="form-control" name="sln" id="slnid" placeholder="Enter Sewing Line Name" value="<?php echo set_value('sln'); ?>">
                        <?php echo form_error('sln', '<div class="error">', '</div>');  ?>
                      </div> -->
                      <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead>
                              <tr>
                                <th style="text-align:center; font-size:14px !important;">Sewing Line Name<em>*</em></th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
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

<script>
      $(document).ready(function() {

        var count = 0;

        $(document).on('click', '.add', function() {
          count++;
          var html = '';
          html += '<tr>';
          html += '<td><input type="text" name="sln[]" class="form-control sln" id="sln' + count + '" /></td>';

          html += '<td style="vertical-align:middle;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
          $('#item_table1').append(html);
        });

        $(document).on('click', '.remove', function() {
          $(this).closest('tr').remove();
        });


        $('#insert_form').on('submit', function(event) {
          event.preventDefault();
          var error = '';
          $('.sfnid').each(function() {
            var count = 1;
            if ($(this).val() == '') {
              error += '<p>Enter Sewing Floor Name ' + count + ' Row</p>';
              return false;
            }
            count = count + 1;
          });
          $('.sln').each(function() {
            var count = 1;
            if ($(this).val() == '') {
              error += '<p>Enter Sewing Line Name ' + count + ' Row</p>';
              return false;
            }
            count = count + 1;
          });
          var form_data = $(this).serialize();
          //alert(form_data);
          //form_data = form_data.replaceAll(/["']/g, "");
          //form_data = form_data.replaceAll(/'/g,"\\'");


          if (error == '') {
            $('input[type="submit"]').attr('disabled', true);
            $.ajax({
              url: "<?php echo base_url(); ?>Dashboard/multiple_sewing_line_insert",
              method: "post",
              data: form_data,
              success: function(data) {
                //alert(url);
                if (data == 'ok') {
                  document.forms['insert_form'].reset();
                  $('#item_table1').find('tr:gt(0)').remove();
                  $('#error').html('<div class="alert alert-success">Sewing Line Name Saved</div>');
                  window.setTimeout(function() {
                    location.reload()
                  }, 3000)
                }
              }
            });
          } else {
            $('#error').html('<div class="alert alert-danger">' + error + '</div>');
          }

        });

      });
    </script>