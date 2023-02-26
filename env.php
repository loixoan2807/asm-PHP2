<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "db_asmphp2";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = "http://localhost/php2/asm2/";
function redirect($key, $msg, $route)
{
    setcookie($key, $msg, time() + 1, '/');
    header("location:" . BASE_URL . $route);
}
function route($link)
{
    header("location:./$link");
}
