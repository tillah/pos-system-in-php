<?php

require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){

    $farmerId = validate($paraRestultId);
    
    $farmers = getById('farmer',$farmerId);

    if($farmers['status'] == 200)
    {
        $response = delete('farmers', $farmerId);
        if($response)
        {
            redirect('farmers.php','Farmer Deleted Successfully');
        }
        else
        {
            redirect('farmers.php','Something Went Wrong.');
        }
    }
    else
    {
        redirect('farmers.php',$category['message']);
    }
}else{
    redirect('farmers.php','Something Went Wrong.');
}

?>
