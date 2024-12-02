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
                    <h3 class="box-title">Single Machine Repair Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/single_machine_repair_insert" method="post" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="minvid" value="<?php echo $minvid; ?>">
                      <input type="hidden" class="form-control" name="macode" value="<?php echo $macode; ?>">
                      <input type="hidden" class="form-control" name="rminvid" value="<?php echo $rminvid; ?>">
                      <input type="hidden" class="form-control" name="cfactoryid" value="<?php echo $cfactoryid; ?>">


                      <div class="form-group">
                        <label>Repair Price<em>*</em></label>
                        <input type="text" class="form-control rp" name="rp" placeholder="Enter Repair Price" value="<?php echo set_value('rp'); ?>">
                        <?php echo form_error('rp', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Repair Date<em>*</em></label>
                        <input type="text" class="form-control pd" readonly name="rd" value="<?php echo date('d-m-Y'); ?>">
                        <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                      </div>
                      <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" name="remarks" rows="5" id="remarks"></textarea>
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