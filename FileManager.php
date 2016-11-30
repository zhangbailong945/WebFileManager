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
         $list[]=$dirList;
         //$list[1]=$fileList;
         $json=json_encode($dirList);
         $json=str_replace('[', '{',$json);
         $json=str_replace(']', '}',$json);
         echo $json;
         //print_r($dirList);
     }
}

if(!empty($_POST['directory']))
{
   $directory=$_POST['directory'];
   $obj=new FileManager();
   $obj->getCurrentDir($directory);
}

