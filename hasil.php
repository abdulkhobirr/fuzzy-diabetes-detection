<?php include "conn.php"; ?>
<?php
  //fungsi hitung mXi
  function hitung($a,$b,$c,$x,$i,$sigma){
      if($c=='1'&&$x=='1'){
        $sigma[$i]=0;
      }elseif ($x>=$c) {
        $sigma[$i]=1;
      }elseif (($b<$x)&&($x<$c)) {
        $sigma[$i]=($c-$x)/($c-$b);
      }elseif (($a<=$x)&&($x<=$b)) {
        $sigma[$i]=($x-$a)/($b-$a);
      }elseif ($x<$a) {
        $sigma[$i]=0;
      }


      //echo "a=".$a."b=".$b."c=".$c."x=".$x."<br/>".$sigma[$i]."<br/>";
      //var_dump($sigma);
      return $sigma[$i];
  }

  function printskala($ha3){
    ?>
    <tr>
            <td>Resiko Diabetes</td>
            <td>:</td>
            <td colspan="3"><?php 
                if ($ha3<=3) {
                     echo "Ringan";
                   } elseif ($ha3<=5) {
                     echo "Sedang";
                   } elseif ($ha3<=10) {
                     echo "Parah";
                   }
            /*elseif ($row['kode']=='P01') {
                  echo "Diabetes Ringan";
                }elseif ($row['kode']=='P02') {
                  echo "Diabetes Sedang";
                }elseif ($row['kode']=='P03') {
                  echo "Diabetes Parah";
                }*/?></td>
            </tr>
  <?php } ?>
<?php 
  //fungsi implementasi rumus
  function implementasi() {
    include "conn.php";
    $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
    $arrayv= array();
    $sigma = array();
    $hasil = array();
    $iterasi=0;
    $indeks=1;
      while ($data=mysqli_fetch_array($query)) {
        $input=$_POST[$data['kd_gejala']];
        $inputv=(int)$_POST[$data['no']];
        array_push($arrayv, $inputv);

        $qless = mysqli_query($koneksi,"SELECT less FROM gejala WHERE no='".$indeks."'");
        $qavg = mysqli_query($koneksi,"SELECT avg FROM gejala WHERE no='".$indeks."'");
        $qmore = mysqli_query($koneksi,"SELECT more FROM gejala WHERE no='".$indeks."'");

        $less=mysqli_fetch_array($qless);
        $avg=mysqli_fetch_array($qavg);
        $more=mysqli_fetch_array($qmore);

          $splitless=explode(";",$less['0']);
          $splitavg=explode(";",$avg['0']);
          $splitmore=explode(";",$more['0']);
          if ($input==$splitless['0']) {
            $b1 = $splitless['1'];
            $b2 = $splitless['2'];
            $b3 = $splitless['3'];
            //echo $b1; echo $b2; echo $b3; echo $inputv;echo $iterasi;
            //echo "<br/>";//exit();
            $hasil[$iterasi]=hitung($b1,$b2,$b3,$inputv,$iterasi,$sigma);
          }elseif ($input==$splitavg['0']) {
            $b1 = $splitavg['1'];
            $b2 = $splitavg['2'];
            $b3 = $splitavg['3'];
            //echo $b1; echo $b2; echo $b3; echo $inputv;echo $iterasi;
            //echo "<br/>";//exit();
            $hasil[$iterasi]=hitung($b1,$b2,$b3,$inputv,$iterasi,$sigma);
          }elseif ($input==$splitmore['0']) {
            $b1 = $splitmore['1'];
            $b2 = $splitmore['2'];
            $b3 = $splitmore['3'];
            //echo $b1; echo $b2; echo $b3; echo $inputv;echo $iterasi;
            //echo "<br/>";//exit();
            $hasil[$iterasi]=hitung($b1,$b2,$b3,$inputv,$iterasi,$sigma);
          }
          $iterasi++;
          $indeks++;
        }
        //hitung hasil skala 1-10.
        $ha=0;
        $ha1=0;
      for ($i=0; $i < 10; $i++) { 
        $ha=$ha+($hasil[$i]*$arrayv[$i]);
        //echo "mXi".$i."=".$ha."<br/>";
        $ha1=$ha1+$arrayv[$i];
        //echo "Xi".$i."=".$ha1."<br/>";
      }
      $ha2=$ha/$ha1;
      $ha3=$ha2*10;
      echo sprintf("%.3f",$ha3);
      printskala($ha3);
         
}
?>
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
            <h2>Hasil Diagnosa</h2>
            <?php  
 if(isset($_POST['proses']))  
 {
 $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
      $arr = array();$i=0;
      while ($data=mysqli_fetch_array($query)) {
        $input=$_POST[$data['kd_gejala']];
        $arr[$i]=$input;
        $i++;
      }  
      $ainput=implode("AND", $arr);
     
  $sql = mysqli_query($koneksi, "SELECT * 
                                FROM penyakit, rule  
                                WHERE rule.maka=penyakit.kode AND
                                rule.jika='".$ainput."'");
			/*if(mysqli_num_rows($sql) == 0){
		     header('location:diagnosa.php?error=Proses belum bisa dilanjutkan');		
          	}else{
				
			}*/
      $row = mysqli_fetch_array($sql);
 }  
 ?>  
            <table class="table table-bordered table-hover">
            <tr>
            <td>Gejala</td>
            <td>:</td>
            <td>
            
            <?php
            echo "Gejala";
            for ($i=1; $i <= 10 ; $i++) { 
              $query = mysqli_query($koneksi,"SELECT * FROM gejala WHERE no='".$i."'");
              $row1 = mysqli_fetch_array($query);
              echo "<li>$row1[gejala]</li>";
            }      
            ?>
                 </td>
            <td>
              <?php
              echo "Frekuensi";
                $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                while ($data=mysqli_fetch_array($query)) {
                $input=$_POST[$data['kd_gejala']];
                echo "<li>$input</li>";
                }  
              ?>
            </td>
            <td>
              <?php
              echo "Jumlah";
                $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
                while ($data=mysqli_fetch_array($query)) {
                $inputv=$_POST[$data['no']];
                echo "<li>$inputv</li>";}
              ?>
            </td>
            </tr>
            <tr>
            <td>Tingkat Keparahan (Skala 1-10)</td>
            <td>:</td>
            <td colspan="3">
              <?php implementasi(); ?>
              
                
            </td>
            </tr>
            
            <tr>
            <td>Pencegahan</td>
            <td>:</td>
            <td colspan="3"><?php 
                $query = mysqli_query($koneksi,"SELECT solusi FROM pencegahan WHERE kd_solusi='S01'");
                $data=mysqli_fetch_array($query);
                echo $data['0'];
              ?></td>
            </tr>
            <tr>
            <td>Penanganan Lebih Lanjut</td>
            <td>:</td>
            <td colspan="3">
              Untuk penanganan lebih lanjut, silahkan berkonsultasi ke dokter anda
            </td>
            </tr>
            </table>
            <a class="btn btn-sm btn-danger" href="diagnosa.php">Kembali</a>
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
  <!--  <script type="text/javascript">
      $(document).ready(function(){
          $("#myModal").modal('show');
      });
  </script>-->
  </body>
</html>
