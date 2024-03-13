<?php

require_once("../dompdf_config.inc.php");

// Kullanıcının demo'ya yerel olarak erişip erişmediğini kontrol ediyoruz
$yerel = array("::1", "127.0.0.1");
$yerel_mi = in_array($_SERVER['REMOTE_ADDR'], $yerel);

if ( isset( $_POST["html"] ) && $yerel_mi ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_cikti.pdf", array("Attachment" => false));

  exit(0);
}

?>
<?php include("baslik.inc"); ?>

<a name="demo"> </a>
<h2>Deneme</h2>

<?php if ($yerel_mi) { ?>

<p>PDF olarak işlenmiş bir html parçasını görmek için aşağıdaki metin kutusuna html parçanızı girin: (Not: Varsayılan olarak, uzak stiller, resimler ve içe gömülü PHP devre dışı bırakılmıştır.)</p>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<p>Kağıt boyutu ve yönelimi:
<select name="paper">
<?php
foreach ( array_keys(CPDF_Adapter::$PAPER_SIZES) as $size )
  echo "<option ". ($size == "letter" ? "selected " : "" ) . "value=\"$size\">$size</option>\n";
?>
</select>
<select name="orientation">
  <option value="portrait">dikey</option>
  <option value="landscape">yatay</option>
</select>
</p>

<textarea name="html" cols="60" rows="20">
&lt;html&gt;
&lt;head&gt;
&lt;style&gt;

/* Buraya bazı stil kuralları yazın */

&lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;

&lt;!-- Buraya bazı HTML yazın --&gt;

&lt;/body&gt;
&lt;/html&gt;
</textarea>

<div style="text-align: center; margin-top: 1em;">
  <button type="submit">İndir</button>
</div>

</form>
<p style="font-size: 0.65em; text-align: center;">(Not: Bir KHTML tabanlı tarayıcı kullanıyorsanız ve örnek çıktıyı yüklerken zorluk yaşıyorsanız, önce bir dosyaya kaydetmeyi deneyin.)</p>

<?php } else { ?>

  <p style="color: red;">
    Uzaktan bağlantılar için kullanıcı girişi devre dışı bırakılmıştır.
  </p>
  
<?php } ?>

<?php include("alt.inc"); ?>
