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
                    <h3 class="box-title">Machine Rent Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_insert" method="post" enctype="multipart/form-data">
                      <!-- <input type="hidden" class="form-control" name="minvid" value="<?php echo $minvid; ?>">
                      <input type="hidden" class="form-control" name="macode" value="<?php echo $macode; ?>">
                      <input type="hidden" class="form-control" name="rminvid" value="<?php echo $rminvid; ?>">
                      <input type="hidden" class="form-control" name="cfactoryid" value="<?php echo $cfactoryid; ?>"> -->
                      <div class="row">
                        <div class="col-md-4">
                          <label>Current Factory<em>*</em></label>
                          <select class="form-control" name="cfactoryid" id="cfid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['factoryid']; ?>" <?php echo set_select('factoryid', $row['factoryid']); ?>><?php echo $row['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('fctoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Rent Factory<em>*</em></label>
                          <select class="form-control" name="dfid" id="dfid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['factoryid']; ?>" <?php echo set_select('factoryid', $row['factoryid']); ?>><?php echo $row['factoryname']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('fctoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Rent Days<em>*</em></label>
                          <input type="text" class="form-control rd" name="rd" id="rd" placeholder="Enter Rent Days" value="<?php echo set_value('rd'); ?>">
                          <?php echo form_error('mcode', '<div class="error">', '</div>');  ?>
                        </div>

                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-4">
                          <label>Rent Price<em>*</em></label>
                          <input type="text" class="form-control rp" name="rp" id="rp" placeholder="Enter Rent Price" value="<?php echo set_value('rp'); ?>">
                          <?php echo form_error('rp', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-4">
                          <label>Given Date<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name="rentdate" id="rentdate" value="<?php echo date('d-m-Y'); ?>">
                          <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                        </div>
                        <div class="col-md-4">
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
                      <div class="row">
                        <div class="col-md-12">
                          <label>Remarks</label>
                          <textarea class="form-control" name="remarks" rows="5" id="remarks"></textarea>
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

    <script>
      $(document).ready(function() {
        $("#mpid").change(function(event) {
          event.preventDefault();
          var mpid = $('#mpid').val();
          var cfid = $('#cfid').val();
          var dfid = $('#dfid').val();
          var rd = $('#rd').val();
          var rp = $('#rp').val();
          var rentdate = $('#rentdate').val();
          var remarks = $('#remarks').val();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Dashboard/purpose_wise_machine_inventory',
            dataType: "text",
            data: {
              mpid: mpid,
              cfactoryid: cfid,
              dfid: dfid,
              rd: rd,
              rp: rp,
              rentdate: rentdate,
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
        $(document).on('keydown', ".rd", function(event) {


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