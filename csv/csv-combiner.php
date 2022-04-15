<?php
if (isset($argc)) {
    // reading the cmd line
    $file1=$argv[1];
    $file2=$argv[2];
    //reading and converting the csv files to arrays
    $csv1 = array_map('str_getcsv', file($file1));
    $csv2 = array_map('str_getcsv', file($file2));
    $data=[];
    //adding the first array rows to the combining array
 for($i=1;$i<count($csv1);$i++){
    $data[]=array($csv1[0][0]=>$csv1[$i][0],$csv1[0][1]=>$csv1[$i][1],"filename"=>$file1);

    }
        //adding the second array rows to the combining array

    for($i=1;$i<count($csv2);$i++){
        $data[]=array($csv2[0][0]=>$csv2[$i][0],$csv2[0][1]=>$csv2[$i][1],"filename"=>$file2);

    
        }

        //put the combining array to the combined csv file
        $fp=fopen('php://output', "w");
        // Loop through file pointer and a line
        fputcsv($fp, array_keys($data['0']));
        foreach($data AS $values){
            fputcsv($fp, $values);
        }
        fclose($fp);
}
?>
