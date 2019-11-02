<?php

$all_files = glob("/home/sroot/img/*.*");
$count_all_files = count($all_files);

echo "<h1>Images Found: " . $count_all_files . "</h1>";

for ($i=0; $i<$count_all_files; $i++)
{
        $image_name = $all_files[$i];

        echo "Image: " . $image_name  . "<br/>";

        $supported_format = array('gif','jpg','jpeg','png');

        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (in_array($ext, $supported_format))
        {
                $data = exif_read_data( $image_name, 0, true  );
               
                echo "Date Created TimeStamp: " . $data["FILE"]["FileDateTime"] . "<br/>";
                echo  "Date Created: " . date('Y-m-d H:i:s', $data["FILE"]["FileDateTime"] ) . "<br/>";
                if ( $data["FILE"]["FileDateTime"] < 1571529600 )
                {
                    echo "<div style='background:red'>ALERT</div>";
                }
        }
        else
        {
          continue;
        }

}

?>
