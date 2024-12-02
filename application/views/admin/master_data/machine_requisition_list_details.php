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
			XLSX.writeFile(wb, 'machine_requisition_list_details.xlsx');
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
										<h3 class="box-title">Machine Requisition List Details</h3>
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
														<button id="downloadExcel" class="btn btn-success btn-xs">Download As Excel</button>
													</div>
												</div>
											</div>
										</div>
										<div class="table-responsive no-padding">
											<table id="tableData" class="table table-hover table-bordered">
												<thead style="background:#91b9e6;">
													<tr>
														<th title="Serial" data-column="0"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="1" checked><strong>SL</strong></label></th>
														<th title="Requisition ID" data-column="1"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="2" checked><strong>ID</strong></label></th>
														<th title="Factory" data-column="2"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="3" checked><strong>Factory</strong></label></th>
														<th title="Purpose" data-column="3"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="4" checked><strong>Purpose</strong></label></th>
														<th title="Machine Name" data-column="4"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="5" checked><strong>M.Name</strong></label></th>
														<th title="Machine Type" data-column="5"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="6" checked><strong>M.Type</strong></label></th>
														<th title="Line" data-column="6"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="7" checked><strong>Line</strong></label></th>
														<th title="Buyer" data-column="7"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="8" checked><strong>Buyer</strong></label></th>
														<th title="Style" data-column="8"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="9" checked><strong>Style</strong></label></th>
														<th title="oqty" data-column="9"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="10" checked><strong>O.Qty</strong></label></th>
														<th title="Input Date" data-column="10"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="11" checked><strong>I.Date</strong></label></th>
														<th title="Plan Qty" data-column="11"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="12" checked><strong>Plan</strong></label></th>
														<th title="In Hand Qty" data-column="12"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="13" checked><strong>I.Hand</strong></label></th>
														<th title="required Qty" data-column="13"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="14" checked><strong>Required</strong></label></th>
														<th title="From Date" data-column="14"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="15" checked><strong>F.Date</strong></label></th>
														<th title="To Date" data-column="15"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="16" checked><strong>T.Date</strong></label></th>
														<th title="Rate Cost Per Machine/Day(Tk)" data-column="16"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="17" checked><strong>P/R.Cost</strong></label></th>
														<th title="Total Plan Days" data-column="17"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="18" checked><strong>T.Plan Day</strong></label></th>
														<th title="Total Projected Rent Cost" data-column="18"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="19" checked><strong>T.Pro.RC</strong></label></th>
														<th title="Remarks" data-column="19"><label class="checkbox-inline"><input type="checkbox" class="column-select" data-col-index="20" checked><strong>remarks</strong></label></th>
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
														<th>&nbsp;</th>
														<th>&nbsp;</th>
														<th>&nbsp;</th>
														<th>&nbsp;</th>
														<th>&nbsp;</th>
														<th data-math="col-sum">col-sum</th>
														<th>&nbsp;</th>
														
													</tr>
												</tfoot>
												<tbody>
													<?php
													$i = 1;
													foreach ($ul as $row) { ?>
														<tr>
															<td style="vertical-align:middle;"><label class="checkbox-inline"><input type="checkbox" class="row-select" checked><?php echo $i++; ?></label></td>
															<td style="vertical-align:middle;"><?php echo $row['mriid']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['factoryid']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['mpurpose']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['slname']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['buyerid']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['styleid']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['oqty']; ?></td>
															<td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['idate'])); ?></td>
															<td style="vertical-align:middle;"><?php echo $row['planqty']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['inhandqty']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['planqty']-$row['inhandqty']; ?></td>
															<td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></td>
															<td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></td>
															<td style="vertical-align:middle;"><?php echo $row['rprice']; ?></td>
															<td style="vertical-align:middle;"><?php echo $usingday = $row['stayingday'] + 1 - $row['odcount']; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['rprice'] * $usingday; ?></td>
															<td style="vertical-align:middle;"><?php echo $row['rremarks']; ?></td>
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