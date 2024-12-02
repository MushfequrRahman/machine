<script>
  $(function() {
    $("table").tablesorter({
      theme: 'blue',
      widgets: ['math', 'zebra', 'filter'],
      widgetOptions: {
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
    }).on("filterEnd sortEnd", function() {
      countVisibleRows();
    });


    // Function to count visible rows
    function countVisibleRows() {
      var visibleRowsCount = $('#tableData tbody tr:visible').length;
      $('#rowCount').text("Rows: " + visibleRowsCount);
    }

    // Initial count of visible rows
    countVisibleRows(); // Start counting visible rows

    // Download selected rows and columns as Excel
    $("#downloadExcel").on("click", function() {
      var wb = XLSX.utils.book_new(); // Create a new workbook
      var ws_data = [];

      // Prepare header row based on selected columns
      var headers = [];
      $('#tableData thead th').each(function() {
        var $checkbox = $(this).find('.column-select');
        if ($checkbox.length === 0 || $checkbox.is(':checked')) {
          headers.push($(this).text());
        }
      });
      ws_data.push(headers); // Push headers as the first row

      // Add the selected rows
      $('#tableData tbody tr:visible').each(function() {
        var $checkbox = $(this).find('.row-select');
        if ($checkbox.is(':checked')) {
          var row = [];
          $(this).find('td').each(function(index) {
            var $colCheckbox = $(this).closest('table').find('thead th').eq(index).find('.column-select');
            if ($colCheckbox.length === 0 || $colCheckbox.is(':checked')) {
              row.push($(this).text());
            }
          });
          ws_data.push(row);
        }
      });

      // Create a worksheet from the data
      var ws = XLSX.utils.aoa_to_sheet(ws_data);
      XLSX.utils.book_append_sheet(wb, ws, "Selected Rows");

      // Export the Excel file
      XLSX.writeFile(wb, 'machine_inventory.xlsx');
    });
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
                    <h3 class="box-title">Machine Inventory List</h3>
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
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <div class="float-left">

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="float-right" style="text-align: right;">
                            <button id="downloadExcel" class="btn btn-success btn-xs"><i id="downloadExcel" class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive no-padding">
                      <table id="tableData" class="table table-hover table-bordered">
                        <thead style="background:#91b9e6;">
                          <tr>
                            <th title="Serial" data-column="0"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="1" checked><strong>SL</strong></label></th>
                            <th title="Perchase Factory ID" data-column="1"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="2" checked><strong>PF.ID</strong></label></th>
                            <th title="Perchase Factory Name" data-column="2"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="3" checked><strong>PF.Name</strong></label></th>
                            <th title="Current Factory ID" data-column="3"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="4" checked><strong>CF.ID</strong></label></th>
                            <th title="Purchase" data-column="4"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="5" checked><strong>Purpose</strong></label></th>
                            <th title="Machine Code" data-column="5"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="6" checked><strong>M.Code</strong></label></th>
                            <th title="Asset Code" data-column="6"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="7" checked><strong>A.Code</strong></label></th>
                            <th title="Machine Name" data-column="7"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="8" checked><strong>M.Name</strong></label></th>
                            <th title="Machine Model" data-column="8"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="9" checked><strong>M.Model</strong></label></th>
                            <th title="Machine Information" data-column="9"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="10" checked><strong>M.Info</strong></label></th>
                            <th title="Machine Type" data-column="10"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="11" checked><strong>M.Type</strong></label></th>
                            <th title="Brand Name" data-column="11"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="12" checked><strong>B.Name</strong></label></th>
                            <th title="Supplier Name" data-column="12"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="13" checked><strong>S.Name</strong></label></th>
                            <th title="Price" data-column="13"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="14" checked><strong>Price</strong></label></th>
                            <th title="Quantity" data-column="14"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="15" checked><strong>Qty</strong></label></th>
                            <th title="Perchase Date" data-column="15"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="16" checked><strong>P.Date</strong></label></th>
                            <th title="Warranty Period" data-column="16"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="17" checked><strong>Warranty</strong></label></th>
                            <th title="End Date" data-column="17"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="18" checked><strong>E.Date</strong></label></th>
                            <th title="Remaining Day" data-column="18"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="19" checked><strong>Remaining</strong></label></th>
                            <th title="Machine Description" data-column="19"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="20" checked><strong>M.Description</strong></label></th>
                            <th title="Machine Status" data-column="20"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="21" checked><strong>Status</strong></label></th>
                            <th title="Rent Date" data-column="21"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="22" checked><strong>R.Date</strong></label></th>
                            <th title="Rent Days" data-column="22"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="23" checked><strong>R.Days</strong></label></th>
                            <th title="Return Date" data-column="23"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="24" checked><strong>Ret.Date</strong></label></th>
                            <!-- <th data-column="24"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="25" checked><strong>Rent.Log</strong></label></th>
                            <th data-column="25"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="26" checked><strong>Repair.Log</strong></label></th> -->
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th id="rowCount"></th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th data-math="col-sum">col-sum</th>
                            <th data-math="col-sum">col-sum</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <!-- <th>&nbsp;</th>
                            <th>&nbsp;</th> -->
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($ul as $row) { ?>
                            <tr>
                              <td style="vertical-align:middle;"><label class="checkbox-inline"><input type="checkbox" class="row-select" checked><?php echo $i++; ?></label></td>
                              <td style="vertical-align:middle;"><?php echo $row['pfactoryid']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['factoryname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['cfactoryid']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['mpurpose']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['mcode']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['macode']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['model']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['minfo']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['brandname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['supplier']; ?></td>
                              <td style="vertical-align:middle;"><?php echo number_format($row['price'], 2, '.', ','); ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['miqty']; ?></td>
                              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['pdate'])); ?></td>
                              <?php
                              $convert = $row['warranty']; // days you want to convert
                              $years = ($convert / 365); // days / 365 days
                              $years = floor($years); // Remove all decimals
                              $month = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                              $month = floor($month); // Remove all decimals
                              $days = ($convert % 365) % 30.5; // the rest of days
                              // Echo all information set
                              //echo 'DAYS RECEIVE : '.$convert.' days<br>';
                              //echo $years.' years - '.$month.' month - '.$days.' days';
                              ?>
                              <td style="vertical-align:middle;"><?php echo $years . ' years - ' . $month . ' month - ' . $days . ' days'; ?></td>
                              <?php $enddate = date("d-m-Y", strtotime("+" . $row['warranty'] . " days", strtotime($row['pdate']))); ?>
                              <td style="vertical-align:middle;"><?php echo $enddate; ?></td>
                              <?php
                              $now = time(); // or your date as well
                              $enddate = strtotime($enddate);
                              $datediff = $enddate - $now;
                              $remain = round($datediff / (60 * 60 * 24));
                              ?>
                              <td style="vertical-align:middle;"><?php echo $remain; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['description']; ?></td>
                              <?php
                              if (($row['pfactoryid'] == $row['cfactoryid']) && $row['mistatus'] == '0') {
                              ?>
                                <td style="vertical-align:middle;">Free</td>
                              <?php
                              } elseif (($this->session->userdata('factoryid') == $row['cfactoryid']) && $row['mistatus'] == '1') {
                              ?>
                                <td style="vertical-align:middle;">Rent</td>
                              <?php
                              } elseif (($row['pfactoryid'] != $row['cfactoryid']) && $row['mistatus'] == '1') {
                              ?>
                                <td style="vertical-align:middle;">Transferred</td>
                              <?php
                              } elseif (($row['pfactoryid'] == $row['cfactoryid']) && $row['mistatus'] == '2') {
                              ?>
                                <td style="vertical-align:middle;">Line</td>
                              <?php
                              } elseif (($row['pfactoryid'] != $row['cfactoryid']) && $row['mistatus'] == '2') {
                              ?>
                                <td style="vertical-align:middle;">TF_Line_Using</td>
                              <?php
                              } 
                              
                              elseif (($row['pfactoryid'] == $row['cfactoryid']) && $row['mistatus'] == '3') {
                                ?>
                                  <td style="vertical-align:middle;">Repairing</td>
                                <?php
                                } elseif (($row['pfactoryid'] != $row['cfactoryid']) && $row['mistatus'] == '3') {
                                ?>
                                  <td style="vertical-align:middle;">TF_Repairing</td>
                                <?php
                                }
                              else {
                              ?>
                                <td style="vertical-align:middle;">Others</td>
                              <?php
                              }
                              ?>
                              <?php
                              if (($row['pfactoryid'] != $row['cfactoryid']) && $row['mistatus']!='3' && $row['rentdate']!=='0000-00-00') {
                              ?>
                                <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['rentdate'])); ?></td>
                                <td style="vertical-align:middle;"><?php echo $row['rentdays']; ?></td>
                                <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime("+" . $row['rentdays'] . " days", strtotime($row['rentdate']))); ?></td>
                              <?php
                              } else {
                              ?>
                                <td style="vertical-align:middle;"></td>
                                <td style="vertical-align:middle;"></td>
                                <td style="vertical-align:middle;"></td>
                              <?php
                              }
                              ?>
                              <!-- <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/single_machine_rent_list/<?php echo $row['rminvid']; ?>">Rent Log</a></td>
                              <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/single_machine_repair_list/<?php echo $row['rminvid']; ?>">Repair Log</a></td> -->
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  
