<?php 
  $encryption_key = "CE51E06875F7D964";
  $data='tokenNo=test&securityCode=111' ;
  // the below will return the encoded data you need to put the value in the variable $asl.
  echo encrypt($data,$encryption_key);
  function encrypt($data, $secret)
  {
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

     //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);
    //Pad for PKCS7
    $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = $blockSize - ($len % $blockSize);
    $data .= str_repeat(chr($pad), $pad);

    //Encrypt data
    $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');

    return base64_encode($encData);
  }

  //the below is the encryption of $data = 'token.....' which there above 
  $asl = 'xcFEvIdLXc0LX+lk46iIFY09GF+FL+SWM0PTNw669VE=';
  // this echo will provide you the $data which is there in the begining
  echo decrypt($asl , $encryption_key);

  function decrypt($data, $secret)
  {
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

    //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);

    $data = base64_decode($data);

    $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');

    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = ord($data[$len-1]);

    return substr($data, 0, strlen($data) - $pad);
  }

?>