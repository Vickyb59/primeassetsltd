<?php 	
	//sitewide error reporting
	error_reporting(-1); 
	ini_set('display_errors','on');
		
	//Get User IP and location of user
		$client_ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');
	
	//URL Parameters for basic url and canonical links
		$request = parse_url($_SERVER['REQUEST_URI']);
		$path = $request["path"];	
		preg_match("/[^\/]+$/", $path, $matches);
		//$plink = $matches[0]; 
	
		$urlmain = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$urlp = parse_url($urlmain);
		$url = $urlp['host'];
		
	
	//get base url and load files appropriately based on host(local or remote)
		if(
			( $_SERVER['REMOTE_ADDR'] == '::1' ) || ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' )
		){ 		
			$baseurl = 'http://localhost/royal-asset';			
		}  else {			
			$baseurl = 'https://royal-asset.com/';
		}
	//main url for SEO configurations
	$main_url = 'https://royal-asset.com/';
	$sweet_url = 'royal-asset.com';
	$noreply_password = 'Rasset@001';
	//main website configuration settings
		$settings = (object) array(
			'active' => 'active',
			'siteTitle' => 'Royal Assets',
			'siteTitleCap' => 'ROYAL ASSETS',
			'siteTagline' => 'A Cryptocurrency Investment Company',
			'phoneNumber' => '+1 (516) 2001 615',
			'address' => '38 Curity Ave, East York, ON M4B 0A2, Canada',
			'email' => 'info@royal-asset.com',
			'email2' => 'support@royal-asset.com',
			'email3' => 'sales@royal-asset.com',
			'instagram' => '',
			'facebook' => '',
			'linkedin' => '',
			'themeColor' => '#f58637',
			'siteLogo' => 'assets/img/logo/logo.png',
			'liteLogo' => 'assets/img/logo/logo-light.png',
			'googleMapAPI' => '',
			'toolbox' => false,
			'toolboxMain' => false,
			'preLoader' => true,
			'siteSearch' => true,
			'homeSlider' => true,
			'pageBanner' => true,
			'homeTestimonials' => false,
			'sideNav' => false,
			'breadCrumbs' => true,
			'copyRight' => true,
			'footerSocials' => true,
			'topBar' => true,
			'toTop' => true,
			'og_locale' => 'en_US'
		);
		
		$date = date('jS M, Y');
		$year = date('Y');
		
		//$page_types = array('Home', 'About Us', 'About', 'How It Works', 'Contact Us', 'Contacts', 'Get Listed');
	
	//Configure and display error messages
	GLOBAL $errors;
	GLOBAL $successes;
	function resultBlock($errors,$successes){
		//Error block
		if(count($errors) > 0)
		{
			echo "<div class='alert alert-danger'>
			<button aria-hidden='true' data-dismiss='alert' class='close' type='button'><i class='fa fa-close'></i></button>
			";
			foreach($errors as $error)
			{
				echo "<p><i class='icon-exclamation-sign' style='margin-right:7px'></i>".$error."</p>";
			}
			
			echo "</div>";
		}
		//Success block
		if(count($successes) > 0)
		{
			echo "<div class='alert alert-success'>
			<button aria-hidden='true' data-dismiss='alert' class='close' type='button'><i class='fa fa-close'></i></button>
			";
			foreach($successes as $success)
			{
				echo "<p><i class='icon-checkmark' style='margin-right:7px'></i>".$success."</span></p>";
			}
			
			echo "</div>";
		}
	}

	function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
		$output = NULL;
		if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
		}
		$purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
		$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America"
		);
		if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output = array(
							"city"           => @$ipdat->geoplugin_city,
							"state"          => @$ipdat->geoplugin_regionName,
							"country"        => @$ipdat->geoplugin_countryName,
							"country_code"   => @$ipdat->geoplugin_countryCode,
							"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => @$ipdat->geoplugin_continentCode
						);
						break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (@strlen($ipdat->geoplugin_regionName) >= 1)
							$address[] = $ipdat->geoplugin_regionName;
						if (@strlen($ipdat->geoplugin_city) >= 1)
							$address[] = $ipdat->geoplugin_city;
						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = @$ipdat->geoplugin_city;
						break;
					case "state":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = @$ipdat->geoplugin_countryName;
						break;
					case "countrycode":
						$output = @$ipdat->geoplugin_countryCode;
						break;
				}
			}
		}
		return $output;
	}
	
	//current menu item - main menu
	$cmi_mm = 'active';
	
	
	//remove html spaces and comments, merge to one line2-close
	function sanitize_output($buffer) {
		$search = array(
			'/\>[^\S ]+/s',     // strip whitespaces after tags, except space
			'/[^\S ]+\</s',     // strip whitespaces before tags, except space
			'/(\s)+/s',         // shorten multiple whitespace sequences
			'/<!--(.|\s)*?-->/' // Remove HTML comments
		);
		$replace = array( '>', '<', '\\1', '' );
		$buffer = preg_replace($search, $replace, $buffer);
		return $buffer;
	}

	//ob_start("sanitize_output");


	/**
	  * SEO Friendly URLS
	 **/

	function seoUrl($string) {
		
    	//Lower case everything
    	$string = strtolower($string);

	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);

	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    
	return $string;
}
	

?>
	