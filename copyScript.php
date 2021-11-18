<?php

if(shell_exec('copy /b image.jpg + encode.txt Encoded.jpg')){

echo "File has been encoded";
}


?>