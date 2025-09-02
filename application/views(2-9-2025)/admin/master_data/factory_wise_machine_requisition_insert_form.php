<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }

  label {
    font-size: 13px;
  }

  th {
    font-size: 13px;
  }

  tbody tr:nth-child(even) {
    background-color: #ffffff;
  }

  tbody tr:nth-child(odd) {
    background-color: #ebf2fa;
  }
</style>
<script>
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>
<?php
//$item = '';
$purpose = '';
//$mname = '';
$line = '';
$type = '';
// foreach ($il as $row) {
//   $item .= '<option value="' . $row["pcode"] . '">' . $row["item"] . '</option>';
// }
foreach ($ul as $row) {
  $purpose .= '<option value="' . $row["mpid"] . '">' . $row["mpurpose"] . '</option>';
}
foreach ($tl as $row) {
  $mtype .= '<option value="' . $row["mtid"] . '">' . $row["mtype"] . '</option>';
}
foreach ($sl as $row) {
  $line .= '<option value="' . $row["slnid"] . '">' . $row["slname"] . '</option>';
}
?>




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
                    <h3 class="box-title">Rental Machine Requisition</h3>
                    <?php /*?><div class="row">
						            <div class="col-sm-12 col-md-12 col-lg-12">
							          <?php if($responce = $this->session->flashdata('Successfully')): ?>
								        <div class="text-center">
									        <div class="alert alert-success text-center"><?php echo $responce;?></div>
								        </div>
							          <?php endif;?>
						          </div>
					            </div><?php */ ?>
                  </div>
                  <div class="box-body">
                    <span style="text-align:center" id="error"></span>
                    <div style="text-align:center" id="item_table"></div>
                    <?php /*?><form role="form" id="insert_form" autocomplete="off" method="post" action="<?php echo base_url();?>Dashboard/challanm_create" enctype="multipart/form-data"><?php */ ?>
                    <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $this->session->userdata('userid'); ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Factory<em>*</em></label>
                          <input type="text" class="form-control" name="factoryid" id="factoryid" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
                          <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-md-6">
                          <label>Requisition Submission Date<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name="mqrsdate" id="mqrsdate" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-md-12">
                          <label>Remarks</label>
                          <textarea class="form-control" name="remarks" rows="5" id="remarks"></textarea>
                          <?php echo form_error('remarks', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead style="background-color: #999999 !important;">
                              <tr>
                                <th style="text-align:center;">Purpose<em>*</em></th>
                                <th style="text-align:center;">Machine Name<em>*</em></th>
                                <th style="text-align:center;">Machine Type<em>*</em></th>
                                <th style="text-align:center;">Line<em>*</em></th>
                                <th style="text-align:center;">Buyer<em>*</em></th>
                                <th style="text-align:center;">Style<em>*</em></th>
                                <th style="text-align:center;">Order Qty<em>*</em></th>
                                <th style="text-align:center;">Input Date</th>
                                <th style="text-align:center;">Plan<em>*</em></th>
                                <th style="text-align:center;">In Hand<em>*</em></th>
                                <th style="text-align:center;">From Date</th>
                                <th style="text-align:center;">To Date</th>
                                <th style="text-align:center;">Rate/Per Day<em>*</em></th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                      </div>
                      <div class="box-footer text-center">
                        <!-- <input type="submit" class="btn btn-primary" name="submit" value="CREATE" /> -->
                        <label>&nbsp;</label>
                        <input type="submit" class="btn btn-primary " name="submit" id="btn" value="CREATE" />
                        <div id="response"></div>
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
  </div>


  <script>
    $(document).ready(function() {

      var count = 0;

      $(document).on('click', '.add', function() {
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><select name="purpose[]" class="form-control purpose" data-mcode="' + count + '"><option value="">Purpose</option><?php echo $purpose; ?></select></td>';
        html += '<td><select name="mcode[]" class="form-control mcode" id="mcode' + count + '"><option value="">Machine</option></select></td>';
        html += '<td><select name="mtype[]" class="form-control mtype" id="mtype' + count + '"><option value="">Type</option><?php echo $mtype; ?></select></td>';
        html += '<td><select name="line[]" class="form-control line" id="line' + count + '"><option value="">Line</option><?php echo $line; ?></select></td>';
        html += '<td><input type="text" name="buyer[]" class="form-control buyer" id="buyer' + count + '" /></td>';
        html += '<td><input type="text" name="style[]" class="form-control style" id="style"' + count + '" /></td>';
        html += '<td><input type="text" name="oqty[]" class="form-control oqty" id="oqty"' + count + ' /></td>';
        html += '<td><input type="text" name="idate[]" readonly class="form-control idate" id="idate' + count + '" value="<?php echo date('d-m-Y'); ?>" /></td>';
        html += '<td><input type="text" name="plan[]" class="form-control plan" id="plan"' + count + '" /></td>';
        html += '<td><input type="text" name="inhand[]" class="form-control inhand" id="inhand"' + count + '" /></td>';
        html += '<td><input type="text" name="fdate[]" readonly class="form-control fdate" fdate" id="fdate' + count + '" value="<?php echo date('d-m-Y'); ?>" /></td>';
        html += '<td><input type="text" name="tdate[]" readonly class="form-control tdate" tdate" id="tdate' + count + '" value="<?php echo date('d-m-Y'); ?>" /></td>';
        html += '<td><input type="text" name="price[]" class="form-control price" id="price"' + count + ' /></td>';
        // html += '<td><input type="text" name="mo[]" class="form-control mo" id="mo' + count + '" /></td>';
        // html += '<td><input type="text" name="mo[]" class="form-control mo" id="mo' + count + '" /></td>';



        html += '<td style="vertical-align:middle;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
        $('#item_table1').append(html);

        $('#idate' + count).datepicker({
          dateFormat: 'dd-mm-yy' // Adjust date format as needed
        });

        $('#fdate' + count).datepicker({
          dateFormat: 'dd-mm-yy' // Adjust date format as needed
        });

        $('#tdate' + count).datepicker({
          dateFormat: 'dd-mm-yy' // Adjust date format as needed
        });

      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });

      $(document).on('change', '.purpose', function() {
        var mpid = $(this).val();
        var mcode = $(this).data('mcode');
        $.ajax({
          url: "<?php echo base_url(); ?>Dashboard/show_machine",
          dataType: "json",
          method: "get",
          data: {
            mpid: mpid
          },
          success: function(data) {
            var html = '<option value="">Machine</option>';


            html += data;

            $('#mcode' + mcode).html(html);
          }
        })
      });

      $('#insert_form').on('submit', function(event) {
        event.preventDefault();
        var error = '';
        $('.purpose').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Purpose at' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.mcode').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Machine Name at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.mtype').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Machine Type at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.line').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Line at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.buyer').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Buyer at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.style').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Style at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.oqty').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Order Qty at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.plan').each(function() {
          var count = 1;

          if ($(this).val() == '') {
            error += '<p>Enter Plan at ' + count + ' row</p>';
            return false;
          }

          count = count + 1;

        });

        $('.inhand').each(function() {
          var count = 1;

          if ($(this).val() == '') {
            error += '<p>Enter In Hand at ' + count + ' row</p>';
            return false;
          }

          count = count + 1;

        });


        $('.price').each(function() {

          var count = 1;

          if ($(this).val() == '') {
            error += '<p>Enter Price at ' + count + ' Row</p> ';
            return false;
          }

          count = count + 1;

        });



        var form_data = $(this).serialize();
        //alert(form_data);
        //form_data = form_data.replaceAll(/["']/g, "");
        //form_data = form_data.replaceAll(/'/g,"\\'");


        if (error == '') {
          $('input[type="submit"]').attr('disabled', true);
          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/machine_requisition_insert",
            method: "post",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Machine Requisition Details Saved</div>');
                window.setTimeout(function() {
                  location.reload()
                }, 3000)
              }
            }
          });
        } else {
          $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }

      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('keydown', ".plan", function(event) {


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
      $(document).on('keydown', ".inhand", function(event) {


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
      $(document).on('keydown', ".oqty", function(event) {


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
  <!-- <script>
    $(document).ready(function() {
      $(document).bind("contextmenu", function(e) {
        return false;
      });
    });
  </script> -->