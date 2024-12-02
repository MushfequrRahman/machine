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
    });
  });
</script>


<div class="table-responsive no-padding">
  <table id="tableData" class="table table-hover table-bordered">
    <thead style="background:#91b9e6;">
      <tr>
        <th>SL</th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th style="display: none;"></th>
        <th>Asset Code</th>
        <th>Machine Code</th>
        <th>Name</th>
        <th>Type</th>
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
          <td style="vertical-align:middle;"><label class="checkbox-inline"><input type="checkbox" class="check-all" name="macode[]" value="<?php echo $row['macode']; ?>"><?php echo $i++; ?></label></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="minvid[]" value="<?php echo $row['minvid']; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="cfactoryid" value="<?php echo $row['cfactoryid']; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="dfid" value="<?php echo $dfid; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rd" value="<?php echo $rd; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rp" value="<?php echo $rp; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rentdate" value="<?php echo $rentdate; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="remarks" value="<?php echo $remarks; ?>"></td>
          <td style="vertical-align:middle;display: none;"><input type="checkbox" class="item-checkbox" name="rminvid[]" value="<?php echo $row['rminvid']; ?>"></td>
          <td style="vertical-align:middle;"><?php echo $row['macode']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['mcode']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
          <td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
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
