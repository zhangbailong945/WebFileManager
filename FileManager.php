<?php
class FileManager
{
	 public $directory; //客户端点开的目录
     
     public function getCurrentDir($currentDir)
     {
         $files =scandir($currentDir); 
         $list=array();
         $dirList=array();
         $fileList=array();
         foreach($files as $file)
         {
         	
         	if($file=='.')
         	{
         	   continue;
         	}
         	if($file=='..')
         	{
         	   continue;
         	}
            if(!is_dir($file)&&strpos($file,'.')!=false)
            {
                $fileList[]=$file;
            }
            else
            {
                
                $dirList[]=$file;
            }
            
         }

         echo json_encode($dirList);
         //echo $json;
     }
}

if(!empty($_POST['directory']))
{
   $directory=$_POST['directory'];
}
   
$obj=new FileManager();
echo "执行";
$obj->getCurrentDir('E:/images');   
   


