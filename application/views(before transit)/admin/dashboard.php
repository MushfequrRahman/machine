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
			<section class="content-header">
				<h1>Dashboard</h1>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-danger">
									<div class="box-header with-border">
										<?php $this->session->userdata('userid'); ?>
										<?php $this->session->userdata('user_type'); ?>
										<h3 class="box-title"></h3>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-6">
													<div class="float-left">

													</div>
												</div>
												<div class="col-md-6">
													<div class="float-right" style="text-align: right;">
														<button id="downloadExcel" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive no-padding">
													<table id="tableData" class="table table-hover table-bordered">
														<thead style="background:#91b9e6;">
															<tr>
																<th data-column="0"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="1" checked><strong>SL</strong></label></th>
																<th data-column="1"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="2" checked><strong>Factory</strong></label></th>
																<th data-column="2"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="3" checked><strong>Name</strong></label></th>
																<th data-column="3"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="4" checked><strong>Purpose</strong></label></th>
																<th data-column="4"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="5" checked><strong>Type</strong></label></th>
																<th data-column="5"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="6" checked><strong>In Line</strong></label></th>
																<th data-column="6"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="7" checked><strong>Repair</strong></label></th>
																<th data-column="7"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="8" checked><strong>Transfer</strong></label></th>
																<th data-column="8"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="9" checked><strong>Rent</strong></label></th>
																<th data-column="9"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="10" checked><strong>Total Free Machine</strong></label></th>
																<th data-column="10"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="11" checked><strong>Total IN House Machine</strong></label></th>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th id="rowCount"></th>
																<th>&nbsp;</th>
																<th>&nbsp;</th>
																<th>&nbsp;</th>
																<th>&nbsp;</th>
																<th data-math="col-sum">col-sum</th>
																<th data-math="col-sum">col-sum</th>
																<th data-math="col-sum">col-sum</th>
																<th data-math="col-sum">col-sum</th>
																<th data-math="col-sum">col-sum</th>
																<th data-math="col-sum">col-sum</th>
															</tr>
														</tfoot>
														<tbody>
															<?php
															$i = 1;
															foreach ($ul as $row) { ?>
																<tr>
																	<td style="vertical-align:middle;"><label class="checkbox-inline"><input type="checkbox" class="row-select" checked><?php echo $i++; ?></label></td>
																	<td style="vertical-align:middle;"><?php echo $row['factoryid']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['mpurpose']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['totalmachineinline']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['totalmachineinrepair']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['totalmachinetransfer']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['totalmachinerent']; ?></td>
																	
																	<!-- <?php
																	if(($row['factoryid']==$row['pfactoryid'])&& ($row['factoryid']!=$row['cfactoryid']))
																	{
																		?>
																		<td style="vertical-align:middle;"><?php echo $row['totalmachinetransfer']; ?></td>
																		<?php
																	}
																	else
																	{
																		?>
																		<td style="vertical-align:middle;">0</td>
																		
																		<?php
																	}
																	if(($row['factoryid']!=$row['pfactoryid'])){
																		?>
																		<td style="vertical-align:middle;"><?php echo $row['totalmachinetransfer']; ?></td>
																		<?php
																	}
																	else
																	{
																		?>
																		<td style="vertical-align:middle;">0</td>
																		
																		<?php
																	}
																	?> -->

																	
																	<td style="vertical-align:middle;"><?php echo $row['totalfreemachine']+$row['totalfreemachiner']; ?></td>
																	<td style="vertical-align:middle;"><?php echo $row['totalinhousemachine']; ?></td>
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
					</div>
				</div>
			</section>
		</div>