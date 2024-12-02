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

    // $('th[data-hidden-column="true"], td:nth-child(7)').addClass('hidden-column');
    // $('th[data-hidden-column="true"], td:nth-child(8)').addClass('hidden-column');
    // $('th[data-hidden-column="true"], td:nth-child(9)').addClass('hidden-column');
    // $('th[data-hidden-column="true"], td:nth-child(10)').addClass('hidden-column');
    // $('th[data-hidden-column="true"], td:nth-child(11)').addClass('hidden-column');
    // $('th[data-hidden-column="true"], td:nth-child(12)').addClass('hidden-column');
  });
</script>


<!-- /.box-header -->
<div class="box-body">
  <!-- <div class="row">
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
  </div> -->

  <div class="table-responsive  no-padding">
    <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/year_wise_off_day_insert" method="post" enctype="multipart/form-data">
      <table id="tableData" class="table table-hover table-bordered">
        <thead style="background:#91b9e6;">
          <tr>
            <th title="Serial" data-column="0"><strong>SL</strong></th>
            <th title="Date" data-column="1"><strong>Date</strong></th>
            <th title="Day" data-column="2"><strong>Day</strong></th>
            <th title="Month" data-column="3"><strong>Month</strong></th>
            <th title="Year" data-column="4"><strong>Year</strong></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th id="rowCount"></th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>

          </tr>
        </tfoot>
        <tbody>
          <?php
          $i = 1;
          foreach ($calendarData as $row) { ?>
            <tr>
              <td style="vertical-align:middle;"><input type="checkbox" class="check-all" name="offdate[]" value="<?php echo $row['date']; ?>"><?php echo $i++; ?></td>
              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['date'])); ?></td>
              <td style="vertical-align:middle;"><?php echo $row['day']; ?></td>
              <td style="vertical-align:middle;"><?php echo $row['month']; ?></td>
              <td style="vertical-align:middle;"><?php echo $row['year']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="box-footer text-center">
        <input type="submit" class="btn btn-primary insert" name="submit" value="Submit" />
      </div>
    </form>
  </div>
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
  $(".insert").click(function() {

    if ($('.check-all').filter(':checked').length < 1) {

      alert("Please Check at least one Color Box");

      return false;

    }
    //  else{

    //      alert("Proceed");

    //  }

  });
</script>