<?php
  $json_string1 = file_get_contents("http://api.wunderground.com/api/a17de8113d1dfa97/astronomy/q/England/Chelsea.json");
  $json_string2	= file_get_contents("http://api.wunderground.com/api/a17de8113d1dfa97/forecast/q/England/Chelsea.json");
  $json_string3	= file_get_contents("http://api.wunderground.com/api/a17de8113d1dfa97/conditions/q/England/Chelsea.json");
  
  $parsed_json1 = json_decode($json_string1);
  $percentIlluminated = $parsed_json1->{'moon_phase'}->{'percentIlluminated'};
  $phasemoon = $parsed_json1->{'moon_phase'}->{'phaseofMoon'};
  $hemisphere = $parsed_json1->{'moon_phase'}->{'hemisphere'};
  
  $parsed_json2 = json_decode($json_string2);
  $waktu = $parsed_json2->{'forecast'}->{'txt_forecast'}->{'date'};
  $hari = $parsed_json2->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'title'};
  $ramalan = $parsed_json2->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'fcttext'};
  
  $parsed_json3 = json_decode($json_string3);
  $country = $parsed_json3->{'current_observation'}->{'display_location'}->{'state_name'};
  $city = $parsed_json3->{'current_observation'}->{'display_location'}->{'city'};
  $weather = $parsed_json3->{'current_observation'}->{'weather'};
  
  echo "PENGAMATAN CUACA oleh: Aldy Hernawan<br><br>";
  echo "Negara: ${country}<br>";
  echo "Kota: ${city}<br>";
  echo "Cuaca: ${weather}<br><br>";
  
  echo "FASE BULAN<br>";
  echo "Persentasi Kecerahan Bulan: ${percentIlluminated}<br>";
  echo "Fase Bulan: ${phasemoon}<br>";
  echo "Belahan Bumi: ${hemisphere}<br><br>";
  echo "RAMALAN CUACA<br>";
  echo "Waktu: ${waktu}<br>";
  echo "Hari: ${hari}<br>";
  echo "Ramalan Cuaca hari ${hari}: ${ramalan}<br>";
?>