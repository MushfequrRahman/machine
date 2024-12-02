<style>
  .wrapper {
    margin: 0 auto;
    width: 700px;

  }

  #tableData {
    width: 690px;
  }

  #tableData,
  th,
  td {
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black;
    padding: 4px;
    margin: auto;
  }

  th {
    font-size: 12px;
    text-align: center;
  }


  td {
    font-size: 10px;
    text-align: center;
  }

  td {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .top {
    width: 700px;
    height: 150px;
    font-size: 22px;

  }

  .top1 {
    margin: auto;
    font-size: 12px;
    width: 700px;
    text-align: center;

  }

  /* .top2 {
    
    width: 600px;
    font-size: 18px;
    
  } */

  .text-left {
    float: left;
    width: 233px;
    font-size: 12px;
    text-align: left;


  }

  .text-middle {
    float: left;
    width: 233px;
    font-size: 12px;
    text-align: center;

  }

  .text-right {
    float: right;
    width: 115px;
    font-size: 12px;
    text-align: center;

  }

  .text-bottom {
    font-size: 10px;
    margin: 0 0 30px 0;
  }

  .middle {
    margin: 10px 0 0 0;
    width: 700px;
  }

  .bottom {
    margin: 20px 0 0 0;
    width: 700px;
    font-size: 12px;
  }

  .bottom1 {
    float: left;
    width: 140px;
    text-align: left;
    /*text-decoration: overline;*/

  }

  .bottom2 {
    float: left;
    width: 140px;
    text-align: center;
    /*text-decoration: overline;*/

  }

  .bottom3 {
    float: left;
    width: 140px;
    text-align: right;
    /*text-decoration: overline;*/

  }

  .bottom4 {
    float: left;
    width: 140px;
    text-align: right;
    /*text-decoration: overline;*/

  }

  .bottom5 {
    float: left;
    width: 140px;
    text-align: right;
    /*text-decoration: overline;*/

  }

  /*.text-bottom span strong {
    border-bottom: 2px dotted black;
  }*/
  #background {
    position: absolute;
    z-index: 0;
    background: white;
    display: block;
    min-height: 50%;
    min-width: 50%;
    top: 80%;
    left: -170%;
  }



  #bg-text {
    color: lightgrey;
    font-size: 70px;
    transform: rotate(300deg);
    -webkit-transform: rotate(300deg);
  }
</style>

<body>
  <?php date_default_timezone_set('Asia/Dhaka'); ?>
  <div class="wrapper">
    <div class="top">
      <div class="top1">
        <h3><img style="width:80px; height:35px; margin:0 15px 0 0;" src="<?php echo base_url() . 'assets/images/babylon.png'; ?>" alt="logo"></h3>
        <!-- <span><strong>BABYLON GROUP</strong></span> -->
        <!-- <br /> -->
        <?php
        foreach ($fl as $row) {
        ?>
          <span><?php $row['factoryname']; ?></span>
          <br />
          <span><?php $row['factory_address']; ?></span>
        <?php
        }
        ?>
        <span><?php echo $row['factoryname']; ?></span>
        <br />
        <span><?php echo $row['factory_address']; ?></span>
        <br />
        <p style="text-decoration:underline;">Rental Machine Requisition</p>

        <?php
        $i = 1;
        foreach ($ril as $row) { ?>
          <?php $row['mriid']; ?>
          <?php $row['mqrsdate']; ?>

        <?php
        }
        ?>
        <div class="text-left">
          <span><strong>Requisition No:</strong></span><span><?php echo $row['mriid']; ?></span>
        </div>

        <div class="text-right">
          <span><strong>Date:</strong><?php echo date("d-m-Y", strtotime($row['mqrsdate']));  ?></span>

        </div>
      </div>
    </div>
    <div class="middle">
      <p style="text-align:center;"><strong>Machine Details</strong></p>
      <table id="tableData">
        <thead>
          <tr>
            <th>SL</th>
            <th>Purpose</th>
            <th>Machine Name</th>
            <th>Type</th>
            <th>Line</th>
            <th>Buyer</th>
            <th>Style</th>
            <th>Order Qty</th>
            <th>Input Date</th>
            <th>Plan</th>
            <th>IN Hand</th>
            <th>Required</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Rate Cost Per MC/Day(TK)</th>
            <th>Total Days Plan</th>
            <th>Total Projected Rent Cost</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $ttotal = 0;
          foreach ($ul as $row) { ?>
            <tr>
              <td style="vertical-align:middle;"><?php echo $i++; ?></td>
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
              <td style="vertical-align:middle;"><?php echo $row['planqty'] - $row['inhandqty']; ?></td>
              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['fdate'])); ?></td>
              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['tdate'])); ?></td>
              <td style="vertical-align:middle;"><?php echo $row['rprice']; ?></td>
              <td style="vertical-align:middle;"><?php echo $usingday = $row['stayingday'] + 1 - $row['odcount']; ?></td>
              <td style="vertical-align:middle;"><?php echo $total=$row['rprice'] * $usingday; ?></td>
            </tr>
          <?php 
      $ttotal += $total;
        } ?>
        </tbody>
        <tr>
        <td colspan="16" style="vertical-align:middle;"><strong>Total Taka:</strong></td>
        <td><strong><?php echo $ttotal; ?></strong></td>
      </table>
      <br />
      <table id="tableData">
        <thead>
          <tr>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($ril as $row) { ?>
            <tr>
              <td style="vertical-align:middle;"><?php echo $row['rremarks']; ?></td>
            <?php } ?>
        </tbody>
      </table>

      <br />
      <p style="text-align:center;"><strong>Running Rental Machine Summary</strong></p>
      <table id="tableData">
        <thead>
          <tr>
            <th>Machine Name</th>
            <th>Type</th>
            <th>Set</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($rl as $row) { ?>
            <tr>
              <td style="vertical-align:middle;"><?php echo $row['mname']; ?></td>
              <td style="vertical-align:middle;"><?php echo $row['mtype']; ?></td>
              <td style="vertical-align:middle;"><?php echo $row['totalmachinerent']; ?></td>
            <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="bottom">
      <div class="bottom1">
        <p>Prepared By</p>
      </div>
      <div class="bottom2">
        <p>Maintenance</p>
      </div>
      <div class="bottom3">
        <p>IE Dept</p>
      </div>
      <div class="bottom4">
        <p>Pro/Fac. Head</p>
      </div>
      <div class="bottom4">
        <p>COO</p>
      </div>
    </div>
    <p style="text-align:center; font-size:10px;">This Is System Generated Document</p>
    <p style="text-align:center; font-size:10px;"><?php echo "Date:" . date('d-m-Y') . " & " . "Time:" . date("h:i:sa"); ?></p>
  </div>
</body>

</html>