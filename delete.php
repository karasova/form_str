<?php
    $files = file_get_contents("data.txt");
    $files = explode("\n", trim($files));
    $deletefiles = $_POST['deletes'];

        
    foreach ($files as $keys => $content){
        $content = explode(" | ", trim($content));
    
            foreach ($deletefiles as $checkbox){
                if ($checkbox === $content[7]){
                    $content[9] = 'deleted';                    
                    $files[$keys] = implode(" | ", $content); 
                }
            }                     
    }               
    
    $files = implode("\n", $files) . "\n";
    file_put_contents('data.txt', $files); 
