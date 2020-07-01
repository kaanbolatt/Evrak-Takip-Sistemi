<?php
include 'baglan.php';

require_once __DIR__ . '/vendor/autoload.php';

$dad = $_POST['dad'];
$dsoyad = $_POST['dsoyad'];
$dnum = $_POST['dnum'];
$dfak = $_POST['dfak'];
$dbolum = $_POST['dbolum'];
$dtel = $_POST['dtel'];
$dkonu = $_POST['dkonu'];
$dmesaj = $_POST['dmesaj'];
$dhoca = $_POST['dhoca'];


$mpdf = new \Mpdf\Mpdf();


$data = "";

$data .= '<img src="https://i.hizliresim.com/stmPWu.png" align="center"/>';
$data .= '<br />Name / Ad :<strong>' . $dad . '</strong>';
$data .= '<br />Surname / Soyad :<strong>' . $dsoyad . '</strong>';
$data .= '<br />Student No / Öğrenci Numarası :<strong>' . $dnum . '</strong>';
$data .= '<br />Faculty / Fakülte :<strong>' . $dfak . '</strong>';
$data .= '<br />Department / Bölüm :<strong>' . $dbolum . '</strong>';
$data .= '<br />Mobile Phone / Cep Telefonu :<strong>' . $dtel . '</strong>';
$data .= '<br />Subject / Konu :<strong>' . $dkonu . '</strong>';
$data .= '<hr>';
$data .= '<hr>';


	$data .= '<br />' . $dmesaj;


$mpdf->WriteHTML($data);

$mpdf->Output('Dilekce.pdf', 'D');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $kaydet=$db->prepare("INSERT INTO dilekceornegi SET
		id=:id,
		dad=:dad,
		dsoyad=:dsoyad,
		dnum=:dnum,
		dfak=:dfak,
		dbolum=:dbolum,
		dtel=:dtel,
		dkonu=:dkonu,
		dmesaj=:dmesaj
		");
	$insert=$kaydet->execute(array(
		'id' => $_POST['id'],
		'dad' => $_POST['dad'],	
		'dsoyad' => $_POST['dsoyad'],
		'dnum' => $_POST['dnum'],
		'dfak' => $_POST['dfak'],
		'dbolum' => $_POST['dbolum'],
		'dtel' => $_POST['dtel'],
		'dkonu' => $_POST['dkonu'],
		'dmesaj' => $_POST['dmesaj'],
		));

        Header("Location:http://localhost/deneme/makepdf2.php");

}