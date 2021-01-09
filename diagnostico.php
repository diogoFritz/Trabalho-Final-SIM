<?php

$SYMPTOMS = $_POST['symptoms_progressed'];
$TRAVEL_H = $_POST['travel_history'];
$DROWSINE = $_POST['drowsiness'];
$BODY_TEM = $_POST['body_temperature'] * 1.8 + 32;
$DRY_COUG = $_POST['dry_cough'];
$PAIN = $_POST['chest_pain'];
$STROKE_O = $_POST['stroke'];
$DIABETES = $_POST['diabetes'];
$AGE = $_SESSION['idade'];
$class = 0;
$id = $_SESSION['user_id'];


/*Terminal Node 1*/
if( $SYMPTOMS == 1  && $TRAVEL_H == 1 && $AGE <= 27 )
{
     $class = 1;
}

/*Terminal Node 2*/
if($SYMPTOMS == 1 && $TRAVEL_H == 1 && $AGE > 27 )
{   
     $class = 2;
}

/*Terminal Node 3*/
if($DROWSINE == 1 &&$SYMPTOMS == 0 &&$TRAVEL_H == 1  )
{  
     $class = 1;
}

/*Terminal Node 4*/
if($DROWSINE == 0 &&$SYMPTOMS == 0 &&$TRAVEL_H == 1 &&$AGE <= 54 &&$BODY_TEM <= 98.9 )
{  
     $class = 1;
}

/*Terminal Node 5*/
if($DROWSINE == 0 &&$SYMPTOMS == 0 &&$TRAVEL_H == 1 &&$AGE <= 54 &&$BODY_TEM > 98.9 )
{  
     $class = 2;
}

/*Terminal Node 6*/
if($DROWSINE == 0 &&$SYMPTOMS == 0 &&$TRAVEL_H == 1 &&$AGE > 54 )
{
     $class = 0;
}

/*Terminal Node 7*/
if( $DRY_COUG == 1 && $PAIN == 1 &&$TRAVEL_H == 0 )
{
     $class = 2;
}

/*Terminal Node 8*/
if($DRY_COUG == 0 &&$PAIN == 1 &&$TRAVEL_H == 0 ) 
{
     $class = 1;
}

/*Terminal Node 9*/
if($STROKE_O == 1 &&$PAIN == 0 &&$TRAVEL_H == 0 )
{
     $class = 1;
}

/*Terminal Node 10*/
if($DIABETES == 1 &&$STROKE_O == 0 &&$PAIN == 0 &&$TRAVEL_H == 0 )
{
     $class = 2;
}

/*Terminal Node 11*/
if( $DIABETES == 0 &&$STROKE_O == 0 &&$PAIN == 0 &&$TRAVEL_H == 0 )
{
     $class = 0;
}

if($class == 0) print("Low risk");
if($class == 1) print("Medium risk");
if($class == 2) print("High risk");

$connect = mysqli_connect('localhost', 'root', '','covid')
or die('Error connecting to the server: ' . mysqli_error($connect));
$sql = "UPDATE `pacientes` SET `resultado`=($class) WHERE (user_id=$id)"; 
$result = mysqli_query($connect ,$sql)
or die('The query failed: ' . mysqli_error($connect));
mysqli_close($connect);

?>