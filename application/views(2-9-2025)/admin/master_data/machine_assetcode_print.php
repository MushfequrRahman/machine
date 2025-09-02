<html>

<head>
  <title>Asset Code</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      -webkit-print-color-adjust: exact !important;
      color-adjust: exact !important;
      print-color-adjust: exact !important;
    }

    .container {
      width: 1200px;
      /* কন্টেইনারের প্রস্থ */
      overflow-x: auto;
      /* অনুভূমিক স্ক্রলিং */
      margin-left: auto;
      margin-right: auto;
    }

    table {
      width: 1200px;
      /* টেবিলের প্রস্থ নির্ধারণ */
      table-layout: fixed;
      /* সেলগুলোর আকার ফিক্সড রাখা */
      border-collapse: collapse;
    }

    /* table,
    th,
    td {
      border: 1px solid black;
    } */

    td {
      /* padding: 10px; */
      text-align: center;
      word-wrap: break-word;
      /* width: 130px; */
      font-size: 15px;
    }
    .barcode{width: 250px; height: 115px; padding: 10px; margin: 10px; color: #056608; font-weight:bold; background:#E2EFDA; border:1px solid #0F7123;}

    .block {
      width: 100px;
      /* বারকোড সেলের প্রস্থ */
      height: 100px;
      /* বারকোড সেলের উচ্চতা */
      text-align: center;
    }

    p {
      /* height: 15px; */
      /* height: 30px; */
      padding: 7px;
      /* border: 1px solid green; */
      /* প্যারা ট্যাগে মার্জিন না থাকা */
    }
  </style>
</head>

<body>
  <div class="container">
    <table>
      <tr>
        <?php
        $count = 0; // প্রতি সারিতে ৭টি সেল
        foreach ($ul as $row) {
          if ($count == 4) {  // প্রতি ৭টি সেল পরবর্তী সারিতে যাবে
            echo '</tr><tr>';
            $count = 0;
          }
        ?>
          <td>
            <div class="barcode">
            <p><?php echo $row['macode']; ?></p>
            <p><img src="<?php echo base_url(); ?>Dashboard/show_barcode/<?php echo $barcode = $row['minvid']; ?>"></p>
            <?php if ($row['manucode'] != '') {
            ?>
              <p><?php echo $row['manucode']; ?> </p>
            <?php
            } else {
            ?>
              <p>########</p>
            <?php
            }
            ?>
</div>
            </td>

        <?php
          $count++;
        }
        ?>
      </tr>
    </table>
  </div>
</body>

</html>