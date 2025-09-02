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
                    <h3 class="box-title">Machine Sell</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/multiple_machine_sell_insert" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-2">
                          <label>Current Factory<em>*</em></label>
                          <input type="text" class="form-control" name="cfactoryid" id="cfactoryid" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
                          <?php echo form_error('fctoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Sell Factory<em>*</em></label>
                          <!-- <input type="text" class="form-control" name="rfactoryid" id="rfactoryid" readonly value="<?php echo $this->session->userdata('factoryid'); ?>"> -->
                          <select class="form-control" name="sfactoryid" id="sfactoryid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['factoryid']; ?>" <?php echo set_select('factoryid', $row['factoryid']); ?>><?php echo $row['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('sfctoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-3">
                          <label>Date<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name="adate" id="adate" value="<?php echo date('d-m-Y'); ?>">
                          <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                        </div>
                        <div class="col-md-2">
                          <label>Sell Price<em>*</em></label>
                          <input type="text" class="form-control price" name="price" placeholder="Enter Unit Price">
                          <?php echo form_error('price', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-2">
                          <label>Machine Purpose<em>*</em></label>
                          <select class="form-control" name="mpid" id="mpid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($pl as $row) {
                            ?>
                              <option value="<?php echo $row['mpid']; ?>" <?php echo set_select('mpid', $row['mpid']); ?>><?php echo $row['mpurpose']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('mpid', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      
                      
                      <div id="ajax-content-container"></div>
                      <br />
                      <!-- <div class="row">
                        <div class="col-md-12">
                          <label>Remarks</label>
                          <textarea class="form-control" name="remarks" rows="5" id="remarks"></textarea>
                        </div>
                      </div> -->
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

    <script>
      $(document).ready(function() {
        $("#mpid").change(function(event) {
          event.preventDefault();
          var mpid = $('#mpid').val();
          var cfactoryid = $('#cfactoryid').val();
          var sfactoryid = $('#sfactoryid').val();
          // var slnid = $('#slnid').val();
          var price = $('#price').val();
          var adate = $('#adate').val();
          var remarks = $('#remarks').val();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Dashboard/purpose_wise_sell_insert_machine_inventory',
            dataType: "text",
            data: {
              mpid: mpid,
              cfactoryid: cfactoryid,
              sfactoryid: sfactoryid,
              // slnid: slnid,
              price: price,
              adate: adate,
              remarks: remarks
            },
            success: function(data) {
              $('#ajax-content-container').html(data);

            },
            error: function() {
              alert('error!');
            }

          });
        });
      });
    </script>


    <script>
      $(document).ready(function() {
        $("#sfactoryid").change(function(event) {
          event.preventDefault();
          var mpid = $('#mpid').val();
          var cfactoryid = $('#cfactoryid').val();
          var sfactoryid = $('#sfactoryid').val();
          // var slnid = $('#slnid').val();
          var price = $('#price').val();
          var adate = $('#adate').val();
          var remarks = $('#remarks').val();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Dashboard/purpose_wise_sell_insert_machine_inventory',
            dataType: "text",
            data: {
              mpid: mpid,
              cfactoryid: cfactoryid,
              sfactoryid: sfactoryid,
              // slnid: slnid,
              price: price,
              adate: adate,
              remarks: remarks
            },
            success: function(data) {
              $('#ajax-content-container').html(data);

            },
            error: function() {
              alert('error!');
            }

          });
        });
      });
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

    <script type="text/javascript">
      $(function() {
        jQuery(".pd").datepicker({
          dateFormat: 'dd-mm-yy'
        });
      })
    </script>