<?php
session_start();
require_once("env.php");
require_once("vendor/autoload.php");
require_once("commom/route.php");
?>
<script>
    const mess="<?= isset($_COOKIE["success"])?$_COOKIE["success"]:"" ?>";
    if(mess!=""){
        alert(mess);
    }
</script>