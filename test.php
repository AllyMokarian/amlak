<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <title>سایت خبری</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>

</head>
<body>


<form method="post" action="">
    <input type="checkbox" name="service[]" value="red">
    <input type="checkbox" name="service[]" value="blue">
    <input type="checkbox" name="service[]" value="green">
    <input type="checkbox" name="service[]" value="white">
    <input type="radio" name="op" value="دارد">
    <input type="radio" name="op" value="ندارد">



<div class="r">
    <input type="checkbox" name="emkanat[]" value="abbass">
    <input type="checkbox" name="emkanat[]" value="ali">
</div>


    <input type="text" name="sanad">



    <input type="submit" value="ersal" name="send">
</form>

<?php
include ('Libs/amlak.php');
/*$amlak = new amlak();
if(isset($_POST['op'])){
    $e =  $_POST['op'];
}*/


//print_r($check);

/*if (isset($_POST['send'])){
    $check = implode(',',$_POST['color']);
    $sql = "INSERT INTO `nama`(`name`)VALUES (?)";
    $data = array($check);
    $res = $amlak->Idu($sql,$data);
    if ($res == 1){
        echo "insert";
    }else{
        echo "no";
    }
}*/


/*if (isset($_POST['send'])){
    $test = $_POST['color'];
    $ex = array();
   foreach ($test as $color){
        $ex[] = $color;

   }
    $check = implode(',', $ex);
$sql = "INSERT INTO `nama` ( `name` ) VALUES ( ? )";
    $data = array($check);
    $res = $amlak->Idu($sql,$data);
    if ($res == 1){
        echo "insert";
    }else{
        echo "no";
    }

}*/



//$id = $_SESSION['id'];

/*$sql = "select * from `etelaat_takmili`";
$data = array();
$res = $amlak->select($sql,$data);*/
//print_r($res);

//$test = $res[0]['emkanat'];
//print_r(json_decode($test));
if (isset($_POST['send'])){
    if (isset($_POST['service']) and isset($_POST['emkanat'])) {
        $service = $_POST['service'];
        $emkanat = $_POST['emkanat'];
        $sanad = $_POST['sanad'];
        $emkanat = json_encode($emkanat,JSON_FORCE_OBJECT);
        $service = json_encode($service,JSON_FORCE_OBJECT);



        //print_r($service);
        $query = "INSERT INTO `etelaat_takmili` (`service_wc`,`emkanat`,`sanad`)VALUES (?,?,?)";
        $data_t = array($service,$emkanat,$sanad);
        $res_t = $amlak->Idu($query, $data_t);
        if ($res_t == 1) {
            echo "ok";
        } else {
            echo "no";
        }
    }
       if (isset($_POST['sanad'])) {
            $sanad = $_POST['sanad'];
        }else{
           $sanad = "";
       }

    $query_s = "INSERT INTO `etelaat_takmili` (`sanad`)VALUES (?)";
    $data_s = array($sanad);
    $res_s = $amlak->Idu($query_s, $data_s);
    if ($res_s == 1) {
        echo "ok";
    } else {
        echo "no";
    }
}

?>

</body>

</html>


<script>
    do
    var text1 = 'g';
    $("#y option").filter(function() {
        //may want to use $.trim in here
        return $(this).text() == text1;
    }).prop('selected', true);
   var d=  $('#y option:selected').val();
alert(d);
    /*function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }return isNumberKey(event);*/

    /*function number_3_3 (num, sep){
        var number = typeof num === "number"? num.toString() : num,
            separator = typeof sep === "undefined"? ',' : sep;
        return number.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1"+separator);
    }*/



</script>
