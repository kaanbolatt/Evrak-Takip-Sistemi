<?php
include 'baglan.php';


require_once __DIR__ . '/vendor/autoload.php';

$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$email = $_POST['email'];
$onum = $_POST['onum'];
$oyil = $_POST['oyil'];
$derskod = $_POST['derskod'];
$odonem = $_POST['odonem'];
$otel = $_POST['otel'];
$dcHoca = $_POST['dcHoca'];

$mpdf = new \Mpdf\Mpdf();


$data = "";

$data .= '<img src="https://upload.wikimedia.org/wikipedia/tr/a/ae/Emu-dau-logo.png" align="center" width="140" height="140" />';
$data .= '<center><h1>DERSTEN ÇEKİLME BAŞVURU DİLEKÇESİ</h1></center>';
$data .= '<strong>DOĞU AKDENİZ ÜNİVERSİTESİ Dekanlığına</strong> <br />';
$data .= '<br />Mühendislik Fakültesinin, Bilgisayar Mühendisliği bölümünde bulunan <strong>' . $onum . '</strong> numaralı ve <strong>' . $ad . ' ' . $soyad . '</strong> isimli öğrencinizim. ';

$data .= '<strong>' . $oyil . '</strong> öğrenim yılı ve <strong>' . $odonem . '</strong> öğrenim döneminizde kayıtlı olduğum, <strong>' . $derskod . '</strong> ders kodlu dersten çekilmek istiyorum.<br /><br /> Gereğini saygılarımla arz ederim.';

$data .= '<br /><br /><br /><strong>Ad:</strong> ' . $ad . '<br /><strong>Soyad:</strong> ' . $soyad . '<br /><strong>E-Posta:</strong> ' . $email . '<br /><strong>Telefon:</strong> ' . $otel . '';

if($message)
{
	$data .= '<br /><strong>Message</strong>' . $message;
}

$mpdf->WriteHTML($data);

$mpdf->Output('Dersten Çekilme Talebi.pdf', 'D');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $kaydet=$db->prepare("INSERT INTO derstencekilme SET
		id=:id,
		ad=:ad,
		soyad=:soyad,
		email=:email,
		otel=:otel,
		onum=:onum,
		oyil=:oyil,
		odonem=:odonem,
		derskod=:derskod,
		dcHoca=:dcHoca
		");
	$insert=$kaydet->execute(array(
		'id' => $_POST['id'],
		'ad' => $_POST['ad'],	
		'soyad' => $_POST['soyad'],
		'email' => $_POST['email'],
		'otel' => $_POST['otel'],
		'onum' => $_POST['onum'],
		'oyil' => $_POST['oyil'],
		'odonem' => $_POST['odonem'],
		'derskod' => $_POST['derskod'],
		'dcHoca' => $_POST['dcHoca'],
		));

        Header("Location:http://localhost/deneme/makepdf.php");

}