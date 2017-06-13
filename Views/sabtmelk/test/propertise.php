<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <title>سایت خبری</title>
    <!--load css-->
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
   




</head>

<body>
    <!--container-fluid-->
    <div class="container-fluid bg_menu">
        <!--row-menu-->
        <div class="row">
            <div class="col-md-4">
                <div class="login">

                    <!-- Trigger the modal with a button -->
                    
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">ورود به سایت</button>

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

                                            <img src="../../../captcha/captcha.php" />
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


        <div class="row">
            <!--back-->
            <div class="container" style="background: #fff">
                <!--row-->
                <div class="row">
                    <!--col9-->
                    <div class="col-md-9">

                        <h1 class="header">املاک من</h1>
                        <!--row-->
                        <div class="row">
                            <!--col-md-12-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!--nav_head-->
                                <div class="nav_head pull-left">

                                    <ul>
                                        <li class="hover"><a href="#">همه املاک</a></li>
                                        <li class="hover"><a href="#">املاک بایگانی شده</a></li>
                                        <li class="active_amlak"><a class="white" href="#">املاک فعال</a></li>
                                    </ul>

                                </div>
                                <!--nav_head-->

                            </div>
                            <!--/col-md-12-->
                        </div>
                        <!--/row-->

                        <!--line0-->
                        <div class="line0"></div>
                        <!--/line0-->

                        <!--row-->
                        <div class="row">

                            <!--col-md-6-->
                            <div class="col-md-6">

                                <!--left-->
                                <div class="left pull-left">

                                    <a id="x" class="btn btn-default btn-sm" href="#"><i class="fa fa-print"></i>چاپ</a>
                                    <a id="update_fast" class="btn btn-success btn-sm" href="#" disabled="disabled">بروز رسانی سریع املاک انتخاب شده</a>

                                </div>
                                <!--/left-->

                            </div>
                            <!--/col-md-6-->

                            <!--col-md-6-->
                            <div class="col-md-6">
                                <!--right-->
                                <div class="right pull-right">
                                    <a class="all">انتخاب همه</a>
                                    <a class="not_all">عدم انتخاب همه</a>
                                </div>
                                <!--/right-->
                            </div>
                            <!--/col-md-6-->
                        </div>
                        <!--/row-->

                        <!--line0-->
                        <div class="line0"></div>
                        <!--/line0-->

                        <!--row-->
                        <div class="row">

                            <!--col-md-3-->
                            <div class="col-sm-3 col-md-3 col-xs-3">

                                <div class="namayesh">
                                    <label class="namayesh_label" for="sel1">نمایش:</label>
                                    <select class="form-control namayesh" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                    <label class="mored" for="sel1">مورد</label>
                                </div>
                            </div>
                            <!--/col-md-3-->




                            <!--col-md-3-->
                            <div class="col-sm-3 col-md-3 col-xs-3">
                                <!--search_tbl-->
                                <div class="search_tbl">
                                    <label for="usr">جستجو:</label>
                                    <input type="text" class="form-control" id="usr">
                                </div>
                                <!--/search_tbl-->

                            </div>
                            <!--/col-md-3-->



                            <!--col-md-6-->
                            <div class="col-sm-6">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                            <!--col-md-4-->
                        </div>
                        <!--/row-->


                        <!--table-->
                        <div class="row">


                            <div class="col-md-12">

                                <div class="panel panel-default panel-table">

                                    <div class="panel-body">
                                        <table class="table table-striped table-list">
                                            <thead>
                                                <tr>
                                                    <th>شماره سریال درسایت</th>
                                                    <th>عنوان</th>
                                                    <th class="hidden-xs">مساحت</th>
                                                    <th>اضافه شده در</th>
                                                    <th>آخرین بروز رسانی</th>
                                                    <th><em class="fa fa-cog" style="text-align: center;
display: block;"></em></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="check" type="checkbox" style="float: right;"> 1

                                                    </td>
                                                    <td>ملک1</td>
                                                    <td>1000</td>
                                                    <td>امسال</td>
                                                    <td>چند ثانیه پیش</td>
                                                    <td align="center" class="fast_update_toggle">
                                                        <div class="makhfi_test" style="display: none;">
                                                        <!--makhfi_update-->
                                                        <div class="makhfi_update">

                                                            <form action="#" method="post">
                                                            <p>بروز رسانی سریع خانه و حیاط 12000 متری فروشی</p>
                                                            <div class="input-group">
                                                                <span id="propertise_addon" class="input-group-addon">قیمت هرمتر مربع</span>
                                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                                <span id="propertise_addon1" class="input-group-addon">تومان</span>
                                                            </div>


                                                            <div class="input-group">
                                                                <span id="propertise_addon" class="input-group-addon">قیمت کل</span>

                                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                                <span id="propertise_addon1" class="input-group-addon">تومان</span>
                                                            </div>
                                                                <input type="submit" class="btn btn-sm btn-success" value="به روز رسانی">
                                                                <a class="laghv" class="btn btn-danger btn-sm cancel-quick-edit-btn">لغو</a>
                                                            </form>
                                                        </div>
                                                        </div>
                                                        <!--/makhfi_update-->

                                                        <div class="setting">
                                                            <a class="btn btn-default update_btn"><em class="fa fa-pencil-square-o"></em>یه روز رسانی سریع</a>
                                                            <a class="btn btn-default"><em class="fa fa-pencil"></em>ویرایش</a>
                                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete"><em class="fa fa-trash"></em>حذف</a>

                                                            <!-- Modal -->
                                                            <div id="delete" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title pull-right">حذف آگهی فروشی </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Some text in the modal.</p>
                                                                            <div class="box_radio">
                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                        <span>فروش/اجاره رفت</span>

                                                                                    </label>
                                                                                </div>

                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                    <span>معاوضه شد</span>

                                                                                    </label>
                                                                                </div>

                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                    <span>منصرف شدم</span>

                                                                                    </label>
                                                                                </div>


                                                                                 <div class="radio">
                                                                                    <label><input id="reson" class="test" type="radio" name="optradio" value="1">
                                                                                    <span>ویا</span>
                                                                                    <input class="ya" type="text" class="form-control" id="usr" disabled="disabled">

                                                                                    </label>
                                                                                </div>

                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">انصراف</button>

                                                                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">حذف</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!--/modal-->
                                                        </div>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <input class="check" type="checkbox" style="float: right;"> 1

                                                    </td>
                                                    <td>ملک1</td>
                                                    <td>1000</td>
                                                    <td>امسال</td>
                                                    <td>چند ثانیه پیش</td>
                                                    <td align="center" class="fast_update_toggle">
                                                        <div class="makhfi_test" style="display: none;">
                                                            <!--makhfi_update-->
                                                            <div class="makhfi_update">

                                                                <form action="#" method="post">
                                                                    <p>بروز رسانی سریع خانه و حیاط 12000 متری فروشی</p>
                                                                    <div class="input-group">
                                                                        <span id="propertise_addon" class="input-group-addon">قیمت هرمتر مربع</span>
                                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                                        <span id="propertise_addon1" class="input-group-addon">تومان</span>
                                                                    </div>


                                                                    <div class="input-group">
                                                                        <span id="propertise_addon" class="input-group-addon">قیمت کل</span>

                                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                                        <span id="propertise_addon1" class="input-group-addon">تومان</span>
                                                                    </div>
                                                                    <input type="submit" class="btn btn-sm btn-success" value="به روز رسانی">
                                                                    <a class="laghv" class="btn btn-danger btn-sm cancel-quick-edit-btn">لغو</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--/makhfi_update-->

                                                        <div class="setting">
                                                            <a class="btn btn-default update_btn"><em class="fa fa-pencil-square-o"></em>یه روز رسانی سریع</a>
                                                            <a class="btn btn-default"><em class="fa fa-pencil"></em>ویرایش</a>
                                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete"><em class="fa fa-trash"></em>حذف</a>

                                                            <!-- Modal -->
                                                            <div id="delete" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title pull-right">حذف آگهی فروشی </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Some text in the modal.</p>
                                                                            <div class="box_radio">
                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                        <span>فروش/اجاره رفت</span>

                                                                                    </label>
                                                                                </div>

                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                        <span>معاوضه شد</span>

                                                                                    </label>
                                                                                </div>

                                                                                <div class="radio">
                                                                                    <label><input class="test" type="radio" name="optradio" value="2">
                                                                                        <span>منصرف شدم</span>

                                                                                    </label>
                                                                                </div>


                                                                                <div class="radio">
                                                                                    <label><input id="reson" class="test" type="radio" name="optradio" value="1">
                                                                                        <span>ویا</span>
                                                                                        <input class="ya" type="text" class="form-control" id="usr" disabled="disabled">

                                                                                    </label>
                                                                                </div>

                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">انصراف</button>

                                                                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">حذف</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!--/modal-->
                                                        </div>

                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col col-xs-4">صفحه 1 از 5
                                            </div>
                                            <div class="col col-xs-8">
                                                <ul class="pagination hidden-xs pull-right">
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                </ul>
                                                <ul class="pagination visible-xs pull-right">
                                                    <li><a href="#">«</a></li>
                                                    <li><a href="#">»</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/table-->










                    </div>
                    <!--/col9-->




                    <!--col3-->
                    <div class="col-md-3">


                        <!--user-->
                        <div class="user">
                            <div class="user_top">
                                <span class="user_img">
                                      <img class="img-responsive" src="../../../img/1.jpg">
                                    </span>

                                <span class="user_name">نام کاربری</span>
                                <span class="user_edit"><a href="#"><i class="fa fa-chevron-left"></i>ویرایش حساب کاربری</a></span>
                                <span class="user_etebar">اعتبار:<span>0</span></span>

                            </div>

                            <div class="right_nav">
                                <ul>
                                    <li><a href="#"><i class="fa fa-dashboard"></i>اطلاعات کلی</a></li>
                                    <li><a href="#"><i class="fa fa-home"></i>خانه</a></li>
                                    <li><a href="#"><i class="fa fa-star"></i>املاک مورد علاقه من</a></li>
                                    <li><a href="#"><i class="fa fa-ban"></i>املاک مخفی شده در جستجو</a></li>
                                    <li><a href="#"><i class="fa fa-file-o"></i>یادداشت های من</a></li>
                                    <li><a href="#"><i class="fa fa-users"></i>مخاطبین من</a></li>
                                    <li><a href="#"><i class="fa fa-search"></i>جستجو های ذخیره شده</a></li>
                                    <li><a href="#"><i class="fa fa-money"></i>اعتبار حساب</a></li>
                                    <li><a href="#"><i class="fa fa-file-text-o"></i>صورت حساب</a></li>

                                </ul>
                            </div>


                            <!--nav_right-->



                            <!--/nav_right-->


                        </div>
                        <!--/user-->



                    </div>
                    <!--/col3-->
                </div>
                <!--row-->


            </div>
            <!--/back-->
        </div>

    </div>
    <!--container-->




    <footer>
        <div class="footer">
            <p>اولین سایت من...</p>
        </div>

    </footer>






    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/js.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>


</body>
<script>

    //modal delete
    $('.test').change(function () {
        var txt_val = $(this).val();
        if(txt_val == 1){
            $('.ya').prop('disabled',false);
        }else {
            //txt_val == 2;
            $('.ya').prop('disabled',true);
        }

    });

    //menu right
    $('.right_nav ul li').click(function () {
        $(this).addClass('active_menu').siblings().removeClass('active_menu');
    });


    //update tbl
    $('.update_btn').click(function () {
        $(this).parents('.fast_update_toggle').find('.setting').toggle();
        $(this).parents('.fast_update_toggle').find('.makhfi_test').toggle();
    });

    //laghv
    $('.laghv').click(function () {
        $(this).parents('.fast_update_toggle').find('.setting').toggle();
        $(this).parents('.fast_update_toggle').find('.makhfi_test').toggle();
    });

    //all
    $('.all').click(function () {
        $( ".check" ).prop( "checked", true );
        //$('#update_fast').prop("disabled",true);
        $('#update_fast').removeAttr('disabled');
    });

    //not_all
    $('.not_all').click(function () {
        $( ".check" ).prop( "checked", false );
        $('#update_fast').attr('disabled',true);
    });
</script>

</html>
