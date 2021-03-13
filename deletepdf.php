<?php
    if($_POST['files']){
        foreach ($_POST['files'] as $key => $value) {
            unlink($value);
        }
    }
?>