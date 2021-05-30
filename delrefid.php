<?php 
$ref=$_REQUEST['ia'];
include 'header.php';
?>
<html>
    <head>
        <style>
            .one{
                 border: 1px solid grey;
                 width: 50%;
                 margin: auto;
                 padding: 10px;
                 border-radius: 10px;
                 text-align: center;
                 margin-top: 20px;
            }
            .two{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="one">
            <div>Are you sure want to delete application <span style="color:blue"><?php echo $ref;?></span></div>
            <div class="two"><a href="<?php echo APP_PATH;?>/firefdel.php?iup=<?php echo $ref;?>"><button class="btn btn-danger">Yes</button></a>&nbsp;&nbsp;<a href="http://admin.goldquestglobal.in"><button class="btn btn-success">No</button></a></div>
        </div>
    </body>
</html>