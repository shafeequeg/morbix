<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Warehouse| Management Application</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="Genova Technologies" />

    <?php include "includes/Inc_start.php";?>
    <?php
    if($this->session->userdata('user_type')=='admin'){
        $page_head_file_suffix="_admin";
    }elseif($this->session->userdata('user_type')=='manager'){
        $page_head_file_suffix="_manager";
    }
    elseif($this->session->userdata('user_type')=='sales'){
        $page_head_file_suffix="_sales";
    }
    elseif($this->session->userdata('user_type')=='billing'){
        $page_head_file_suffix="_billing";
    }
    elseif($this->session->userdata('user_type')=='godown'){
        $page_head_file_suffix="_godown";
    }
    elseif($this->session->userdata('user_type')=='driver'){
        $page_head_file_suffix="_driver";
    }
    ?>
    <!--    Include Page-->
    <?php include $directory."/".$page_name.'.php';?>

    <?php include "includes/Inc_footer.php";?>

