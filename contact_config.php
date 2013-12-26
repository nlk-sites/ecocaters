<?php
define("EMAIL_EOL", chr(10));

function get_param($param_name)
{
  $param_value = "";
  if(isset($_POST[$param_name]))
    $param_value = $_POST[$param_name];
  else if(isset($_GET[$param_name]))
    $param_value = $_GET[$param_name];

  return $param_value;
}

function strip($value)
{
  if(get_magic_quotes_gpc() == 0)
    return $value;
  else
    return stripslashes($value);
}

function tovalue($value)
{
  $value = str_replace('"', '&quot;', $value);
  return $value;
}

function toemail($value)
{
  $value = str_replace('&quot;', '"', $value);
  $value = str_replace("\'", "'", $value);
  $value = str_replace("\\\\", "", $value);
  $value = str_replace("\\", "", $value);
  return $value;
}
?>