<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }
</style>

<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-datepicker.css">


<script type="text/javascript">
  $(function() {
    jQuery("#year").datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years"
    });
  })
</script>

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
                    <h3 class="box-title">Off Day Insert</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body ">
                    <!-- <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/multiple_machine_line_allocate_insert" method="post" enctype="multipart/form-data"> -->
                    <div class="row">
                      <div class="col-md-5">
                        <label>Factory<em>*</em></label>
                        <input type="text" class="form-control" name="factoryid" id="factoryid" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
                      </div>
                      <div class="col-md-5">
                        <label>Year<em>*</em></label>
                        <input type="text" class="form-control year" readonly id="year" value="<?php echo date('Y'); ?>">
                      </div>
                      <!-- <div class="col-md-5">
                        <label>End Date<em>*</em></label>
                        <input type="text" class="form-control wd" readonly id="wd" value="<?php echo date('d-m-Y'); ?>">
                        </div> -->
                      <div class="col-md-2">
                        <label>&nbsp;</label>
                        <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                      </div>
                    </div>

                  </div>
                  <div id="ajax-content-container"></div>

                  <!-- <div class="box-footer text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                  </div> -->
                  <!-- </form> -->
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
  <!-- ./wrapper -->
  <script>
    $(document).ready(function() {
      $("#btn").click(function(event) {
        event.preventDefault();
        var year = $("#year").val();
        $.ajax({
          type: 'post',
          url: '<?php echo base_url(); ?>Dashboard/year_wise_date_month_list',
          dataType: "text",
          data: {
            year: year
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


</body>

</html>