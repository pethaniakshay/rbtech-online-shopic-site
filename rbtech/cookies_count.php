<?php
if(isset($_COOKIE['item']))  //this is for check cookies are available or nor
{
    $count_data = 0;
    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move 3 times
    {
        $count_data=$count_data+1;
    }
}
else
{
    $count_data=0;
}

echo $count_data;