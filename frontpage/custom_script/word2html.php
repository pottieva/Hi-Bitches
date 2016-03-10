 <?php 


            $wfilepath='D:/wamp/www/New-Bee/uploads/1.doc';
            $word = new com("word.application",null,CP_UTF8) or die("wu fa dakai zhege wenjianjia"); 
            $word->visible = 1 ;    
            $word->Documents->Open($wfilepath)or die("wu fa dakai zhege wenjianjia");  
            $htmlpath=substr($wfilepath,0,-4);   
            $word->ActiveDocument->SaveAs($htmlpath,8);   
            $word->quit(0); 
   ?>