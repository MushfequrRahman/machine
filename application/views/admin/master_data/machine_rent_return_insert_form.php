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
                    <h3 class="box-title">Machine Rent Return Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/machine_rent_return_insert" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="minvid" value="<?php echo $minvid; ?>">
                    <input type="hidden" class="form-control" name="macode" value="<?php echo $macode; ?>">
                    <input type="hidden" class="form-control" name="rminvid" value="<?php echo $rminvid; ?>">  
                    <input type="hidden" class="form-control" name="cfactoryid" value="<?php echo $cfactoryid; ?>">
                    <input type="hidden" class="form-control" name="pfactoryid" value="<?php echo $pfactoryid; ?>">
                    
                      
                      <div class="form-group">
                          <label>Return Date<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name="returndate" value="<?php echo date('d-m-Y'); ?>">
                          <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                        </div>
                      <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" name="returnremarks" rows="5" id="returnremarks"></textarea>
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
      $(function() {
        jQuery(".pd").datepicker({
          dateFormat: 'dd-mm-yy'
        });
      })
    </script>
  