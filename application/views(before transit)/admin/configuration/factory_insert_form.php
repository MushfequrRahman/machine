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
                    <h3 class="box-title">Factory Insert</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')): ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body ">
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/fac_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Factory Type<em>*</em></label>
                        <select class="form-control" name="ftypeid" id="ftypeid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['ftypeid']; ?>" <?php echo set_select('ftypeid', $row['ftypeid']); ?>><?php echo $row['ftype']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('ftypeid', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>ID<em>*</em></label>
                        <input type="text" class="form-control" name="facid" placeholder="Enter Factory ID" value="<?php echo set_value('facid'); ?>">
                        <?php echo form_error('facid', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Name<em>*</em></label>
                        <input type="text" class="form-control" name="facname" placeholder="Enter factory Name" value="<?php echo set_value('facname'); ?>">
                        <?php echo form_error('facname', '<div class="error">', '</div>');  ?>
                      </div>
                      <div class="form-group">
                        <label>Address<em>*</em></label>
                        <input type="text" class="form-control" name="fac_address" placeholder="Enter Factory Address" value="<?php echo set_value('fac_address'); ?>">
                        <?php echo form_error('fac_address', '<div class="error">', '</div>');  ?>
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
  