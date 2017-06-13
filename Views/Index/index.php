<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="utf-8">
    <title>سایت املاک</title>
    <!--load css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="css/mdb.min.css">-->
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <!--<link rel="stylesheet" href="css/mdb.min.css">-->

    <?php
    if(isset($_GET['exit'])){
        $user = new user();
        $user->logout_user();

    }

  /*  if(isset($_SESSION['name']) && $_SESSION['name'] != ""){
        echo $_SESSION['name'];
    }*/

// session_destroy();

    ?>

</head>

<body>
    <!--container-fluid-->
    <div class="container-fluid bg_menu">
        <!--row-menu-->
        <div class="row">
            <div class="col-md-4">
				<div class="row">
					<div class="col-md-4">
								
						<!--login-->
						<div class="login">

                            <?php
                            if (!isset($_SESSION['name']) and !isset($_COOKIE['rand_email']) and !isset($_COOKIE['rand_pass'])){
                               echo ' <button type="button" class="btn btn-success btn-lg" id="login">ورود به سایت</button>';
                            }
                            ?>
							<!-- Trigger the modal with a button -->


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

												   <img src="include/captcha.php"/>
												</div>

												<div class="checkbox">
													<label>یاداوری<input type="checkbox" value="" checked></label>
												</div>
												<a onclick="sendForm();" class="btn btn-default btn-success btn-block" id="send"><span><i class="fa fa-key"></i></span>ورود</a>
											</form>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-danger pull-left" data-dismiss="modal"><span><i class="fa fa-close"></i></span>خروج</button>
											<p>عضو نیستید؟<a href="../register/register.php">ثبت نام</a></p>
											<p>آیا رمز خود را فراموش کردید؟ <a href="#">بازیابی پس ورد</a></p>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!--/login-->
					
					</div>
					<div class="col-md-4">

                        <!--panel-->
                        <?php
                        $user = new user();
                        $option = new option();

                        if ($user->is_user() or isset($_COOKIE['rand_email'])){
                            echo '
                            
                                   <div class="panel_login">
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">
                                            <i class="fa fa-user"></i>';

                                                $x = $user->is_user();
                                                if(isset($x) or isset($_COOKIE['rand_email'])){
                                                    if($x){
                                                        echo $_SESSION['name'];
                                                    }else{
                                                        echo $_COOKIE['rand_email'];
                                                    }

                                                }

                                           
                                       echo ' </button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">املاک من</a>
                                            <a href="#">جستجو ها</a>
                                            <a href="#">املاک همه</a>
                                            <a class="exit" href='.$option->get_option('url').'?exit=yes>خروج</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/panel-->
                            ';
                        }else{
                            echo '
                            
                            <div class="register">';


					    echo '
								<a class="btn btn-success btn-lg" href="register">ثبت نام کنید</a>';



						echo '</div>
                            
                            ';
                        }
                        ?>

					
					</div>
					
					<div class="col-md-4"></div>
					
				</div>
				

			
				
            </div>
			

            <div class="col-md-8">

                <span class="h" onclick="openNav()"><i class="fa  fa-bars"></i>فهرست</span>
                <div class="menu">
                    <ul>
                        <li><a href="#">درباره ما</a></li>
                        <li><a class="btn btn-success" href="sabtmelk">سپردن ملک رایگان</a></li>
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

    <!--search-->
    <div class="container-fluid pic">
        <div class="row">
            <div class="col-md-3">
              

            </div>
			
			<div class="col-md-6">
                <!--search-->
                <div class="search">
                    <div class="search-right">
                        <h1>پنل جستجو...</h1>

                        <ul class="tabs">
                            <li class="tab-link current" data-tab="tab-1">خرید و فروش</li>
                            <li class="tab-link" data-tab="tab-2">رهن و اجاره</li>

                        </ul>

                        <div id="tab-1" class="tab-content current">
							<!--row-->
                            <div class="row">
								<div class="col-md-4">
									<div class="text-box">
										  <label>منطقه :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
								
								
								<div class="col-md-4">
									<div class="text-box">
										  <label>شهر :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="text-box">
										  <label>استان :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
							
							</div>
							<!--/row-->
							
							<div class="row">
								<div class="col-md-3">
									<div class="text-box">
										<label>حداکثر قیمت :</label>
										<select>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="text-box">
										<label>حداقل قیمت :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>	
								
								<div class="col-md-3">
									<div class="text-box">
										<label>تعداد خواب :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="text-box">
										<label>نوع ملک :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
								
							</div>
					  
                        </div>
						
                        <div id="tab-2" class="tab-content">
										<!--row-->
                            <div class="row">
								<div class="col-md-4">
									<div class="text-box">
										  <label>منطقه :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
								
								
								<div class="col-md-4">
									<div class="text-box">
										  <label>شهر :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="text-box">
										  <label>استان :</label>
										  <select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
										  </select>
									</div>
								</div>
							
							</div>
							<!--/row-->
							
							<!--row-->
							<div class="row">
								<div class="col-md-3">
									<div class="text-box">
										<label>حداکثر اجاره :</label>
										<select>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										  <option>بابل</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="text-box">
										<label>حداقل اجاره :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>	
								
								<div class="col-md-3">
									<div class="text-box">
										<label>تعداد خواب :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="text-box">
										<label>نوع ملک :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
							</div>
							<!--/row-->
							
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<div class="text-box">
										<label>حداقل رهن :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="text-box">
										<label>حداکثر رهن :</label>
											<select>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											  <option>بابل</option>
											</select>
									</div>
								</div>
								
								
								
							</div>
							
                        </div>


                        <button class="btn btn-info">جستجو</button>

                    </div>
                    <!--/search-right-->

                </div>
                <!--/search-->

            </div>
			
			<div class="col-md-3">
              

            </div>
			
			
        </div>
    </div>
    <!--/container-->

    <!--container tabligh-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!--tabligh ax-->
                <div class="tabligh-banneri">
                   <h3>تبلیغات</h3>
                    <div class="tabligh-pic">
                        <div class="shadow">
                            <a href="#"><img class="img-responsive slow8" src="img/m1.jpg"></a>
                        </div>
                    </div>

                    <div class="tabligh-pic">
                        <div class="shadow">
                            <a href="#"><img class="img-responsive slow8" src="img/m2.jpg"></a>
                        </div>
                    </div>

                    <div class="tabligh-pic">
                        <div class="shadow">
                            <a href="#"><img class="img-responsive slow8" src="img/m3.jpg"></a>
                        </div>
                    </div>

                    <div class="tabligh-pic">
                        <div class="shadow">
                            <a href="#"><img class="img-responsive slow8" src="img/m4.jpg"></a>
                        </div>
                    </div>

                </div>
                <!--/tabligh ax-->

            </div>
            <!--col6-->
            <div class="col-md-6">
                <!--slider-->
                <div class="slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <img src="img/m1.jpg">
                                <div class="carousel-caption">
                                    <h3>عنوان</h3>
                                    <br>
                                    <span>تبلیغات ملک شما</span>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <img src="img/m2.jpg">
                                <div class="carousel-caption">
                                    <h3>عنوان</h3>
                                    <br>
                                    <span>تبلیغات ملک شما</span>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <img src="img/m3.jpg">
                                <div class="carousel-caption">
                                    <h3>عنوان</h3>
                                    <br>
                                    <span>تبلیغات ملک شما</span>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <img src="img/m4.jpg">
                                <div class="carousel-caption">
                                    <h3>عنوان</h3>
                                    <br>
                                    <span>تبلیغات ملک شما</span>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <img src="img/m5.jpg">
                                <div class="carousel-caption">
                                    <h3>عنوان</h3>
                                    <br>
                                    <span>تبلیغات ملک شما</span>
                                </div>
                            </div>
                            <!-- End Item -->
                        </div>
                        <!-- End Carousel Inner -->


                        <ul class="nav nav-pills nav-justified">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">ملک1</a></li>
                            <li data-target="#myCarousel" data-slide-to="1"><a href="#">ملک 2</a></li>
                            <li data-target="#myCarousel" data-slide-to="2"><a href="#">ملک 3</a></li>
                            <li data-target="#myCarousel" data-slide-to="3"><a href="#">ملک4 </a></li>
                            <li data-target="#myCarousel" data-slide-to="4"><a href="#">ملک 5 </a></li>
                        </ul>


                    </div>
                    <!-- End Carousel -->
                </div>
                <!--/slider-->
            </div>
            <!--end col6-->
        </div>
    </div>
    <!--/container tabligh-->

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="vije">
                    <a href="#">
                        <h3>قبل از همه باخبر شوید</h3>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>با عضویت در مشاور به محض اضافه شدن ملک مورد نظرتان مطلع شوید</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="add-melk">
                    <a href="#">
                        <h3>قبل از همه باخبر شوید</h3>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <p>با عضویت در مشاور به محض اضافه شدن ملک مورد نظرتان مطلع شوید</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="etela">
                    <a href="#">
                        <h3>قبل از همه باخبر شوید</h3>
                        <i class="fa fa-bell" aria-hidden="true"></i>

                        <p>با عضویت در مشاور به محض اضافه شدن ملک مورد نظرتان مطلع شوید</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="akharin-melk">
                    <!--slider3-->
                    <div class="slider-melk">
                        <span class="title">آخرین ملک های ثبت شده</span>
                        


                        <!--content-slider-->
                        <div class="content-slider">

                            <ul>
                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m1.jpg"></a><br>
                                    <span class="title-pic">ملک اول</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                    <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>

                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m2.jpg"></a><br>
                                    <span class="title-pic">ملک دوم</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                    <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>

                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m3.jpg"></a><br>
                                    <span class="title-pic"> ملک سوم</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                    <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>

                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m4.jpg"></a><br>
                                    <span class="title-pic">ملک 4</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                   <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>

                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m5.jpg"></a><br>
                                    <span class="title-pic">ملک 5</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                    <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>

                                <li>
                                    <a href="#"><img class="img-responsive" src="img/m5.jpg"></a><br>
                                    <span class="title-pic">ملک 6</span><br>
                                    <span class="price-asli">قیمت </span><br>
                                    <!--<span class="price-takhfif">قیمت تخفیف</span><br>-->
                                </li>


                            </ul>


                        </div>
                        <!--/content-slider-->

                        <!--control-->
                        <span class="makhfi-left"><i class="fa fa-chevron-left slow4" area-hidden="true"></i></span>
                        <span class="makhfi-right"><i class="fa fa-chevron-right slow4" area-hidden="true"></i></span>
                        <!--/control-->

                    </div>
                    <!--/slider3-->
                </div>
            </div>
        </div>
    </div>
    <!--/container-->
    <footer>
        <div class="container-fluid bg-footer">

            <div class="row">
                <div class="col-md-12">
                    <div class="footer">
                        <p class="wow headShake">اولین سایت من...</p>
                    </div>


                </div>
            </div>

        </div>
    </footer>






    <script src="js/jquery.min.js"></script>
    <script src="js/js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/mdb.min.js"></script>-->
    <script src="../../js/bootstrap-select.min.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.min.js"></script>
   <!-- <script src="js/mdb.min.js"></script>-->
</body>
<script>


</script>

</html>
