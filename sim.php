<?php
function simsimi($tresc) {
         $curl = curl_init(); if (!$curl) exit;
         $headers = array(
           'Accept: application/json, text/javascript, */*; q=0.01',
           'Content-type: application/json; charset=utf-8',
           'Referer: http://www.simsimi.com/talk.htm',
           'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; pl; rv:1.9.2.13) Gecko/20101203 Firefox/3.5.13',
           'Cookie: sagree=true; JSESSIONID=9EC7D24A64808F532B1287FFDDCDEC44',
           'X-Requested-With: XMLHttpRequest'
         );
         curl_setopt($curl, CURLOPT_URL, 'http://www.simsimi.com/func/req?msg='.urlencode($tresc).'&lc=id');
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         $result = curl_exec($curl);
        preg_match_all('#{"response":"(.*)","id":(.*),"result":(.*),"msg":"(.*)"}#sU', 
        trim($result), $ciag1);
        return $ciag1[1][0];
}
if(@isset($_POST[tlk]))
{ 
echo @simsimi($_POST['tlk']);
}
else
{
echo 'Halo apa kabar :) Saya Simi, si anak ayam yang lucu ^_^';
}
?>
<form action="" method="post">
<textarea name="tlk" placeholder="Katakan sesuatu :)"></textarea><br>
<input type="submit" value="Ngobrol">