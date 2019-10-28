<?php
  $uname = $_POST['uname'];
  $psw = $_POST['psw'];
  
  echo "<h2>uname = $uname</h2>\n";
  echo "<h2>psw = $psw</h2>\n";
  
  //The username or email address of the account.
  define('USERNAME', $uname);
   
  //The password of the account.
  define('PASSWORD', $psw);
   
  //Set a user agent. This basically tells the server that we are using Chrome ;)
  define('USER_AGENT', 'Mozilla/5.0 (Windows NT 6.1; W…) Gecko/20100101 Firefox/70.0');
   
  //Where our cookie information will be stored (needed for authentication).
  define('COOKIE_FILE', 'cookie2.txt');
   
  //URL of the login form. http://www.scedc.com.eg/Security/LoginCustomer.aspx
  define('LOGIN_FORM_URL', 'http://www.scedc.com.eg/Security/LoginCustomer.aspx');
   
  //Login action URL. Sometimes, this is the same URL as the login form. http://www.scedc.com.eg/Security/LoginCustomer.aspx
  define('LOGIN_ACTION_URL', 'http://www.scedc.com.eg/Security/LoginCustomer.aspx');
   
   
  //An associative array that represents the required form fields.
  //You will need to change the keys / index names to match the name of the form
  //fields.
  $postValues = array(
      'ctl00$ctl00$MainBody$ContentPlaceHolder1$tbUserName' => USERNAME,
      'ctl00$ctl00$MainBody$ContentPlaceHolder1$tbPassword' => PASSWORD,
      '__VIEWSTATEGENERATOR' =>	'649F7045',
      '__EVENTVALIDATION' =>	'ihe36Sch6NZbK3MQN30etMedbw7YRFKC07uFkgHnP3/5AMdC9HXuyOiKNKmtM9Ip1gznZQQojZhidvzrB0Z8g1z6zmplA+8JgP4FxC5uIYdFaylb5/E42OGjL1lJd38BlmyG61ZaKN8evBuyuINJ9v/SHH5Bsz8VF3/l8+na/mg=',
  );
   
  //Initiate cURL.
  $curl = curl_init();
   
  //Set the URL that we want to send our POST request to. In this
  //case, its the action URL of the login form.
  
  curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
   
  //Tell cURL that we want to carry out a POST request.
  curl_setopt($curl, CURLOPT_POST, true);
   
  //Set our post fields / date (from the array above).
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
   
  //We don't want any HTTPS errors.
  //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   
  //Where our cookie details are saved. This is typically required
  //for authentication, as the session ID is usually saved in the cookie file.
  //curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
   
  //Sets the user agent. Some websites will attempt to block bot user agents.
  //Hence the reason I gave it a Chrome user agent.
  curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
   
  //Tells cURL to return the output once the request has been executed.
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   
  //Allows us to set the referer header. In this particular case, we are 
  //fooling the server into thinking that we were referred by the login form.
  curl_setopt($curl, CURLOPT_REFERER, LOGIN_FORM_URL);
   
  //Do we want to follow any redirects?
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
   
  //Execute the login request.
  echo curl_exec($curl);
  
  exit;
  
  //Check for errors!
  if(curl_errno($curl)){
      throw new Exception(curl_error($curl));
  }
   
  //We should be logged in by now. Let's attempt to access a password protected page http://www.scedc.com.eg/Customer/BillsInquires.aspx
  curl_setopt($curl, CURLOPT_URL, 'https://www.codechef.com/users/ahmad_ragab');
   
  //Use the same cookie file.
  //curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
   
  //Use the same user agent, just in case it is used by the server for session validation.
  curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
   
  //We don't want any HTTPS / SSL errors.
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   
  //Execute the GET request and print out the result.
  echo curl_exec($curl);