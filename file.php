<?php

//打开 images 目录

$dir = opendir("filefolder");

//列出 images 目录中的文件
$c=0;
while (($file = readdir($dir)) !== false)

{
if ($c>1){?>
    <a href="filefolder/<?php echo $file; ?>" > <?php echo $file;?> <br />
	<?php }
$c++;
}

closedir($dir);

?>


