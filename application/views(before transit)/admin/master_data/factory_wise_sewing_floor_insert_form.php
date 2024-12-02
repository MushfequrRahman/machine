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
                    <h3 class="box-title">Sewing Floor Insert</h3>
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/sewing_floor_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Factory<em>*</em></label>
                        <input type="text" class="form-control" readonly name="factoryid" value="<?php echo $this->session->userdata('factoryid'); ?>">
                      </div>
                      <div class="form-group">
                        <label>Sewing Floor Name<em>*</em></label>
                        <input type="text" class="form-control" name="sfn" placeholder="Enter Sewing Floor Name" value="<?php echo set_value('sfn'); ?>">
                        <?php echo form_error('sfn', '<div class="error">', '</div>');  ?>
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