<?php
class FileManager
{
	 public $directory; //客户端点开的目录
     //获取目录
     public function getCurrentDir($currentDir)
     {
         $files =scandir($currentDir); 
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

         //print_r($dirList);
     }
     
     //获取所有文件
     public function getCurrentFiles($currentDir)
     {
        $files =scandir($currentDir);
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
           $fileList[]=$file;
         }
         echo json_encode($fileList);
     }
}

if(!empty($_POST['directory'])&&$_POST['action']=='load')
{
   $directory=$_POST['directory'];
   $obj=new FileManager();
   $obj->getCurrentDir($directory);
}

if(!empty($_POST['directory'])&&!empty($_POST['opendir'])&&$_POST['action']=='getimage')
{
   $directory=$_POST['directory'].'/'.$_POST['opendir'];
   $obj=new FileManager();
   $obj->getCurrentFiles($directory);
}

