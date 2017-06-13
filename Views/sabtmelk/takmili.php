<?php
foreach (glob(getcwd()."/../../Libs/*.php") as $filename){include $filename;}
foreach (glob(getcwd()."/../../Models/*.php") as $filename){include $filename;}

$hooks = new Hooks();
$amlak = new amlak();


?>

    <!DOCTYPE html>
    <html dir="rtl" lang="fa">

    <head>
        <meta charset="utf-8">
        <title>سایت خبری</title>
        <!--load css-->
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <!--<link rel="stylesheet" href="css/mdb.min.css">-->
        <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/select2.min.css">
        <link rel="stylesheet" href="../../css/chosen.min.css">


        <?php

       // echo $_COOKIE['rand_email'];
        $user = new user();

        $id = $_SESSION['id'];
        $sql_last = "select * from `add_melk` where `id` =?";
        $data_last = array($id);
        $res_last = $amlak->select($sql_last,$data_last);
        //print_r($res_last);

        ?>


    </head>

    <body>
        <!--container-fluid-->
        <div class="container-fluid bg_menu">
            <!--row-menu-->
            <div class="row">
                <div class="col-md-4">
                    <div class="login">

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-success btn-lg" id="myBtn">ورود به سایت</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style="color:red;"><span><i class="fa fa-lock"></i></span>فرم لاگین</h4>
                                    </div>
                                    <div class="modal-body">
                                        <span id="error"></span>
                                        <form role="form" id="sendForm">
                                            <div class="form-group">
                                                <label for="usrname"><span><i class="fa fa-user"></i></span> نام کاربری</label>
                                                <input type="text" name="email" class="form-control" id="usrname" placeholder="ایمیل خود را وارد کنید">
                                            </div>
                                            <div class="form-group">
                                                <label for="psw"><span><i class="fa fa-key"></i></span>پس ورد</label>
                                                <input type="text" name="password" class="form-control" id="psw" placeholder="پس ورد را وارد کنید">
                                            </div>

                                            <div class="form-group">
                                                <label for="psw"><span><i class="fa fa-key"></i></span>کد امنیتی : </label>
                                                <input type="text" name="capcha" class="form-control" id="psw" placeholder="کد امنیتی را وارد کنید..">
                                            </div>

                                            <div class="form-group">

                                                <img src="../../captcha/captcha.php" />
                                            </div>

                                            <div class="checkbox">
                                                <label>یاداوری<input type="checkbox" value="" checked></label>
                                            </div>
                                            <a onclick="sendForm();" class="btn btn-default btn-success btn-block" id="send"><span><i class="fa fa-key"></i></span>ورود</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal"><span><i class="fa fa-close"></i></span>خروج</button>
                                        <p>عضو نیستید؟<a href="#">ثبت نام</a></p>
                                        <p>آیا رمز خود را فراموش کردید؟ <a href="#">بازیابی پس ورد</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-8">

                    <span class="h" onclick="openNav()"><i class="fa  fa-bars"></i>فهرست</span>
                    <div class="menu">
                        <ul>
                            <li><a href="#">درباره ما</a></li>
                            <li><a class="btn btn-success" href="#">سپردن ملک رایگان</a></li>
                            <li><a href="#">بانک املاک</a></li>
                            <li><a href="#">املاک روی نقشه</a></li>
                            <li><a href="#">خرید</a></li>
                            <li><a href="#">اجاره</a></li>
                        </ul>
                    </div>

                    <div id="mySidenav" class="sidenav">
                        <a class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
                        <a href="#">درباره ما</a>
                        <a href="#">بانک املاک</a>
                        <a href="#">املاک روی نقشه</a>
                        <a href="#">خرید</a>
                    </div>


                </div>

                <!--/menu-->
            </div>
            <!--/row-menu-->
        </div>
        <!--end container-fluid-->

        <!--container-->
        <div class="container">
            <!--row-->
            <div class="row">

                <!--col-sm-12-->
                <div class="col-sm-12">

                    <!--alert_top-->
                    <div class="alert_top">
                        <h1 class="title_edit">ویرایش ملک</h1>
                        <?php

                        if(!$user->is_user()){


                            echo' 
                       
                        <!--alert-->
                        <div id="x" class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            <strong>برای شما کاربر جدید در سایت مشاور ایجاد شد. !</strong>
                            
                                    
                                    <p>
                                        <strong>نام کاربری:</strong>'.$_COOKIE['rand_email'].'
                                    </p>
        
                                    <p>
                                        <strong>پس ورد:</strong>'.$_COOKIE['rand_pass'].'
                                    </p>';

                            //print_r($_COOKIE);
                            }else{
                                echo $_SESSION['name'];
                            }

                            ?>



                        </div>
                        <!--/alert-->

                        <!--alert-->
                        <div class="alert alert-warning" role="alert">


                            <strong>اطلاعات اولیه ملک شما ذخیره شده است. شما می‌توانید با وارد کردن اطلاعات بیشتر در مورد ملک خود احتمال موفقیت آگهی خود را افزایش دهید.  !</strong>

                        </div>
                        <!--/alert-->
                    </div>
                    <!--/alert_top-->


                    <!--back-->
                    <div class="back">

                        <!--content-->
                        <div class="content">

                            <!--form-->
                            <form id="sabt_takmili">

                                <!--row-->
                                <div class="row">

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <div class="amade_forosh">
                                                <select>
                                                    <option>1</option>
                                                    <option>1</option>
                                                    <option>1</option>
                                                </select>
                                                <label>وضعیت</label>
                                            </div>


                                        </div>

                                    </div>
                                    <!--/col-md-6-->

                                    <!--col-md-6-->
                                    <div class="col-md-6">
                                        <div class="etelaat">
                                            <h1>اطلاعات اولیه</h1>
                                        </div>
                                    </div>
                                    <!--/col-md-6-->

                                    <!--line-->
                                    <div class="form-group line"></div>
                                    <!--/line-->

                                </div>
                                <!--/row-->

                                <!--row-->
                                <div class="row">

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--masahat-->
                                        <div class="masahat">
                                            <span class="star">*</span>
                                            <span class="name">مساحت</span>

                                            <div class="input-group">
                                                <span class="input-group-btn" style="float: left !important;">
                                                  <button class = "btn btn-default" type = "button">
                                                    متراژ
                                                  </button>
									           </span>
                                                <input id="masahat" name="masahat" type="text" class="form-control input-groupedame1">
                                            </div>

                                        </div>
                                        <!--/masahat-->

                                    </div>
                                    <!--/col-md-6-->

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--noe-->
                                        <div class="noe">

                                            <span class="star">*</span>
                                            <span class="name">نوع ملک</span>

                                            <div class="form-group">
                                                <select name="noe_melk" class="form-control" id="noe_melk">
                                                    <?php

                                                    $sql = "select * from `noe_melk`";
                                                    $data = array();
                                                    $res = $amlak->select($sql,$data);
                                                    foreach ($res as $noe){
                                                        echo ' <option  value="'.$noe['name'].'">'.$noe['name'].'</option>';
                                                    }
                                                    ?>


                                                 </select>
                                            </div>

                                        </div>
                                        <!--/noe-->

                                    </div>
                                    <!--/col-md-6-->

                                </div>
                                <!--/row-->

                                <!--row-->
                                <div class="row">

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <div class="map">
                                            <img class="img-responsive" src="../../img/1.jpg">
                                        </div>

                                    </div>
                                    <!--/col-md-6-->

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--box-->
                                        <div class="box">
                                            <label>
                                                استان
                                                <span class="star">*</span>
                                            </label>
                                            <div id="test" class="right-select">
                                                <select id="ostan_tak" class="select1" name="ostan_tak">
                                                    <?php

                                                    $sql_ostan = "select * from `province`";
                                                    $data_ostan = array();
                                                    $res_osten = $amlak->select($sql_ostan,$data_ostan);
                                                    foreach ($res_osten as $row_ostan){

                                                        echo ' <option id='.$row_ostan['id'].' >'.$row_ostan['name'].'</option>';
                                                    }

                                                    ?>


                                                </select>
                                            </div>
                                            <span class="tag">ابتدا استان موردنظر خود را وارد نمایید</span>

                                        </div>
                                        <!--/box-->


                                        <!--box-->
                                        <div class="box">
                                            <label>
                                                شهر
                                                <span class="star">*</span>
                                            </label>
                                            <div id="box_select" class="right-select">
                                                <select id="shar" name="shahr" class="select1" title="شهر" placeholder="شهرستان" value="شهرستان">

                                                </select>


                                            </div>
                                            <span class="tag">ابتدا شهر موردنظر خود را وارد نمایید</span>

                                        </div>
                                        <!--/box-->




                                        <!--box-->
                                        <div class="box">
                                            <label>
                                                منطقه
                                                
                                            </label>
                                            <div class="right-select">
                                                <div class="form-group row" style="width: 94%; margin-right: 2px;">

                                                    <input name="mantaghe" oninput="function_text()" class="form-control" id="mantaghe" type="text" ng-model="name" placeholder="منطقه...">

                                                </div>
                                            </div>
                                            <span class="tag">برای نمایش بیشتر و دقیق تر آگهی خود سعی کنید منطقه یا محله خود را نیز انتخاب کنید</span>

                                        </div>
                                        <!--/box-->

                                        <!--box-->
                                        <div class="box">
                                            <label>
                                                آدرس
                                                
                                            </label>
                                            <div class="right-select">
                                                <div class="form-group row" style="width: 94%; margin-right: 2px;">



                                                    <input id="address" name="address" class="form-control" id="ex1" type="text" placeholder="ادرس...">

                                                </div>
                                            </div>

                                        </div>
                                        <!--/box-->


                                        <!--box-->
                                        <div class="box">
                                            <label>
                                                <span style="width: 37%;display: inline-block;">آدرس نهایی شما که نمایش داده خواهد شد</span>
                                                
                                            </label>
                                            <div class="right-select">
                                                <div class="form-group row" style="width: 94%; margin-right: 2px;">



                                                        <span id="adress_nahaie" class="adress_nahaie"></span>



                                                </div>
                                            </div>

                                        </div>
                                        <!--/box-->
                                    </div><!--test-->

                                    </div>
                                    <!--/col-md-6-->

                                </div>
                                <!--/row-->


                                <div class="etelat_box">
                                    <div class="etelaat">
                                        <h1>اطلاعات ضروری</h1>
                                    </div>
                                </div>


                                <div class="form-group line1"></div>

                                <!--row_zaruri-->
                                <div class="row">

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--noe-->
                                        <div class="noe">

                                            <!--makhfi3-->
                                            <div class="makhfi4">

                                                <span class="star">*</span>
                                                <span class="name">نوع قیمت</span>

                                                <div class="form-group">
                                                    <select name="gheymat" class="form-control" id="sel1">
                                                    <option>قیمت هر متر مربع</option>
                                                    <option>قیمت کل</option>
                                                 </select>
                                                </div>
                                            </div>
                                            <!--/makhfi3-->

                                        </div>
                                        <!--/noe-->


                                        <!--row mablaghrahn-->
                                        <div class="row">
                                            <!--makhfi1-->
                                            <div class="makhfi1" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe-->
                                                    <div class="noe">

                                                        <div class="form-group" style="width: 77%;">
                                                            <div class="input-group" style="margin-right: -55px;width: 96%;">
                                                                <span class="input-group-btn" style="float: left !important;">
                                                              <button class = "btn btn-default" type = "button">
                                                                تومان
                                                              </button>
                                                           </span>
                                                                <input id="rahn" name="rahn" type="text" class="form-control input-groupedame1">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <span class="star">*</span>
                                                        <label>مبلغ رهن</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi1-->
                                        </div>
                                        <!--/row mablaghrahn-->



                                        <!--row-->
                                        <div class="row">

                                            <!--makhfi3-->
                                            <div class="makhfi4">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <label><input id="moaveze1" type="radio" name="moaveze1">دارد</label>

                                                            <label><input id="moaveze2" type="radio" name="moaveze1"  checked="checked">ندارد</label>
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <label>امکان معاوضه</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi4-->
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">

                                            <!--makhfi5-->
                                            <div class="makhfi5" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <input name="emkane_moaveze" class="form-control" id="ex1" type="text">
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <label>معاوضه با</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi5-->
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">

                                            <!--makhfi3-->
                                            <div class="makhfi4">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <label><input id="pish_forosh1" type="radio" name="pish_forosh1" value="1">دارد</label>

                                                            <label><input id="pish_forosh2" type="radio" name="pish_forosh1" checked="checked" value="2">ندارد</label>
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <label>آیا برای پیش فروش است؟</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi3-->
                                        </div>
                                        <!--/row-->

                                        <!--makhfi7-->
                                        <div class="makhfi7" style="display:none;">
                                            <!--sakht-->
                                            <div class="form-group topp">

                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <input name="marhale_sakht" class="form-control" id="ex1" type="text" style="width: 77% !important;">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <label>مرحله ساخت</label>
                                                </div>

                                            </div>
                                            <!--/sakht-->
                                        </div>
                                        <!--/makhfi7-->

                                        <!--makhfi3-->
                                        <div class="makhfi7" style="display:none;">
                                            <!--tahvil-->
                                            <div class="form-group topp">

                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <input name="zamane_tahvil" class="form-control" id="ex1" type="text" style="width: 77% !important;">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <label>زمان تحویل</label>
                                                </div>

                                            </div>
                                            <!--/tahvil-->
                                        </div>
                                        <!--/makhfi3-->

                                        <!--makhfi3-->
                                        <div class="makhfi7" style="display:none;">
                                            <!--pardakht-->
                                            <div class="form-group topp">

                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <div class="input-group">
                                                        <span class="input-group-btn" style="float: left !important;">
                                                      <button class = "btn btn-default" type = "button">
                                                        تومان
                                                      </button>
                                                   </span>
                                                        <input name="pishpar_dakht" type="text" class="form-control input-groupedame1">
                                                    </div>

                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <label>مبلغ پیش پرداخت</label>
                                                </div>

                                            </div>
                                            <!--/pardakht-->
                                        </div>
                                        <!--/makhfi3-->

                                    </div>
                                    <!--/col-md-6-->

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--row moamele-->
                                        <div class="row">

                                            <!--col-md-9-->
                                            <div class="col-md-9 col-sm-9 col-xs-9">

                                                <!--noe moamele-->
                                                <div class="noe">

                                                    <div class="form-group">

                                                        <select name="kharid_rahn" class="form-control" id="noe">

                                                            <option value="1">خرید و فروش</option>
                                                            <option value="2">رهن و اجاره</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <!--/noe moamele-->
                                            </div>
                                            <!--/col-md-9-->

                                            <!--col-md-3-->
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">
                                                    <span class="star">*</span>
                                                    <label>نوع معامله</label>
                                                </div>
                                            </div>
                                            <!--/col-md-3-->
                                        </div>
                                        <!--/row moamele-->


                                        <!--noe ejare-->
                                        <div class="row">

                                            <!--makhfi1-->
                                            <div class="makhfi1" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe moamele-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <div class="input-group" style="width: 53%;">
                                                                <span class="input-group-btn" style="float: left !important;">
                                                              <button class = "btn btn-default" type = "button">
                                                                تومان
                                                              </button>
                                                           </span>
                                                                <input id="ejare" name="ejare" type="text" class="form-control input-groupedame1">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/noe moamele-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <span class="star">*</span>
                                                        <label>مبلغ اجاره</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi1-->

                                        </div>
                                        <!--/noe ejare-->


                                        <!--noe gheymat-->
                                        <div class="row">

                                            <!--makhfi4-->
                                            <div class="makhfi4">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <div class="input-group" style="width: 53%;">
                                                                <span class="input-group-btn" style="float: left !important;">
                                                              <button class = "btn btn-default" type = "button">
                                                                تومان
                                                              </button>
                                                           </span>
                                                                <input id="gheymat" name="gheymat" type="text" class="form-control input-groupedame1">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">
                                                        <span class="star">*</span>
                                                        <label>قیمت</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi4-->

                                        </div>
                                        <!--/noe gheymat-->

                                        <!--noe vam-->
                                        <div class="row">

                                            <!--makhfi4-->
                                            <div class="makhfi4">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe vam-->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <label><input id="vam" type="radio" value="1" name="vam" >دارد</label>

                                                            <label><input id="vam1" type="radio" name="vam" value="0" checked="checked">ندارد</label>
                                                        </div>

                                                    </div>
                                                    <!--/noe vam-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">

                                                        <label>وام</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi4-->
                                        </div>
                                        <!--/noe vam-->


                                        <!--noe vam mablagh-->
                                        <div class="row">

                                            <!--makhfi6-->
                                            <div class="makhfi6" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe vam -->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <div class="input-group" style="width:53%;">
                                                                <span class="input-group-btn" style="float: left !important;">
                                                              <button class = "btn btn-default" type = "button">
                                                                تومان
                                                              </button>
                                                            </span>
                                                                <input name="mablagh_vam" type="text" class="form-control input-groupedame1">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/noe vam-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">

                                                        <label>مبلغ وام</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi6-->
                                        </div>
                                        <!--/noe vam mablagh-->


                                        <!--noe pardakht aghsat-->
                                        <div class="row">

                                            <!--makhfi6-->
                                            <div class="makhfi6" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe vam -->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <input name="tedad_aghsat_pardakht" type="text" class="form-control input-groupedame1" style="width:68% !important;">
                                                        </div>

                                                    </div>
                                                    <!--/noe vam-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">

                                                        <label>تعداد اقساط پرداخت شده</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi6-->
                                        </div>
                                        <!--/noe pardakht aghsat-->


                                        <!--noe pardakht aghsat-->
                                        <div class="row">
                                            <!--makhfi6-->
                                            <div class="makhfi6" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe vam -->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <input name="tedad_aghsat_monde" type="text" class="form-control input-groupedame1" style="width:68% !important;">
                                                        </div>

                                                    </div>
                                                    <!--/noe vam-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">

                                                        <label>تعداد اقساط باقیمانده</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi6-->
                                        </div>
                                        <!--/noe pardakht aghsat-->

                                        <!--noe vam-->
                                        <div class="row">
                                            <!--makhfi6-->
                                            <div class="makhfi6" style="display:none;">
                                                <!--col-md-9-->
                                                <div class="col-md-9 col-sm-9 col-xs-9">

                                                    <!--noe -->
                                                    <div class="noe">

                                                        <div class="form-group">
                                                            <input name="noe_vam" type="text" class="form-control input-groupedame1" style="width:68% !important;">
                                                        </div>

                                                    </div>
                                                    <!--/noe-->
                                                </div>
                                                <!--/col-md-9-->

                                                <!--col-md-3-->
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="moaveze">

                                                        <label>نوع وام</label>
                                                    </div>
                                                </div>
                                                <!--/col-md-3-->
                                            </div>
                                            <!--/makhfi6-->
                                        </div>
                                        <!--/noe vam-->

                                    </div>
                                    <!--/col-md-6-->

                                </div>
                                <!--/row_zaruri-->


                                <div class="etelat_box">
                                    <div class="etelaat">
                                        <h1>اطلاعات تکمیلی</h1>
                                    </div>
                                </div>


                                <div class="form-group line1"></div>

                                <!--row takmili-->
                                <div class="row">

                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <input name="sal_sakht" class="form-control" id="sal_sakht" type="text" style="width: 77% !important;">
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>سال ساخت</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->


                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <input name="tedad_tabaghat" class="form-control" id="tedad_tabaghat" type="text" style="width: 77% !important;">
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>تعداد طبقات این ملک</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <label><input id="pish_forosh1" type="radio" name="sanad" value="دارد">دارد</label>

                                                        <label><input id="pish_forosh2" type="radio" name="sanad" checked="checked" value="ندارد">ندارد</label>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>سند</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <label><input type="checkbox" name="service[]" value="ایرانی">ایرانی</label>

                                                        <label><input type="checkbox" name="service[]" value="فرنگی">فرنگی</label>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>سرویس بهداشتی</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->


                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <label><input type="checkbox" name="mogheiyat[]" value="شمالی">شمالی</label>
                                                        <label><input type="checkbox" name="mogheiyat[]" value="جنوبی">جنوبی</label>
                                                        <label><input type="checkbox" name="mogheiyat[]" value="غربی">غربی</label>
                                                        <label><input type="checkbox" name="mogheiyat[]" value="شرقی">شرقی</label>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>موقعیت</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->


                                    </div>
                                    <!--/col-md-6-->



                                    <!--col-md-6-->
                                    <div class="col-md-6">

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <select id="tedadkhab" name="tedad_khab" class="form-control" id="sel1">
                                                            <option>انتخاب کنید...</option>
                                                            <?php
                                                            $sql_tedadkhab = "select * from `tedad_khab`";
                                                            $data_tedadkhab = array();
                                                            $res_tedadkhab = $amlak->select($sql_tedadkhab,$data_tedadkhab);
                                                            foreach ($res_tedadkhab as $row_tedadkhab){
                                                                echo ' <option>'.$row_tedadkhab['tedad'].'</option>';
                                                            }

                                                            ?>

                                                         </select>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">
                                                    <span class="star">*</span>
                                                    <label>تعداد خواب</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <input name="tabaghe_melk" class="form-control textbox_width" id="tabaghe_melk" type="text">
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>طبقه این ملک</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->


                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <input name="tedad_vahed" class="form-control textbox_width" id="tedad_vahed" type="text">
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>تعداد واحد های موجود در این ساختمان</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <select name="kaf" class="form-control" id="sel1">
                                                            <option>کف مور نظر را انتخاب کنید</option>
                                                            <?php
                                                            $sql_kaf = "select * from `kaf`";
                                                            $data_kaf = array();
                                                            $res_kaf = $amlak->select($sql_kaf,$data_kaf);
                                                            foreach ($res_kaf as $row_kaf){
                                                                echo ' <option>'.$row_kaf['name'].'</option>';
                                                            }

                                                            ?>
                                                         </select>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>کف</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                        <!--row-->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                <!--noe-->
                                                <div class="noe">

                                                    <div class="form-group">
                                                        <select name="nama" class="form-control" id="sel1">
                                                            <option>نمای مور نظر را انتخاب کنید</option>
                                                            <?php
                                                            $sql_nama = "select * from `nama`";
                                                            $data_nama = array();
                                                            $res_nama = $amlak->select($sql_nama,$data_nama);
                                                            foreach ($res_nama as $row_nama){
                                                                echo ' <option>'.$row_nama['name'].'</option>';
                                                            }

                                                            ?>


                                                         </select>
                                                    </div>

                                                </div>
                                                <!--/noe-->
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="moaveze">

                                                    <label>نما</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->

                                    </div>
                                    <!--/col-md-6-->

                                    <!--row emkanat-->
                                    <div class="row">

                                        <!--col-md-12-->
                                        <div class="col-md-12">

                                            <div class="emkanat">
                                                <label>امکانات</label>
                                            </div>

                                        </div>
                                        <!--/col-md-12-->

                                        <!--col-md-12 emkanat-->
                                        <div class="col-md-12">

                                            <div class="checkbox_list">
                                                <label><input type="checkbox" name="emkanat[]" value="انباری">انباری</label>
                                                <label><input type="checkbox" name="emkanat[]" value="آسانسور">آسانسور</label>
                                                <label><input type="checkbox" name="emkanat[]" value="آب">آب</label>
                                                <label><input type="checkbox" name="emkanat[]" value="برق">برق</label>
                                                <label><input type="checkbox" name="emkanat[]" value="گاز">گاز</label>
                                                <label><input type="checkbox" name="emkanat[]" value="درب ریموت">درب ریموت</label>
                                                <label><input type="checkbox" name="emkanat[]" value="بالکن ">بالکن</label>
                                                <label><input type="checkbox" name="emkanat[]" value="سونا">سونا</label>
                                                <label><input type="checkbox" name="emkanat[]" value="استخر">استخر</label>
                                                <label><input type="checkbox" name="emkanat[]" value="جکوزی">جکوزی</label>
                                                <label><input type="checkbox" name="emkanat[]" value="آشپزخونه اوپن">آشپزخونه اوپن</label>
                                                <label><input type="checkbox" name="emkanat[]" value="لابی">لابی</label>
                                                <label><input type="checkbox" name="emkanat[]" value="سالن اجتماعات">سالن اجتماعات</label>
                                                <label><input type="checkbox" name="emkanat[]" value="مستر روم">مستر روم</label>
                                                <label><input type="checkbox" name="emkanat[]" value="مبله">مبله</label>
                                                <label><input type="checkbox" name="emkanat[]" value="دزدگیر">دزدگیر</label>
                                                <label><input type="checkbox" name="emkanat[]" value="ورودی مجزا">ورودی مجزا</label>
                                                <label><input type="checkbox" name="emkanat[]" value="اعراق حریق">اعراق حریق</label>
                                                <label><input type="checkbox" name="emkanat[]" value="باربیکیو">باربیکیو</label>
                                                <label><input type="checkbox" name="emkanat[]" value="درب ضد سرقت">درب ضد سرقت</label>
                                            </div>

                                        </div>
                                        <!--/col-md-12 emkanat-->

                                        <!--col-md-12-->
                                        <div class="col-md-12">

                                            <div class="emkanat">
                                                <label>تهویه</label>
                                            </div>


                                        </div>
                                        <!--/col-md-12-->

                                        <!--col-md-12 tavie-->
                                        <div class="col-md-12">

                                            <div class="checkbox_list">
                                                <label><input type="checkbox" name="tahviye[]" value="کولر">کولر</label>
                                                <label><input type="checkbox" name="tahviye[]" value="شوفاژ">شوفاژ</label>
                                                <label><input type="checkbox" name="tahviye[]" value="فنکوئل">فنکوئل</label>
                                                <label><input type="checkbox" name="tahviye[]" value="چیلر">چیلر</label>
                                                <label><input type="checkbox" name="tahviye[]" value="پکیج">پکیج</label>
                                                <label><input type="checkbox" name="tahviye[]" value="اسپلیت">اسپلیت</label>
                                                <label><input type="checkbox" name="tahviye[]" value="هواساز">هواساز</label>
                                                <label><input type="checkbox" name="tahviye[]" value="گرمایش از کف">گرمایش از کف</label>
                                                <label><input type="checkbox" name="tahviye[]" value="کولر گازی">کولر گازی</label>
                                            </div>

                                        </div>
                                        <!--/col-md-12 tavie-->

                                    </div>
                                    <!--/row emkanat-->


                                </div>
                                <!--/row takmili-->

                                <!--row-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div id="tedad_khat" class="tedad_parking" style="display:none;">
                                            <label>تعداد خط تلفن</label>
                                            <div class="form-group">
                                                <input name="tedad_khat" class="form-control" id="tedad_khat" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!--box_akhar-->
                                        <div class="box_akhar">
                                            <div class="col-md-8">
                                                <div class="form-group" style="margin-top: 14px">
                                                    <label><input id="tel" type="radio" name="tel">دارد</label>

                                                    <label><input id="tel1" type="radio" name="tel" checked="checked">ندارد</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="label_parking">
                                                    <label>تلفن</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/box_akhar-->
                                    </div>

                                    <div class="col-md-3">
                                        <div id="tedad_parking" class="tedad_parking" style="display:none;">
                                            <label>تعداد پارکینگ</label>
                                            <div class="form-group">
                                                <input name="tedad_parking" class="form-control" id="tedad_parking" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <!--col-md-3-->
                                    <div class="col-md-3">

                                        <!--box_akhar-->
                                        <div class="box_akhar">
                                            <div class="col-md-8">
                                                <div class="form-group" style="margin-top: 14px">
                                                    <label><input id="parking" type="radio" name="parking">دارد</label>

                                                    <label><input id="parking1" type="radio" name="parking" checked="checked">ندارد</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="label_parking">
                                                    <label>پارکینگ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/box_akhar-->
                                    </div>
                                    <!--/col-md-3-->

                                </div>
                                <!--/row-->








                                <div class="etelat_box">
                                    <div class="etelaat">
                                        <h1>دیگر اطلاعات</h1>
                                    </div>
                                </div>


                                <div class="form-group line1"></div>
                                
                                <!--row mogheiyat-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mogheiyat">
                                            <div class="form-group">
                                                <label for="comment">موقعیت ملک</label>
                                                <textarea name="mogheiyat_tozih" class="form-control" rows="5" id="comment"></textarea>
                                            </div>
                                            <span class="tag">اطلاعاتی که ممکن است در یافتن ملک مفید باشد را در اینجا وارد کنید. مانند شماره منطقه ، نام محله، نام قدیمی خیابانها و نقاط معروف نزدیک ملک . لطفا از قرار دادن شماره تماس در این قسمت پرهیز کنید شماره تماس شما به طور خودکار در کنار ملک قرار خواهد گرفت.</span>
                                        </div>
                                    </div>
                                </div>
                                <!--/row mogheiyat-->
                                
                                   <!--row tozihat-->
                                   <div class="row">
                                    <div class="col-md-12">
                                        <div class="mogheiyat">
                                            <div class="form-group">
                                                <label for="comment">توضیحات تکمیلی و ویژگیهای خاص این ملک</label>
                                                <textarea name="tozihat_takmili" class="form-control" rows="5" id="comment"></textarea>
                                            </div>
                                            <span class="tag">ویژگی های خاص این ملک را در این جا وارد کنید. وارد کردن متن دلخواه شما و توضیحات درباره ملک شانس دیده شدن ملک شما را افزایش می دهد. مثلا اشاهر کنید که ملک در جای ساکت و کم صدایی قرار دارد، یا منطقه بسیار پر مشتری است و یا ملک بسیار خوش نقشه و اکازیون است و شماره تماس را در کادر مرتبط پایین صفحه وارد کنید. </span>
                                        </div>
                                    </div>
                                </div>
                                <!--/row tozihat-->
                                
                                <div class="etelat_box">
                                    <div class="etelaat">
                                        <h1>اضافه کردن تصویر</h1>
                                    </div>
                                </div>


                                <div class="form-group line1"></div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="photo">
                                               <span class="tag">نکته: ملکهای دارای تصویر ٬ در لیستهای سایت ٬ بالاتر از دیگر املاک قرار می گیرند اضافه کردن تصویر ضروری نیست،اما این کار تعداد دفعات مشاهده شدن ملک شما را افزایش می دهد. شما میتوانید تصاویر گرفته شده توسط دوربین یا موبایل را، پس از انتقال به کامپیوتر به صفحه ملک خود اضافه کنید. تصاویر باید این ملک را نشان دهند. لطفا از آپلود کردن تصاویر غیر مرتبط یا آرم و لوگو پرهیز کنید.</span>
                                            <div class="ax">
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <a id="sabt_zaruri" onclick="sabt_takmili()" class="btn btn-lg btn-primary pull-left">ثبت</a>


                            </form>
                            <!--/form-->

                        </div>
                        <!--/content-->

                    </div>
                    <!--/back-->






                </div>
                <!--/col-sm-12-->
            </div>
            <!--/row-->



        </div>
        <!--container-->




        <footer>
            <div class="footer">
                <p>اولین سایت من...</p>
            </div>

        </footer>


        <?php
        global $hooks;
        $hooks->do_action("wp_footer");

       // echo $_SESSION['noe'];
        echo $_SESSION['id'];

        ?>




        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/js.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <!--<script src="js/mdb.min.js"></script>-->
        <script src="../../js/jquery.slider.js"></script>
        <script src="../../js/select2.min.js"></script>
        <script src="../../js/chosen.jquery.js"></script>
        <script src="../../js/angular.min.js"></script>

        <script>
            //ostan name
            var test = "<?php echo $_SESSION['id'];?>";
            var osatn = "<?php echo $res_last[0]['ostan']; ?>";
            var shahr = "<?php echo $res_last[0]['shahr']; ?>";
            var address = "<?php echo $res_last[0]['edame_address']; ?>";
            //$('#address').val(address);


           //var ss= $("#test #ostan_tak").find('#'+test).prop("selected","selected");

            //noe melk for selected
            var ostan = '<?php echo $res_last[0]['ostan']; ?>';
            $("#ostan_tak option").filter(function() {
                //may want to use $.trim in here
                return $(this).text() == ostan;
            }).prop('selected', true);



            //address nahaie
            $('.adress_nahaie').text(osatn+'-'+shahr+'-'+address);

            var id = $('#ostan_tak option:selected').prop('id');
            search_city1(id);
            $('#ostan_tak').change(function () {
                var id = $('#ostan_tak option:selected').prop('id');
                search_city1(id);
                setTimeout(
                    function() {
                        $('#shar option').trigger('change.select2');
                    }, 100);

            });
           // $('#shar option').val(shahr).trigger('change');




            $('#shar option').filter(function() {
                //may want to use $.trim in here
                return $(this).text() == shahr;
            }).prop('selected', true);


        /*    setTimeout(
                function() {
            $('#shar option').filter(function() {

                //may want to use $.trim in here
                return $(this).text() == shahr;
            }).prop('selected', true);
                   // $('.select1').trigger('change.select2');
                    //$('#shar option').text(shahr).trigger("change");
                }, 100);*/












            //noe melk for selected
            var noe = '<?php echo $res_last[0]['noe_melk']; ?>';
            $("#noe_melk option").filter(function() {
                //may want to use $.trim in here
                return $(this).text() == noe;
            }).prop('selected', true);



            var masahat = '<?php echo $res_last[0]['masahat']; ?>';
            $('#masahat').val(masahat);

            var rahn = "<?php if(isset($_SESSION['rahn'])) {echo $_SESSION['rahn'];} ?>";
            $('#rahn').val(rahn);

            var ejare = "<?php if(isset($_SESSION['ejare'])) {echo $_SESSION['ejare'];} ?>";
            $('#ejare').val(ejare);

            var tedad = "<?php echo $res_last[0]['tedad_khab']; ?>";
            $('#tedadkhab').val(tedad);

            var gheymat = "<?php echo $res_last[0]['gheymat']; ?>";
            $('#gheymat').val(gheymat);






            var op1 = "<?php echo $_SESSION['op1']; ?>";
            $("#noe option").filter(function() {

                //may want to use $.trim in here
                return $(this).val() == op1;
            }).prop('selected', true);

            $("#noe option").each(function(){
                if ($(this).val() == op1)
                    $(this).attr("selected","selected");

            });



            var test_option = $('#noe option:selected').text();
            if (test_option == "رهن و اجاره"){
                $('.makhfi1').css('display', 'block');
                $('.makhfi4').css('display', 'none');
            }

            //mantaghe
           /* function function_text(){
                var x = document.getElementById("mantaghe").value;
                //alert(x);
                document.getElementById("adress_nahaie").innerHTML = name + x;
            }*/

        </script>


    </body>


    </html>
