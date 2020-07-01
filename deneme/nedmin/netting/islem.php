<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';



if (isset($_POST['kullanicikaydet'])) {

	
	echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {


			

			


// Başlangıç

			$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
	}
	


}






if (isset($_POST['evrakekle'])) {

    $uploads_dir = '../../dimg/evrak';
    @$tmp_name = $_FILES['evrak_yolu']["tmp_name"];
    @$name = $_FILES['evrak_yolu']["name"];
    //Altta bulunan kısım evrağın PDF dışında almamasına yarayacaktı fakat çalıştıramadık.
    $ex = pathinfo($_FILES['evrak_yolu']["name"], PATHINFO_EXTENSION);
    if( $ex != "pdf"){
        echo 'PDF olmadığı için dosyanız gönderilemedi. 3 sn içinde dilekçe ekleme sayfasına yönlendirilecektir!';

        header("Refresh: 3; url=http://localhost/deneme/deneme-ekle.php");
                      }
    else {
    //resmin isminin benzersiz olması
    $benzersizsayi4=rand(20000,32000);    
    $benzersizad=$benzersizsayi4;
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
    


    $kaydet=$db->prepare("INSERT INTO evraklar SET
        evrak_id=:evrak_id,
        evrak_turu=:evrak_turu,
        ogrenciNo=:ogrenciNo,
        evrak_yolu=:evrak_yolu,
        hoca_ad=:hoca_ad
        ");
    $insert=$kaydet->execute(array(
        'evrak_id' => $_POST['evrak_id'],
        'evrak_turu' => $_POST['evrak_turu'],
        'ogrenciNo' => $_POST['ogrenciNo'],
        'hoca_ad' => $_POST['hoca_ad'],
        'evrak_yolu' => $refimgyol
        ));

    if ($insert) {

        Header("Location:../../deneme-ekle.php?durum=ok");

    } else {

        Header("Location:../../deneme-ekle.php?durum=no");
    


}
}
}



if (isset($_POST['cekilmeekle'])) {

	


	$kaydet=$db->prepare("INSERT INTO derstencekilme SET
		id=:id,
		ad=:ad,
		soyad=:soyad,
		email=:email,
		otel=:otel,
		onum=:onum,
		oyil=:oyil,
		odonem=:odonem,
		derskod=:derskod
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
		));

	if ($insert) {


		Header("Location:../../derstencekil.php?durum=ok");


	} else {

		Header("Location:../../derstencekil.php?durum=no");
	}

}

if (isset($_POST['dilekceekle'])) {

	


	$kaydet=$db->prepare("INSERT INTO dilekceornegi SET
		id=:id,
		dad=:dad,
		dsoyad=:dsoyad,
		dnum=:dnum,
		dfak=:dfak,
		dbolum=:dbolum,
		dtel=:dtel,
		dkonu=:dkonu,
		dtarih=:dtarih,
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
		'dtarih' => $_POST['dtarih'],
		'dmesaj' => $_POST['dmesaj'],
		));

	if ($insert) {


		Header("Location:../../dilekceornegi.php?durum=ok");


	} else {

		Header("Location:../../dilekceornegi.php?durum=no");
	}

}

if (isset($_POST['evrakindir'])) {

$selected_val = $_POST['evrak_indir_turu']; //evrak indirmede seçtiğin value

	switch ($selected_val) { //seçtiğin valuye göre işlem yapma kısmı.
case 0:

    header("Location:../../download.php?file=stajevrak.doc");
    break;
case 1:
    header("Location:../../download.php?file=kayitdondurma.doc");
    break;
case 2:
    header("Location:../../download.php?file=asistanbasvuru.docx");
    break;
case 3:
    header("Location:../../download.php?file=ciftanadal.doc");
	break;
case 4:
	header("Location:../../download.php?file=stajdegerlendirmeanketi.docx");
	break;
case 5:
	header("Location:../../download.php?file=yazokuluformu.doc");
	break;
case 6:
	header("Location:../../download.php?file=notdegistirmeformu.doc");
	break;
case 7:
	header("Location:../../download.php?file=univayrilma.docx");
	break;
}
}

if (isset($_POST['kresimduzenle'])) {

	$uploads_dir = '../../dimg/kullanici';
	@$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
	@$name = $_FILES['kullanici_resim']["name"];
	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	$duzenle=$db->prepare("UPDATE kullanici SET
		kullanici_resim=:resim
		WHERE kullanici_id={$_POST['kullanici_id']}");
	$update=$duzenle->execute(array(
		'resim' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/kullanici-profil.php?durum=ok");

	} else {

		Header("Location:../production/kullanici-profil.php?durum=no");
	}

}



if (isset($_POST['kullaniciprofilkaydet'])) {

	if (strlen($_POST['kullanici_password'])>0) {

		$kullanici_password=md5($_POST['kullanici_password']);

		$ayarkaydet=$db->prepare("UPDATE kullanici SET

			kullanici_adres=:adres,
			kullanici_il=:il,
			kullanici_ilce=:ilce, 
			kullanici_password=:password
			WHERE kullanici_id={$_POST['kullanici_id']}");
		$update=$ayarkaydet->execute(array(

			'adres' => $_POST['kullanici_adres'],
			'il' => $_POST['kullanici_il'],
			'ilce' => $_POST['kullanici_ilce'],
			'password' => $kullanici_password
			));
		


	} else {


		$ayarkaydet=$db->prepare("UPDATE kullanici SET
			kullanici_adsoyad=:adsoyad,
			kullanici_mail=:mail,
			kullanici_adres=:adres,
			kullanici_il=:il,
			kullanici_ilce=:ilce,
			kullanici_unvan=:unvan,
			kullanici_password=:password
			WHERE kullanici_id={$_POST['kullanici_id']}");
		$update=$ayarkaydet->execute(array(
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'mail' => $_POST['kullanici_mail'],
			'unvan' => $_POST['kullanici_unvan'],
			'adres' => $_POST['kullanici_adres'],
			'il' => $_POST['kullanici_il'],
			'ilce' => $_POST['kullanici_ilce'],
			'password' => $kullanici_password
			));



	}


	

	if ($update) {

		Header("Location:../production/kullanici-profil.php?durum=ok");

	} else {

		Header("Location:../production/kullanici-profil.php?durum=no");
	}

}





if (isset($_POST['sliderekle'])) {
  

	$uploads_dir = '../../dimg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
		));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}

if (isset($_POST['sosyalayarkaydet'])) {

	$ayar_id=$_POST['ayar_id'];

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
		));


	if ($update) {

		Header("Location:../production/sosyal-ayar.php?durum=ok");

	} else {

		Header("Location:../production/sosyal-ayar.php?durum=no");
	}

}


if (isset($_POST['kullanicibilgiguncelle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_gsm=:kullanici_gsm,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_adres' => $_POST['kullanici_adres'],
		'kullanici_il' => $_POST['kullanici_il'],		
		'kullanici_ilce' => $_POST['kullanici_ilce']
		));


	if ($update) {

		Header("Location:../../hesabim.php?durum=ok");

	} else {

		Header("Location:../../hesabim.php?durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../production/kullanici.php?sil=ok");


	} else {

		header("location:../production/kullanici.php?sil=no");

	}


}
	


if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];  
		unlink("../../$resimsilunlink");  #Burada amaç eski fotoyu silmek

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if (isset($_POST['admingiris'])) {



	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {
				
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}

if (isset($_POST['kullanicigiris'])) {
		require_once '../../securimage/securimage.php';

	$securimage = new Securimage();

	if ($securimage->check($_POST['captcha_codee']) == false) {

		header("Location:../../index.php?durum=captchahata");
		exit;

	}

	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		$kullanici_ip=$_SERVER['REMOTE_ADDR'];
		$zamanguncelle=$db->prepare("UPDATE kullanici SET

			kullanici_sonip=:kullanici_sonip

			WHERE kullanici_mail = '$kullanici_mail'
			");
		$update=$zamanguncelle->execute(array(
			'kullanici_sonip' => $kullanici_ip

		));

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../?durum=basarisizgiris");

	}


}




if (isset($_POST['genelayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
		));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}



if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
		));


	if ($update) {

		header("Location:../production/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
	
}


if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
		));


	if ($update) {

		header("Location:../production/api-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/api-ayarlar.php?durum=no");
	}
	
}


if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	/*

	copy paste işlemlerinde tablo ve işaretli satır isminin değiştirildiğinden emin olun!!!

	*/
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}



if (isset($_POST['menuekle'])) {


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}


if (isset($_POST['duyuruekle'])) {


	$ayarekle=$db->prepare("INSERT INTO duyurular SET
		duyuru_id=:duyuru_id,
		duyuru_icerik=:duyuru_icerik,
		duyuru_sahibi=:duyuru_sahibi,
		duyuru_durum=:duyuru_durum
		");

	$insert=$ayarekle->execute(array(
		'duyuru_id' => $_POST['duyuru_id'],
		'duyuru_icerik' => $_POST['duyuru_icerik'],
		'duyuru_sahibi' => $_POST['duyuru_sahibi'],
		'duyuru_durum' => $_POST['duyuru_durum']
		));


	if ($insert) {

		Header("Location:../production/duyurular.php?durum=ok");

	} else {

		Header("Location:../production/duyurular.php?durum=no");
	}

}



if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
			));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
			));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}


if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_gsm=:kullanici_gsm,
		kullanici_mail=:kullanici_mail,

		kullanici_ilce=:kullanici_ilce,

		kullanici_il=:kullanici_il,

		kullanici_adres=:kullanici_adres,

		kullanici_staj=:kullanici_staj,

		kullanici_durum=:kullanici_durum,

		kullanici_mezuniyet=:kullanici_mezuniyet
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_adres' => $_POST['kullanici_adres'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_staj' => $_POST['kullanici_staj'],	
		'kullanici_mezuniyet' => $_POST['kullanici_mezuniyet'],		
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if (isset($_POST['kullanicisifreguncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
		));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
					));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}





		// Bitiş



			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}

if (isset($_POST['duyurularduzenle'])) {

	$duyuru_id=$_POST['duyuru_id'];

	$ayarkaydet=$db->prepare("UPDATE duyurular SET
		duyuru_id=:duyuru_id,
		duyuru_icerik=:duyuru_icerik,
		duyuru_durum=:duyuru_durum
		WHERE duyuru_id={$_POST['duyuru_id']}");

	$update=$ayarkaydet->execute(array(
		'duyuru_id' => $_POST['duyuru_id'],
		'duyuru_icerik' => $_POST['duyuru_icerik'],
		'duyuru_durum' => $_POST['duyuru_durum']
		));


	if ($update) {

		Header("Location:../production/duyurular.php?duyuru_id=$duyuru_id&durum=ok");

	} else {

		Header("Location:../production/duyurular.php?duyuru_id=$duyuru_id&durum=no");
	}

}

if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);


	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_durum=:menu_durum,
		menu_seourl=:menu_seourl
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum'],
		'menu_seourl' => $menu_seourl
		));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../production/kullanici.php?sil=ok");


	} else {

		header("location:../production/kullanici.php?sil=no");

	}


}


if ($_GET['slidersil']=="ok") {

	$sil=$db->prepare("DELETE from slider where slider_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['slider_id']
		));


	if ($kontrol) {


		header("location:../production/slider.php?sil=ok");


	} else {

		header("location:../production/slider.php?sil=no");

	}


}



if ($_GET['duyurusil']=="ok") {

	$sil=$db->prepare("DELETE from duyurular where duyuru_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['duyuru_id']
		));


	if ($kontrol) {


		header("location:../production/duyurular.php?sil=ok");


	} else {

		header("location:../production/duyurular.php?sil=no");

	}


}

if ($_GET['evraksil']=="ok") {

	$sil=$db->prepare("DELETE from evraklar where evrak_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['evrak_id']
		));


	if ($kontrol) {


		header("location:../production/evrak.php?sil=ok");


	} else {

		header("location:../production/evrak.php?sil=no");

	}


}



if ($_GET['derstencekilmesil']=="ok") {

	$sil=$db->prepare("DELETE from derstencekilme where id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['id']
		));


	if ($kontrol) {


		header("location:../production/derstencekilme.php?sil=ok");


	} else {

		header("location:../production/derstencekilme.php?sil=no");

	}


}

if ($_GET['dilekceornegisil']=="ok") {

	$sil=$db->prepare("DELETE from dilekceornegi where id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['id']
		));


	if ($kontrol) {


		header("location:../production/dilekceornegi.php?sil=ok");


	} else {

		header("location:../production/dilekceornegi.php?sil=no");

	}


}

	if ($_GET['onaylandi']=="ok") {


	$test=$db->prepare("UPDATE evraklar SET easama = 2 WHERE evrak_id =:id");

    $update=$test->execute(array(
		'id' => $_GET['evrak_id']
		));



	if ($update) {


		header("location:../production/evrak.php?onaylandi=ok");


	} else {

		header("location:../production/evrak.php?onaylandi=no");

	}



}

if ($_GET['reddedildi']=="ok") {


	$test1=$db->prepare("UPDATE evraklar SET easama = 3 WHERE evrak_id =:id");

    $update2=$test1->execute(array(
		'id' => $_GET['evrak_id']
		));



	if ($update2) {


		header("location:../production/evrak.php?reddedildi=ok");


	} else {

		header("location:../production/evrak.php?reddedildi=no");

	}
	}
if ($_GET['islemalindi']=="ok") {


	$test=$db->prepare("UPDATE evraklar SET easama = 1 WHERE evrak_id =:id");

    $update=$test->execute(array(
		'id' => $_GET['evrak_id']
		));



	if ($update) {


		header("location:../production/evrak.php?islemalindi=ok");


	} else {

		header("location:../production/evrak.php?islemalindi=no");

	}
	}







if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {


		header("location:../production/menu.php?sil=ok");


	} else {

		header("location:../production/menu.php?sil=no");

	}


}
?>