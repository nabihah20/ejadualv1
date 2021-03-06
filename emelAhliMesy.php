<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Jemputan Mesyuarat</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #3498db; 
      }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }

    </style>
  </head>
  <body class="">
    <span class="preheader">Jemputan Mesyuarat</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
                              <p>Assalamualaikum dan selamat sejahtera Y.Bhg. Dato'/tuan/puan/encik/cik,<br/>
                              <u class="dotted" style="border-bottom: 1px dashed #999; text-decoration: none; "><b><?php echo $ahli_nama; ?> (<?php echo $ahli_id; ?>)</b></u></p><br/>
                              <p style="text-transform: uppercase;"><b><?php echo $mesyRow['title']; ?></b></p><br/>
                              <p>Y.Bhg. Dato'/tuan/puan/encik/cik dijemput menghadiri mesyuarat seperti maklumat di bawah.</p>
                          </td>
                        </tr>   
                    </table>
                    <hr style="border-top: 1px solid;">
                    <table>   
                        <tr>
                          <td align="right"><b>Nama Mesyuarat :</b></td>
                          <td>&emsp;<?php echo $mesyRow['title']; ?></td>
                        </tr>
                        <tr>
                          <td align="right"><b>Urusetia:</b></td>
                            <?php
                            $jab_id = $mesyRow['jab_id'];
                            $sql = $conn->query("SELECT jab_nama FROM jab
                            WHERE jab_id='$jab_id'");
                            $jab_nama=$sql->fetchColumn();
                            ?>
                          <td>&emsp;<?php echo $jab_nama; ?></td>
                        </tr>
                        <tr>
                          <td align="right"><b>Pengerusi:</b></td>
                          <td>&emsp;<?php echo $mesyRow['mesy_pengerusi']; ?></td>
                        </tr>
                        <br/>
                        <tr>
                          <td align="right"><b>Tarikh :</b></td>
                            <?php
                                $mesy_tarikh = $mesyRow['mesy_tarikh'];
                                $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%Y') FROM mesy
                                WHERE mesy_id='$ID'");
                                $mesy_tarikh_new=$sql->fetchColumn();
                            ?>    
                            <td>&emsp;<?php echo $mesy_tarikh_new; ?></td>
                        </tr>
                        <tr>
                          <td  align="right"><b>Masa :</b></td>
                            <?php
                                $start=$mesyRow['start'];
                                
                                $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
                                WHERE mesy_id='$ID'");
                                $start_new=$sql->fetchColumn();
                            ?>
                            <td>&emsp;<?php echo $start_new; ?></td>
                        </tr>
                        <tr>
                          <td  align="right"><b>Tempat :</b></td>
                            <?php
                            $mesy_lokasi = $mesyRow['mesy_lokasi'];
                            $sql = $conn->query("SELECT bilik_nama FROM bilik
                            WHERE bilik_id='$mesy_lokasi'");
                            $bilik_nama=$sql->fetchColumn();
                            ?>
                            <td>&emsp;<?php echo $bilik_nama; ?></td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>

                          <td align="right"><b>Ahli Mesyuarat :</b></td>
                          <td>&emsp;<?php echo '<a href="http://mytask.mbi.gov.my/ejadualv1/lihatMesy1.php?ID='.$ID.'" target="_blank">Lihat Senarai Penuh</a>'; ?></td>
                        </tr>
                    </table>  
                    <br/>
                    <p>Sila tekan butang di bawah bagi mengesahkan kehadiran Y.Bhg. Dato'/tuan/puan</p>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                        <tbody>
                        <tr>
                            <td align="center">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td><?php echo '<a href="http://mytask.mbi.gov.my/ejadualv1/terimaMesy.php?ID='.$ID.'&ahli_id='.$ahli_id.'" target="_blank">TERIMA</a>'; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr style="border-top: 1px solid;">
                        <p>Mesej ini dihantar menggunakan maklumat di laman web <br/> <a href="http://mytask.mbi.gov.my/ejadualv1/" target="_blank">eJadual Majlis Bandaraya Ipoh</a>.</p>
                        <p>Sekian, terima kasih.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Majlis Bandaraya Ipoh, Jalan Sultan Abdul Jalil,<br/>
                         Greentown 30450 Ipoh, Perak Darul Ridzuan<br/><br/>
                        Anda bukan ahli mesyuarat? <a href="http://www.mbi.gov.my/" target="_blank"><u>Hantar Aduan.</u></a></span>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                  Hakcipta Terpelihara &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://www.mbi.gov.my/" target="_blank"><u>Majlis Bandaraya Ipoh</u></a> 
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
