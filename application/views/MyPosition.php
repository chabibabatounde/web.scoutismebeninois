<script type="text/javascript">
if ("geolocation" in navigator){
  navigator.geolocation.getCurrentPosition(function(position){ 
    var currentLatitude = position.coords.latitude;
    var currentLongitude = position.coords.longitude;
    document.write(currentLatitude+","+currentLongitude);
  });
}

/*

		$handle = curl_init(lien("MyPosition",""));
		curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($handle);
		$content  =  substr($response,22);

		*/
</script>