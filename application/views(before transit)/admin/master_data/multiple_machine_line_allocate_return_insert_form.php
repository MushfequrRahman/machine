<style>
        /* Hide the entire column visually without affecting filters */
        .hidden-column {
            display: none;
        }
    </style>
<script>
  $(function() {
    $("table").tablesorter({
      theme: 'blue',
      widgets: ['math', 'zebra', 'filter'],
      widgetOptions: {
        filter_hideFilters: false, // Ensures filters are shown even if column is hidden
        filter_ignoreCase: true,
        math_data: 'math', // data-math attribute
        math_ignore: [0, 1],
        math_none: 'N/A', // no matching math elements found (text added to cell)
        math_complete: function($cell, wo, result, value, arry) {
          var txt = '<span class="align-decimal">' +
            (value === wo.math_none ? '' : ' ') +
            result + '</span>';
          if ($cell.attr('data-math') === 'all-sum') {
            // when the "all-sum" is processed, add a count to the end
            return txt + ' (Sum of ' + arry.length + ' cells)';
          }
          return txt;
        },
        math_completed: function(c) {
          // c = table.config
          // called after all math calculations have completed
          console.log('math calculations complete', c.$table.find('[data-math="all-sum"]:first').text());
        },
        // see "Mask Examples" section
        math_mask: '#,##0.00',
        math_prefix: '', // custom string added before the math_mask value (usually HTML)
        math_suffix: '', // custom string added after the math_mask value
        // event triggered on the table which makes the math widget update all data-math cells (default shown)
        math_event: 'recalculate',
        // math calculation priorities (default shown)... rows are first, then column above/below,
        // then entire column, and lastly "all" which is not included because it should always be last
        math_priority: ['row', 'above', 'below', 'col'],
        // set row filter to limit which table rows are included in the calculation (v2.25.0)
        // e.g. math_rowFilter : ':visible:not(.filtered)' (default behavior when math_rowFilter isn't set)
        // or math_rowFilter : ':visible'; default is an empty string
        math_rowFilter: ''
      }
    });
    $('th[data-hidden-column="true"], td:nth-child(6)').addClass('hidden-column');
  });
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
                    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/multiple_machine_rent_return_insert" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Return Date<em>*</em></label>
                        <input type="text" class="form-control pd" readonly name="returndate" value="<?php echo date('d-m-Y'); ?>">
                        <?php /*?><?php echo form_error('dobdate', '<div class="error">', '</div>');  ?><?php */ ?>
                      </div>
                      <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" name="returnremarks" rows="5" id="returnremarks"></textarea>
                      </div>
                      <div class="table-responsive no-padding">
                        <table id="tableData" class="table table-hover table-bordered">
                          <thead style="background:#91b9e6;">
                            <tr>
                              <th>SL</th>
                              <!-- <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th>
                              <th style="display: none;"></th> -->
                              <th>Asset Code</th>
                              <th>Machine Code</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th data-hidden-column="true"></th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php
                            $i = 1;
                            foreach ($ul as $row) { ?>
                              <tr>
                                <td style="vertical-align:middle;"><input type="checkbox" class="check-all" name="macode[]" value="<?php echo $row['macode']; ?>"><?php echo $i++; ?></td>
                                <!-- <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="minvid[]" value="<?php echo $row['minvid']; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="cfactoryid" value="<?php echo $row['cfactoryid']; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="dfid" value="<?php echo $dfid; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rd" value="<?php echo $rd; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rp" value="<?php echo $rp; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rentdate" value="<?php echo $rentdate; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="remarks" value="<?php echo $remarks; ?>"></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rminvid[]" value="<?php echo $row['rminvid']; ?>"></td> -->
                                <td style="vertical-align:middle;"><?php echo $row['macode']; ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['mcode']; ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
                                <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="pfactoryid" value="<?php echo $row['pfactoryid']; ?>"></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
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
        // When any "check-all" checkbox is clicked
        $('.check-all').change(function() {
          // Get the parent row (tr) and find all item-checkboxes in that row
          const checked = $(this).is(':checked');
          $(this).closest('tr').find('.item-checkbox').prop('checked', checked);
        });

        // Optional: If any item-checkbox is unchecked, uncheck the check-all checkbox
        $('.item-checkbox').change(function() {
          const allChecked = $(this).closest('tr').find('.item-checkbox').length === $(this).closest('tr').find('.item-checkbox:checked').length;
          $(this).closest('tr').find('.check-all').prop('checked', allChecked);
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