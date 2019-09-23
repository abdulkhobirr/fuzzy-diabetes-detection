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
            <h2>Daftar Gejala Penyakit Diabetes</h2>
            <table class="table table-bordered table-hover">
		<tr>
            <th><center>NO</center></th>
			<th><center>KODE </center></th>
			<th><center>NAMA PENYAKIT</center></th>
            <th><center>PENYEBAB</center></th>
           <!-- <th><center>DESKRIPSI</center></th> -->
		</tr>
		<?php 
        include "conn.php";
          $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
          $no=0;
		  while ($data=mysqli_fetch_array($query)) {
              $no++;
		?>
		<tr>
        <td><?php echo $no; ?></td>
			<td><?php echo $data['kd_gejala']; ?></td>
			<td><?php echo $data['gejala']; ?></td>
  	        <td><?php echo $data['deskripsi']; ?></td>
            <?php } ?>
            </table>
          </div>
        </div>

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
