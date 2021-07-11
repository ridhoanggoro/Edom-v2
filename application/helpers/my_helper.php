<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('format_indo')) {
		function format_indo($date){
			$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

			$tahun = substr($date, 0, 4);               
			$bulan = substr($date, 5, 2);
			$tgl   = substr($date, 8, 2);
			$result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
			return($result);
		}
	}

	if (!function_exists('format_indo_simpel')) {
		function format_indo_simpel($date){
			$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");

			$tahun = substr($date, 0, 4);               
			$bulan = substr($date, 5, 2);
			$tgl   = substr($date, 8, 2);
			$result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
			return($result);
		}
	}

	if (!function_exists('format_indo_simpel_jam')) {
		function format_indo_simpel_jam($date){
			$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");

			$tahun = substr($date, 0, 4);               
			$bulan = substr($date, 5, 2);
			$tgl   = substr($date, 8, 2);
			$result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
			return($result);
		}
	}

	function format_tahun_bulan($tahun, $bulan)
	{
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$result = $BulanIndo[(int)$bulan-1].'-'.$tahun;
		return $result;
	}

	function minggu_ke_n($date) {

		$tgl 	 = date_parse($date);
		$tanggal = $tgl['day'];
		$bulan   = $tgl['month'];
		$tahun   = $tgl['year'];

		//tanggal 1 tiap bulan
		$tanggalAwalBulan 	= mktime(0, 0, 0, $bulan, 1, $tahun);
		$mingguAwalBulan 	= (int) date('W', $tanggalAwalBulan);

		//tanggal sekarang
		$tanggalYangDicari = mktime(0, 0, 0, $bulan, $tanggal, $tahun);
		$mingguTanggalYangDicari = (int) date('W', $tanggalYangDicari);
		$mingguKe = $mingguTanggalYangDicari - $mingguAwalBulan + 1;
		return $mingguKe;
	}

	function minggu_ke($date)
	{
		$tgl = new DateTime($date);
		$week = $tgl->format("W");
		return $week;
	}

	if (!function_exists('is_email')) {
		function is_email($email)
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return false;
			} else { return true; }
		}
	}

	if (!function_exists('validasi_password')) {
		function is_password_strength($password)
		{
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);

			if (!$uppercase) {
				// password harus ada huruf besar
				return 1;
			} elseif (!$lowercase) {
				// password harus ada huruf kecil
				return 2;
			} elseif (!$number){
				// password harus ada angka
				return 3;
			} else if (!$specialChars){
				// password harus ada spesial karakter
				return 4;
			} else {
				// ok.. password sesuai format
				return 0;
			}
			
		}
	}

	if (!function_exists('xtime_ago')){
		function xtime_ago($date){
			$timestamp = strtotime($date);	
			
			$strTime = array("detik", "menit", "jam", "hari", "bulan", "tahun");
			$length = array("60","60","24","30","12","10");

			$currentTime = time();
			if($currentTime >= $timestamp) {
				$diff     = time()- $timestamp;
				for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
				$diff = $diff / $length[$i];
				}

				$diff = round($diff);
				return $diff . " " . $strTime[$i] . " yang lalu ";
			}
			
		}
	}

	if (!function_exists('string_encrypt')) {
		function string_encrypt($string)
	    {
	        return hash('sha512', $string.config_item('encryption_key'));
		}
	}
	
	function encrypt_url($string) {

		$output = false;
		/*
		* read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
		*/        
		$security       = parse_ini_file("security.ini");
		$secret_key     = $security["encryption_key"];
		$secret_iv      = $security["iv"];
		$encrypt_method = $security["encryption_mechanism"];
	
		// hash
		$key    = hash("sha256", $secret_key);
	
		// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
		$iv     = substr(hash("sha256", $secret_iv), 0, 16);
	
		//do the encryption given text/string/number
		$result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($result);
		return $output;
	}
	
	function decrypt_url($string) {
		/*
		* decryption process
		*
		*
		*/

		$output = false;
		/*
		* read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
		*/
	
		$security       = parse_ini_file("security.ini");
		$secret_key     = $security["encryption_key"];
		$secret_iv      = $security["iv"];
		$encrypt_method = $security["encryption_mechanism"];
	
		// hash
		$key    = hash("sha256", $secret_key);
	
		// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
		$iv = substr(hash("sha256", $secret_iv), 0, 16);
	
		//do the decryption given text/string/number
	
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;
	}

	if (!function_exists('ambil_angka_dari_text')) {
		function ambil_angka_dari_text($string){
			$angka = preg_replace('/[^0-9]/', '', $string);  
			return($angka);
		}
	}

	if (!function_exists('date_sql')) {
		function date_sql($string){
			$newdate = date("Y-m-d", strtotime($string));   
			return($newdate);
		}
	}