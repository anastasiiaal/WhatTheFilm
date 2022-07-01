<?php
$curl = curl_init("https://api.themoviedb.org/3/movie/550?api_key=da132c4994c6cdb3b2b5e9cf82036454");
$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl));
} else {

}
curl_close($curl);