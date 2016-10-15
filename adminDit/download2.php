<?php
$user	=	"root";
$pass	=	"";
$conn = new PDO('mysql:host=localhost;dbname=kominfo',$user,$pass);

$data = $conn -> prepare("select * from upload2 where
        id=". $_REQUEST['id']);
$data -> execute();

if ($row = $data->fetch())
{
   $filedata = $row['filedata'];
   $id_dir = $row['id_direktorat'];
   $filename = $row['filename'];
   $filetype = $row['filetype'];
   $filesize = $row['filesize'];
}
 
header('Content-type: ' . $filetype);
header('Content-length: ' . $filesize);
header("Content-Transfer-Encoding: binarynn");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $filedata;
exit();
?>