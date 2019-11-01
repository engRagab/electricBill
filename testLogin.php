<?php
 
$URL = 'http://www.scedc.com.eg/Security/LoginCustomer.aspx';
$user = 'ahmad_ragab';
$pass = 'Hasanhasan#123';
 
$cookie_path = dirname(__FILE__).'/cookie.txt';
 
print $user . "\n";
print $pass . "\n";
print $URL . "\n";

/**
 * Hace login en la web enviando un POST con el usuario y contraseña.
 */
function login($user, $pass) {
  global $cookie_path;
  $ch = curl_init($URL);
  curl_setopt($ch, CURLOPT_POST, 1);
  //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'Usuario='.$user.'&Password='.$pass);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
  $ret = curl_exec($ch);
  curl_close($ch);
 
  return $ret;
}
 
/**
 * Recupera una página html.
 */
function get($url) {
  global $cookie_path;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
  $html = curl_exec($ch);
  curl_close($ch);
 
  return $html;
}
 
/**
 * Parsea el html y retorna un array con todos los datos relevantes.
 */
function parse($html) {
  // Se deja esta implementación como ejercicio para el lector.
}
 
/**
 * Crea un nodo a partir del contenido de $data
 */
function create_node($data) {
  // guarda un nodo
  $node = (object)array(
  'title' => 'Loren ipsum',
  'body' => 'dolor sit amet'
  );
  $node = node_save($node);
  if (!$node->nid) {
    print "ERROR: error al crear un nodo para $data"; // TODO: $data se imprimirá como 'Array'
  }
  // lo asocia a una tax
  taxonomy_node_save($node, array($tax1, $tax2, $tax3));
}
 
/**
 *
 */
function main() {
  if (!login($user, $pass)) {
    print "ERROR: no pude hacer login.\n";
    exit;
  }
 
  $html = get($url);
  $data = parse($html);
  create_node($data);
}
 
main();