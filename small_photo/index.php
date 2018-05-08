<?php  
require 'image.class.php';  
$src = "upload/tmp.jpg";

$aa = scandir('upload');

foreach($aa as $row)
{
    if(in_array($row,['.','..']))
    {
        continue;
    }
    $row = 'upload/'.$row;
    do_thump($row);
}



function do_thump($src)
{
    $newname = substr($src,strpos($src,'/'));
    $newname = substr($newname,1,(strpos($newname,'.')-1));

    $ext = substr($src,strpos($src,'.'));
    $ext = substr($ext,1);

    $image = new Image($src);
    $image->percent = 0.2;
    $image->openImage();
//$image->thumpImage();
    $image->thumpImage_bu_width(120);
    $image->showImage();
    $image->saveImage($newname,$ext);
}
?>  