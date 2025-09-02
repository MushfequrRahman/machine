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
                    <h3 class="box-title">Machine Inventory Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/machine_inventory_insert" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Factory<em>*</em></label>
                          <input type="text" class="form-control" name="factoryid" id="factoryid" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
                          <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Machine Purpose<em>*</em></label>
                          <select class="form-control" name="mpid" id="mpid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['mpid']; ?>" <?php echo set_select('mpid', $row['mpid']); ?>><?php echo $row['mpurpose']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('mpid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Machine Name<em>*</em></label>
                          <select class="form-control" name="mcode" id="mcode">
                            <option value="">Select....</option>
                          </select>
                          <?php echo form_error('mcode', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-4">
                          <label>Model<em>*</em></label>
                          <select class="form-control" name="monid" id="monid">
                            <option value="">Select....</option>
                          </select>
                          <?php echo form_error('monid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Machine Type<em>*</em></label>
                          <select class="form-control" name="mtid" id="mtid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($tl as $row) {
                            ?>
                              <option value="<?php echo $row['mtid']; ?>" <?php echo set_select('mtid', $row['mtid']); ?>><?php echo $row['mtype']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('mtid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Brand<em>*</em></label>
                          <select class="form-control" name="brandid" id="brandid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($bl as $row) {
                            ?>
                              <option value="<?php echo $row['brandid']; ?>" <?php echo set_select('brandid', $row['brandid']); ?>><?php echo $row['brandname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('brandid', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-4">
                          <label>Supplier<em>*</em></label>
                          <select class="form-control" name="supplierid" id="supplierid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($sl as $row) {
                            ?>
                              <option value="<?php echo $row['supplierid']; ?>" <?php echo set_select('supplierid', $row['supplierid']); ?>><?php echo $row['supplier']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('supplierid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-2">
                          <label>Purchase Date<em>*</em></label>
                          <input type="text" class="form-control pd" name="pdate" value="<?php echo date('d-m-Y'); ?>">
                          <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                        </div>
                        <div class="col-md-2">
                          <label>Price<em>*</em></label>
                          <input type="text" class="form-control price" name="price" placeholder="Enter Unit Price">
                          <?php echo form_error('price', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-2">
                          <label>Warranty<em>*</em></label>
                          <input type="text" class="form-control wr" name="wr" placeholder="Enter Warranty(Day)">
                          <?php echo form_error('wr', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-2">
                          <label>Qty<em>*</em></label>
                          <input type="text" class="form-control price" name="pqty" placeholder="Enter Purchase Qty">
                          <?php echo form_error('pqty', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-12">
                          <label>Description</label>
                          <textarea class="form-control" name="description" rows="5" id="description"></textarea>
                          <?php echo form_error('description', '<div class="error">', '</div>');  ?>
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
        </div>
      </section>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {

        $('#mpid').change(function(event) {
          event.preventDefault();
          var mpid = $('#mpid').val();

          $.ajax({
            type: 'get',
            url: "<?php echo base_url(); ?>Dashboard/show_machinename",
            dataType: "json",
            data: {
              mpid: mpid
            },
            success: function(res) {
              //$('#pgid').find('option');
              $('#mcode').find('option').not(':first').remove();
              // Add options
              $.each(res, function(index, data) {
                $('#mcode').append('<option value="' + data['mcode'] + '">' + data['mname'] + '</option>');
              });
            }
          });
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {

        $('#mcode').change(function(event) {
          event.preventDefault();
          //var monid = $('#monid').val();
          var mcode = $('#mcode').val();
          $.ajax({
            type: 'get',
            url: "<?php echo base_url(); ?>Dashboard/show_modelname",
            dataType: "json",
            data: {
              //monid: monid,
              mcode: mcode
            },
            success: function(res) {
              //$('#psgid').find('option');
              $('#monid').find('option').not(':first').remove();
              // Add options
              $.each(res, function(index, data) {
                $('#monid').append('<option value="' + data['monid'] + '">' + data['model'] + '</option>');
              });
            }
          });
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {
        jQuery(".pd").datepicker({
          dateFormat: 'dd-mm-yy'
        });
      })
    </script>
    <script>
      $(document).ready(function() {
        $(document).on('keydown', ".price", function(event) {


          if (event.shiftKey == true) {
            event.preventDefault();
          }

          if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

          } else {
            event.preventDefault();
          }

          if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();

        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $(document).on('keydown', ".wr", function(event) {


          if (event.shiftKey == true) {
            event.preventDefault();
          }

          if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

          } else {
            event.preventDefault();
          }

          if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();

        });
      });
    </script>