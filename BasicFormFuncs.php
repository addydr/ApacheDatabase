<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function setChecked($val,$comp)
{
 if ($val==$comp)
  echo "checked"; 
}

function setSelected($val,$comp)
{
 if ($val==$comp)
  echo "selected"; 
}

function formatDateSelector($dt)
{
    $time = strtotime($dt);
    $newformat = date('Y-m-d',$time);
    return $newformat;
    
}