<?php
  include "simple_html_dom.php";
  

  
  $headers = array (   
    //'Cookie: TSPD_101=08ce110aecab280094f280d627cc68873431dfb707d270444aaf5920597ad7acd2dd729aa4c99a53f8df095b6a16ca1e',
    //'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Host: www.scedc.com.eg',    
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) Gecko/20100101 Firefox/58.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Accept-Encoding: gzip, deflate',
    //'Cookie: first.txt',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',    
  );
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.scedc.com.eg/Security/LoginCustomer.aspx/#");
 
  //curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
  curl_setopt($ch, CURLOPT_COOKIESESSION, 1);  
  $response = curl_exec($ch);
  //curl_close($ch);
  
  //echo $response;
  
  $html = new simple_html_dom();
  $html->load($response);
  
  foreach($html->find('input[id=__VIEWSTATE]') as $link){
    $__VIEWSTATE = $link->value;
    //echo "__VIEWSTATE" . "=" . $__VIEWSTATE . "\n";
    
  }
  
  foreach($html->find('input[id=__VIEWSTATEGENERATOR]') as $link){
    $__VIEWSTATEGENERATOR = $link->value;
    //echo "__VIEWSTATEGENERATOR" . "=" . $__VIEWSTATEGENERATOR . "\n";
    
  }
  
  foreach($html->find('input[id=__EVENTVALIDATION]') as $link){    
    $__EVENTVALIDATION = $link->value;
    //echo "__EVENTVALIDATION" . "=" . $__EVENTVALIDATION . "\n";
  }
  
  
  $postFields = array(
    '__EVENTVALIDATION' => "$__EVENTVALIDATION",
    '__VIEWSTATE' => "$__VIEWSTATE",
    '__VIEWSTATEGENERATOR' =>	"$__VIEWSTATEGENERATOR",
    'ctl00$ctl00$MainBody$ContentPlaceHolder1$LoginBtn' => "دخول",
    'ctl00$ctl00$MainBody$ContentPlaceHolder1$tbPassword'	=> 'Hasanhasan#123',
    'ctl00$ctl00$MainBody$ContentPlaceHolder1$tbUserName'	=> 'ahmad_ragab'
  );
  
  
  $headers2 = array (
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',    
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Host: www.scedc.com.eg',
    'Referer: http://www.scedc.com.eg/Security/LoginCustomer.aspx/',
    'Upgrade-Insecure-Requests: 1',    
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',    
  );
    
  //$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.scedc.com.eg/Security/LoginCustomer.aspx/");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers2);
  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
  $response = curl_exec($ch);
  
  
  // ---------------------------------- customer account ---------
  $headers3 = array (
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',    
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Host: www.scedc.com.eg',
    'Referer: http://www.scedc.com.eg/Security/LoginCustomer.aspx/',
    'Upgrade-Insecure-Requests: 1',    
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',    
  );
    
  //$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.scedc.com.eg/Customer/CustomerAccount.aspx/");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers3);
  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
  $response = curl_exec($ch);
  
  //echo "-------------------------------------------------------\n";
  
  //echo $response;
  
  //echo "--------------------------  personal name -----------------------------\n";
  
  $html->load($response);
  
  foreach($html->find('span[id=MainBody_EmpNameLbl]') as $link){
    $MainBody_EmpNameLbl = $link->innertext;
    //echo "MainBody_EmpNameLbl" . "=" . $MainBody_EmpNameLbl . "\n";
    
  }
  
  
  // ---------------------------------- customer data ---------
    
  //$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.scedc.com.eg/Customer/CustomerBasicInformation.aspx/");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers3);
  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
  $response = curl_exec($ch);
  
  curl_close($ch);
  
  $html->load($response);
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_NameTb]') as $link){
    $NameTb = $link->innertext;
    //echo "NameTb" . "=" . $NameTb . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_NationalIDTb]') as $link){
    $NationalIDTb = $link->innertext;
    //echo "NameTb" . "=" . $NationalIDTb . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_EmailTb]') as $link){
    $EmailTb = $link->innertext;
    //echo "NameTb" . "=" . $EmailTb . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_PhoneTb]') as $link){
    $PhoneTb = $link->innertext;
    //echo "NameTb" . "=" . $PhoneTb . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_StaticLbl1]') as $link){
    $StaticLbl1 = $link->innertext;
    //echo "NameTb" . "=" . $StaticLbl1 . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_RemoteCustomer]') as $link){
    $RemoteCustomer = $link->innertext;
    //echo "NameTb" . "=" . $RemoteCustomer . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_BillingName]') as $link){
    $BillingName = $link->innertext;
    //echo "NameTb" . "=" . $BillingName . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_LblFrom]') as $link){
    $LblFrom = $link->innertext;
    //echo "NameTb" . "=" . $LblFrom . "\n";    
  }
  
  foreach($html->find('span[id=MainBody_ContentPlaceHolder1_LblTo]') as $link){
    $LblTo = $link->innertext;
    //echo "NameTb" . "=" . $LblTo . "\n";    
  }
  
  $html = <<<HTML
  <table>
    <tr>
      <th>الاسم:</th>
      <td>$MainBody_EmpNameLbl</td>
    </tr>
    <tr>
      <th>الاسم:</th>
      <td>$NameTb</td>
    </tr>
    <tr>
      <th>الرقم القومي:</th>
      <td>$NationalIDTb</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>$EmailTb</td>
    </tr>
    <tr>
      <th>التليفون:</th>
      <td>$PhoneTb</td>
    </tr>
    <tr>
      <th>Lbl:</th>
      <td>$StaticLbl1</td>
    </tr>
    <tr>
      <th>رقم التحصيل:</th>
      <td>$RemoteCustomer</td>
    </tr>
    <tr>
      <th>الاسم بفاتورة الكهرباء:</th>
      <td>$BillingName</td>
    </tr>
    <tr>
      <th>ميعاد تبليغ القراءة من:</th>
      <td>$LblFrom</td>
    </tr>
    <tr>
      <th>إلى:</th>
      <td>$LblTo</td>
    </tr>
  </table>
HTML;

echo $html;

?>