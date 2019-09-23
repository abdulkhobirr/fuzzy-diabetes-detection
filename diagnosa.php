<?php include "conn.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SISTEM PAKAR DIAGNOSA PENYAKIT DIABETES">
    <link rel="icon" href="">

    <title>SISTEM PAKAR DIAGNOSA PENYAKIT DIABETES</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <?php include "header.php"; ?>

      <main role="main">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Diagnosa</h2>
            <?php if (isset($_GET['error'])) {echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  <strong>Ups! </strong> $_GET[error]
</div>";} else { echo "";} ?>
            <form method="POST" action="hasil.php" name="diagnosa" enctype="form-data/multipart">
            <?php 
		  $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
          $no=0;
		  while ($data=mysqli_fetch_array($query)) {
		      $a = $data['gejala'];
          $less = $data['less'];
          $avg = $data['avg'];
          $more = $data['more'];
          $no++;
          $kurang=1;
          $splitless=explode(";",$less);
          $splitavg=explode(";",$avg);
          $splitmore=explode(";",$more);

          
		?>
        <?php
          if ($data['kd_gejala']=='G05') {
            ?>
            <pre style="text-align: left;font-size: 17px;"><b>
        Untuk gejala dibawah, beri nilai antara 1-3, misalnya nilai very rare untuk Giddiness adalah 1, 
        untuk rare adalah 2, dan untuk often adalah 3
            </b></pre>
            <?php
          }
          if ($data['kd_gejala']=='G05'||$data['kd_gejala']=='G06'||$data['kd_gejala']=='G07'||$data['kd_gejala']=='G08'||$data['kd_gejala']=='G09'||$data['kd_gejala']=='G10') { ?>
           <b> <?php echo $no; ?>. 
        <?php echo $data['gejala']; ?></b> </br>
        <fieldset id="<?php echo $data['kd_gejala']; ?>">
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitless['0'];?>"><?php echo $splitless['0'];?>(value=1)</br>
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitavg['0']; ?>"><?php echo $splitavg['0']; ?>(value=2)</br>
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitmore['0']; ?>"><?php echo $splitmore['0']; ?>(value=3)
        </fieldset>
          <?php }else{?>
        
        <b><?php echo $no; ?>. 
        <?php echo $data['nama_lain']; ?></b> </br>
        <fieldset id="<?php echo $data['kd_gejala']; ?>">
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitless['0'];?>"><?php echo $splitless['0'];?>(<?php echo $splitless['1'];?>-<?php echo $splitless['2'] ?> kali per hari)</br>
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitavg['0']; ?>"><?php echo $splitavg['0']; ?>(<?php echo $splitavg['1'];?>-<?php echo $splitavg['3']-$kurang ?> kali per hari)</br>
          <input type="radio" name="<?php echo $data['kd_gejala']; ?>" value="<?php echo $splitmore['0']; ?>"><?php echo $splitmore['0']; ?>(Lebih dari <?php echo $splitmore['1']; ?> kali per hari)
        </fieldset>
        <?php } ?>
          Value : <input type="number" name="<?php echo $data['no']; ?>" min="0" max="20" placeholder="0" required> </br></br>
            <?php }?></br>
            <input type="submit" class="btn btn-medium btn-primary" value="Cek Diagnosa" name="proses" />
            </form>
          </div>
        </div>
<br /><br />
      </main>

      <!-- Site footer -->
      <footer class="footer">
        <p>Copyright &copy; 2018</p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="js/jquery-slim.min.js"></script> -->
    <!-- <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
