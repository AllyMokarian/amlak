<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <title>سایت خبری</title>
    <!--load css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="css/mdb.min.css">-->
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chosen.min.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCf8nJBW8VgIw7gKIxbQKNLm0WGNQ5p3MU&v=3.exp&libraries=places"></script>
    



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

                                           <img src="../../captcha/captcha.php"/>
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
			<div class="back">
				
				<div class="title">
					<h3>ثبت نام</h3>
					<a href="#"><span>درصورتی که حساب کاربری دارید برا ورود اینجا کیلک کنید</span></a>
				</div>
				
				<!--col7-->
				<div class="col-md-7">
					
					<!--text-left-->
					<div class="left_box">
						<h1>شما فقط یک قدم با عضویت در مشاور و استفاده از امکانات بی نظیر اون فاصله دارید!</h1>
						<hr>
						
						<!--text-->
						<div class="text">
							<ul>
								<li><i class="fa fa-heart slow4"></i> املاک مورد نظرتون را به علاقه مندیهاتون اضافه کنید</li>
								<li><i class="fa fa-search slow4"></i> جستجوهاتون را ذخیره کنید</li>
								<li><i class="fa fa-envelope-o slow4"></i> از جدیدترین املاک اضافه شده در ایمیل و پیامک مطلع شوید</li>
								<li><i class="fa fa-file-text-o slow4"></i>برای املاک یادداشت شخصی بگذارید</li>
							</ul>
						</div>
						<!--/text-->
						
						<div class="makhfi">
						
							<ul>
								<li><i class="fa fa-building-o slow4"></i><p>با تکمیل فرم و وارد کردن اطلاعات مورد نظر به جمع چهار هزار نفری مشاوران املاک عضو در سایت مشاور بپیوندید، و از امکانات منحصر به فرد سایت استفاده کنید! </p></li>
								<li><i class="fa fa-home slow4"></i>امکان ثبت نامحدود ملک</li>
								<li><i class="fa fa-bar-chart slow4"></i>نمایش املاک برای ده ها هزار بازدید کننده روزانه سایت</li>
								<li><i class="fa fa-globe slow4"></i>آدرس اختصاصی</li>
								<li><i class="fa fa-picture-o slow4"></i>امکان اضافه کردن تصویر و موقعیت</li>
								<li><i class="fa fa-question slow4"></i>آپشتیبانی حرفه ای</li>
							</ul>
						
						</div>
						
						<p>فقط بخشی از امکاناتی که به عضویت در مشاور، به صورت رایگان دریافت می کنید! </p>
					</div>
					<!--/text-left-->
				</div>
				<!--/col7-->
				
				<!--col5-->
				<div class="col-md-5">
					<!--box-sabt-->
					<div class="box-sabt">
						
						<div id="error_register" class="alert alert-success" style="display: none;">
						  <strong></strong> 
						</div>
						
						
						<form id="sendForm1">
						
						<div class="text-box">
							<label>نام</label>
							<span class="star">*</span>
							<br>
							<input type="text" name="username" placeholder="نام...">
						</div>
						
						<div class="text-box">
							<label>نام خانوادگی</label>
							<span class="star">*</span>
							<br>
							<input type="text" name="family" placeholder="نام خانوادگی...">
						</div>
						
						<div class="text-box">
							<label>موبایل</label>
							<span class="star">*</span>
							<br>
							<input type="text" name="tel" placeholder="تلفن همراه...">
							<br>
							
							<span class="example">مثال:09395567608</span>
							
						</div>
						
						<div class="text-box">
							<label>پست الکترونیک</label>
							
							<br>
							<input type="text" name="email" placeholder="ایمیل...">
							<br>
							
							<span class="example">مثال:abbassmortazavi@gmail.com</span>
							
						</div>
						
						<div class="text-box">
							<label>کلمه عبور</label>
							<span class="star">*</span>
							<br>
							<input type="text" name="password" placeholder="پس ورد را وارد کنید...">
						</div>
						
						
						<div class="text-box">
							
							<span class="checked"><input type="checkbox" name="check" value="1"></span>
							<label>مشاور املاک هستم </label>
							
						</div>
						
						<!--makhfi-->
						<div class="makhfi" style="display:none;">
							
							<div class="text-box">
								<label>نام آژانس املاک</label>
								<span class="star">*</span>
								<br>
								<input type="text" name="amlak_name" placeholder="نام آژانس املاک...">
							</div>
							
							
							<div class="text-box">
								<label>شماره تلفن اصلی املاک</label>
								<span class="star">*</span>
								<br>
								<input type="text" name="tel_amlak" placeholder="شماره تلفن را وارد کنید...">
								<br>
								<span class="example">لطفا شماره تماس را با کد شهر وارد کنید.برای مثال :011323450000 از این شماره برای کد کاربری شما استفاده خواهد شد.</span>
							</div>
							
							
							<div class="text-box">
								<label>موقعیت</label>
								<span class="star">*</span>
								<br>
									<input id="search_address" type="text" name="search_address" placeholder="ادرس را وارد کنید...">
								<br>
								
							</div>
						
						</div>
						<!--/makhfi-->
						
						<!--<input type="submit" name="send" id="send" class="btn btn-primary" value="ارسال">-->
						<a onclick="sendForm1();" class="btn btn-default" id="ersal">ثبت نام</a>
						</form>
					</div>
					<!--/box-sabt-->
				
				</div>
				<!--/col5-->
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






    <script src="js/jquery.min.js"></script>
    <script src="js/js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/mdb.min.js"></script>-->
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/chosen.jquery.js"></script>

	
</body>
<script>


</script>

</html>
