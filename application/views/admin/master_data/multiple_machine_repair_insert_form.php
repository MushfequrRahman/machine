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
                    <h3 class="box-title">Machine Repair</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/multiple_machine_repair_insert" method="post" enctype="multipart/form-data">
                      <!-- <input type="hidden" class="form-control" name="minvid" value="<?php echo $minvid; ?>">
                      <input type="hidden" class="form-control" name="macode" value="<?php echo $macode; ?>">
                      <input type="hidden" class="form-control" name="rminvid" value="<?php echo $rminvid; ?>">
                      <input type="hidden" class="form-control" name="cfactoryid" value="<?php echo $cfactoryid; ?>"> -->
                      <div class="row">
                        <div class="col-md-3">
                          <label>Factory<em>*</em></label>
                          <select class="form-control" name="cfactoryid" id="cfactoryid">
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
                        <div class="col-md-3">
                          <label>Date<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name="adate" id="adate" value="<?php echo date('d-m-Y'); ?>">
                          <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                        </div>
                        <!-- <div class="col-md-2">
                          <label>Line<em>*</em></label>
                          <select class="form-control" name="slnid" id="slnid">
                            <option value="">Select....</option>
                          </select>
                          <?php echo form_error('slnid', '<div class="error">', '</div>');  ?>
                        </div> -->
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

                        <br />
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
          var cfactoryid = $('#cfactoryid').val();
          var slnid = $('#slnid').val();
          var adate = $('#adate').val();
          var remarks = $('#remarks').val();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Dashboard/purpose_wise_repair_insert_machine_inventory',
            dataType: "text",
            data: {
              mpid: mpid,
              cfactoryid: cfactoryid,
              slnid: slnid,
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

    <!-- <script type="text/javascript">
      $(document).ready(function() {

        $('#cfactoryid').change(function(event) {
          event.preventDefault();
          var cfactoryid = $('#cfactoryid').val();

          $.ajax({
            type: 'get',
            url: "<?php echo base_url(); ?>Dashboard/show_factory_wise_sewing_line",
            dataType: "json",
            data: {
              cfactoryid: cfactoryid
            },
            success: function(res) {
              //$('#pgid').find('option');
              $('#slnid').find('option').not(':first').remove();
              // Add options
              $.each(res, function(index, data) {
                $('#slnid').append('<option value="' + data['slnid'] + '">' + data['slname'] + '</option>');
              });
            }
          });
        });
      });
    </script> -->
    <script type="text/javascript">
      $(function() {
        jQuery(".pd").datepicker({
          dateFormat: 'dd-mm-yy'
        });
      })
    </script>