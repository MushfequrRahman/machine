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
                    <h3 class="box-title">Machine Name Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/machine_name_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
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
                      <div class="form-group">
                        <label>Code<em>*</em></label>
                        <input type="text" class="form-control" name="mcode" placeholder="Enter Machine Short Code" value="<?php echo set_value('mcode'); ?>">
                        <?php echo form_error('mcode', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Machine Name<em>*</em></label>
                        <input type="text" class="form-control" name="mname" placeholder="Enter Machine Name" value="<?php echo set_value('mname'); ?>">
                        <?php echo form_error('mname', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Machine Short Info</label>
                        <input type="text" class="form-control" name="minfo" placeholder="Enter Short Machine Info" value="<?php echo set_value('minfo'); ?>">
                        <?php echo form_error('minfo', '<div class="error">', '</div>');  ?>
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
  