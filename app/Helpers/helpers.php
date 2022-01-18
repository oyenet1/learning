<?php

function formatDate($date)
{
  $date = date_create($date);
  $date = date_format($date, 'd M, Y');
  return $date;
}


// function formatAgo($date)
// {
//   $date = date_create($date);
//   $date = date_format($date, 'd M, Y');
//   $date = diffForHumans($date);
//   return $date;
// }


// borrowers date return function
function returnDate($date)
{
  $date = date_create($date);
  $date = date_add($date, date_interval_create_from_date_string("14 days"));
  $date = date_format($date, 'D d F, Y');
  return $date;
}

function returnDateTime($date)
{
  $date = date_create($date);
  $date = date_format($date, 'H:iA, d M');
  return $date;
}

function getRandomColor($array)
{
  $randomIndex = array_rand($array);
  $randomElement = $array[$randomIndex];
  return $randomElement;
}

function moneyFormat($money)
{
  $salary =  number_format("$money", 2);
  return $salary;
}
