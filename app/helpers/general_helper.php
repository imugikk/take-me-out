<?
function assets_url(){
    $_this = & get_Instance();
	$conf = site_url('assets/');
	if($conf <> ''){
		return $conf;
	}else{
		return false;
	}
}

function my_config($var){
    $_this = & get_Instance();
	$conf = $_this->config->item($var);
	if($conf <> ''){
		return $conf;
	}else{
		return false;
	}
}

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}

if ( ! function_exists('match_key'))
{
	function match_key($data,$key)
	{
		$data_upper = trim(strtoupper($data));
		$key_upper = trim(strtoupper($key));
		$pos_start = strrpos($data_upper,$key_upper);
		$result = $data;
		$mark_start = '<span class="filteredKey">';
		$mark_end = '</span>';
		if ($pos_start OR $key_upper == substr($data_upper,0,strlen($key_upper)) )
		{
			$pos_end = $pos_start + strlen($key_upper);
			$result = substr_replace($data,$mark_start,$pos_start,0);
			$result = substr_replace($result,$mark_end,$pos_end+strlen($mark_start),0);
		}
		
		return $result;
	}
}
if ( ! function_exists('num2text'))
{
	function num2text($text='0')
	{
		$result = str_replace(",", "", $text);
		$result = $result?$result:'0';
		return $result;
	}
}
if ( ! function_exists('dot2text'))
{
	function dot2text($text='0')
	{
		$result = str_replace(".", "", $text);
		$result = $result?$result:'0';
		return $result;
	}
}

//decode
if ( ! function_exists('encode'))
{
	function encode($str='')
	{
		$result = base64_encode($str);		
		$result = base64_encode($result);
		//$result = strtr($result, '+/', '-_');
		return $result;
	}
}
if ( ! function_exists('decode'))
{
	function decode($str='')
	{
		$result = base64_decode($str);		
		$result = base64_decode($result);		
		return $result;
	}
}

// check file poto is exist
if ( ! function_exists('check_profile_pict'))
{
	function check_profile_pict($id,$path=false)
	{
		$path = $path?$path.'/':'';
		$foto = 'files/foto/'.$path.$id.'.jpg';
		if (!file_exists($foto))
			$foto = base_url().'files/foto/nopict.jpg';
		else
			$foto = base_url().$foto;
		return $foto;
	}
}
// Thausand Sparator Numeric
if ( ! function_exists('thousand'))
{
	/*
	$num = numeric value
	$dec_digit = Specifies how many decimals
	$decimal_spar= Specifies what string to use for decimal point
	$thousand = Specifies what string to use for thousands separator
	*/
	function thousand($num=0,$dec_digit = 0,$decimal_spar='.',$thousand = ',')
	{
		if(!$num){
			$num = 0;
		}
		return number_format($num,$dec_digit,$decimal_spar,$thousand);
	}
}
if ( ! function_exists('dots'))
{
	/*
	$num = numeric value
	$dec_digit = Specifies how many decimals
	$decimal_spar= Specifies what string to use for decimal point
	$dots = Specifies what string to use for dotss separator
	*/
	function dots($num=0,$dec_digit = 0,$decimal_spar='.',$dots = '.')
	{
		if(!$num){
			$num = 0;
		}
		return number_format($num,$dec_digit,$decimal_spar,$dots);
	}
}

function jml_minggu($tgl_awal, $tgl_akhir){
	$detik = 24 * 3600;
	$tgl_awal = strtotime($tgl_awal);
	$tgl_akhir = strtotime($tgl_akhir);

	$minggu = 0;
	for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik)
	{
		if (date("w", $i) == "0")
		{
			$minggu++;
		}
	}
	return $minggu;
}	

function str_proper($str)
{
	return ucwords(strtolower($str));
}

function bulan_str($str)
{
	switch ($str) {
		case '01': return 'I'; break;
		case '02': return 'II'; break;
		case '03': return 'III'; break;
		case '04': return 'IV'; break;
		case '05': return 'V'; break;
		case '06': return 'VI'; break;
		case '07': return 'VII'; break;
		case '08': return 'VIII'; break;
		case '09': return 'IX'; break;
		case '10': return 'X'; break;
		case '11': return 'XI'; break;
		case '12': return 'XII'; break;
	}
}

function bulan_name($str)
{
	switch ($str) {
		case '01': return 'Januari'; break;
		case '02': return 'Februari'; break;
		case '03': return 'Maret'; break;
		case '04': return 'April'; break;
		case '05': return 'Mei'; break;
		case '06': return 'Juni'; break;
		case '07': return 'Juli'; break;
		case '08': return 'Agustus'; break;
		case '09': return 'September'; break;
		case '10': return 'Oktober'; break;
		case '11': return 'November'; break;
		case '12': return 'Desember'; break;
	}
}

function set_fullDate($str){
	$old_date = $str; 
	$old_date_timestamp = strtotime($old_date);
	return date('d M Y | H:i', $old_date_timestamp);  
}

/* ======================Ricky Custom========================== */
function decimal($str)
{
	return rtrim(rtrim($str,'0'),'.');
}
if ( ! function_exists('num2OrdiText'))
{
	function num2OrdiText($num=0) 
	{
		// $month[1]=array('First','Second','Third','Fourth'
					// ,'Fifth','Sixth','Seventh','Eighth','Ninth'
					// ,'Tenth');
		// $month[2]=array('Pertama','Kedua','Ketiga','Keempat'
					// ,'Kelima','Keenam','Ketujuh','Kedelapan','Kesembilan'
					// ,'Kesepuluh');
		$ord = '';
		if(strlen($num) == 1){
			switch ($num) {
				case '1': $ord = 'st';break;
				case '2': $ord = 'nd';break;
				case '3': $ord = 'rd';break;
			}
		
		}
		if($num > 3 && $num <= 20){
			$ord = 'th';
		}
		
		if(strlen($num) == 2){
			switch (substr($num,1,1)) {
				case '1': $ord = 'st';break;
				case '2': $ord = 'nd';break;
				case '3': $ord = 'rd';break;
			}
			if(substr($num,1,1) > 3){
				$ord = 'th';
			}
		}
		
		return $num.'<sup>'.$ord.'</sup>';
	}
}


	function number_format_short( $n, $precision = 1 ) {
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'K';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'JT';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'M';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'T';
		}
	  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
	  // Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
		return $n_format . $suffix;
	}

	function weight_format_short( $n, $precision = 1 ) {
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = 'KG';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'TON';
		}
	  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
	  // Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
		return $n_format . $suffix;
	}
	
	if ( ! function_exists('hitungDiscount'))
	{
		function hitungDiscount($harga,$discount,$qty=1)
		{
			/*
			menghitung nilai multi discount
			*/
			$jml = "";
			$pecah_dis = explode('+',$discount);
			$count_length = count($pecah_dis);
			$hasil_dis = 0;
			$hitung_persen = 0;
			$hitung = 0;
			$hasil_persen = 0;
			$hasil_non_persen = 0;
			$a=0;
			$non_persen = 0;
			$a = $harga;
			$discNew = '';
			for($i=0;$i<$count_length;$i++){				
				if(stristr($pecah_dis[$i],'%')){
					$angka = str_replace('%','',$pecah_dis[$i]);
					$sebelum = $a - $hasil_dis;
					$hitung_persen = ($sebelum*$angka)/100;
					$hasil_dis = $hasil_dis + $hitung_persen;
					$discNew = $discNew.' + '.trim($pecah_dis[$i]);
				}else {
					if($pecah_dis[$i] < 100) {
						if($i == 0) {
							$angka = str_replace('%','',$pecah_dis[$i]);
							$sebelum = $a - $hasil_dis;
							$hitung_persen = ((int)$sebelum*(int)$angka)/100;
							$hasil_dis = $hasil_dis + $hitung_persen;			
						}else if($i>0){
							$angka = str_replace('%','',$pecah_dis[$i]);
							$a = $harga - $hitung_persen;
							$sebelum = $a;
							$hitung_persen = ((int)$sebelum*(int)$angka)/100;
							$hasil_dis = $hasil_dis + $hitung_persen;
						}
						$discNew = $discNew.' + '.trim($pecah_dis[$i]).'%';
					}else{
						$a = $harga - $hitung_persen;
						$hitung = $pecah_dis[$i];
						$hasil_non_persen =  $harga;
						$hasil_dis = $hasil_dis + $hitung;
						
						$discNew = $discNew.' + '.trim($pecah_dis[$i]);
					}
				}
			}
			$hasil_dis = $hasil_dis?:0;
			$total_discount = $hasil_dis * $qty;
			$return = array();
			$discNew = substr($discNew,3);
			if ($discNew=='%')
				$discNew = '';

			$return['Discount'] = $discNew ;
			$return['TotalHarga'] = $harga * $qty ;
			$return['TotalDiscount'] = $hasil_dis * $qty;
			$return['TotalHargaNett'] = $return['TotalHarga'] - $return['TotalDiscount'];
			return $return;
		}
	}