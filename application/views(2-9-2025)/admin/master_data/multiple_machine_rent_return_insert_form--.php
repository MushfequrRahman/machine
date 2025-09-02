<script>
  $(function() {
    $("table").tablesorter({
      theme: 'blue',
      widgets: ['math', 'zebra', 'filter'],
      widgetOptions: {
        filter_hideFilters: false,  // Ensures filters are shown even if column is hidden
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
    // Hide columns marked as hidden-column using the data attribute
    $('th[data-hidden-column="true"], td:nth-child(3)').addClass('hidden-column');
  });
</script>
<style>
        /* Hide the entire column visually without affecting filters */
        .hidden-column {
            display: none;
        }
    </style>



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
                  <table id="myTable" class="tablesorter">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th data-hidden-column="true">Details</th> <!-- Mark this column for hiding -->
            <th>Age 1</th>
        </tr>
        <!-- <tr>
            <th><input type="text" class="filter" data-column="0" placeholder="Filter by Name"></th>
            <th><input type="text" class="filter" data-column="1" placeholder="Filter by Age"></th>
            <th data-hidden-column="true"><input type="text" class="filter" data-column="2" placeholder="Filter by Details"></th>
        </tr> -->
    </thead>
    <tbody>
        <tr>
            <td>John</td>
            <td>30</td>
            <td>John's details go here.</td>
            <td>John.</td>
        </tr>
        <tr>
            <td>Jane</td>
            <td>25</td>
            <td>Jane's details go here.</td>
            <td>John 1.</td>
        </tr>
    </tbody>
</table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>
    <!-- <script>
$(document).ready(function() {
    // Initialize tablesorter with the filter widget
    $("#myTable").tablesorter({
        theme: 'default',
        widgets: ['filter'],
        widgetOptions: {
            filter_hideFilters: false,  // Ensures filters are shown even if column is hidden
            filter_ignoreCase: true
        }
    });

    // Hide columns marked as hidden-column using the data attribute
    $('th[data-hidden-column="true"], td:nth-child(3)').addClass('hidden-column');
});
</script> -->
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