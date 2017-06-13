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
    <link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/chosen.min.css">
    
        <?php
        //$hooks = new Hooks();
   

        if(isset($_SESSION['name'])){
            echo $_SESSION['email'];
        }

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
                    <button type="button" class="btn btn-success btn-lg" id="login">ورود به سایت</button>

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

                                           <img src="captcha/captcha.php"/>
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
		
		<!--back-->
		<form  id="sabt_melk">
		<span id="err_melk"></span>
		<div class="back">
		<div class="row">
			
				<!--col-md-8-->
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-4">
							
							<div class="box_select">
								 <select class="select" title="منطقه">
						
								</select>
							</div>
						</div>
						
						<div class="col-sm-4">
							
							<div id="box_select" class="box_select" style="margin-top: 10px;">
								<select name="shahr" id="shahr" class="select" title="شهر" placeholder="شهرستان" value="شهرستان">
								 
							
								  
								</select>


							</div>
						</div>
						
						<div class="col-sm-4">
							
							<div class="box_select">
								<select name="ostan" id="ostan" class="select" title="استان">
								<?php
								$amlak = new amlak();
								
								 $sql = "SELECT * FROM `province`";
								 $data = array();
								 $res = $amlak->select($sql,$data);
								 foreach ($res as $ostan){
									 echo '<option data-id="'.$ostan['id'].'" value="'.$ostan['name'].'">'.$ostan['name'].'</option>';

								 }
								 //print_r($res);

								?>
								</select>
							</div>
						</div>
					</div>
					
					<!--row-->
					<div class="row">
						<div class="col-md-12">
							<!-- edame_address -->
							<div class="edame_address">
								 <div class = "input-group">
									   <span id="add" class = "input-group-btn">
										  <button class = "btn btn-default btn-me" type = "button">
											ادامه ادرس:
										  </button>
									   </span>
									   <input name="edame_address" type = "text" class = "form-control input input-groupedame">
								</div>
								<!-- /edame_address -->
							</div>
						</div>
					</div>
					<!--/row-->
					<hr style="with:90%;">
					<!--row-->
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="s">
								 <div class="form-group">
								  <select name="tedad_khab" class="form-control arz" id="sel1">
                                      <?php
                                      $sqlkhab = "select * from `tedad_khab`";
                                      $datakhab = array();
                                      $reskhab = $amlak->select($sqlkhab,$datakhab);
                                      foreach ($reskhab as $tedad_khab){
                                          echo '<option>'.$tedad_khab['tedad'].'</option>';
                                      }
                                      ?>


								  </select>
								</div>

							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="metr">
								 <div class = "input-group">
									   <span class = "input-group-btn" style="float: left !important;">
										  <button class = "btn btn-default" type = "button">
											متراژ
										  </button>
									   </span>
									   <input id="number" name="masahat" type = "text" class = "form-control input-groupedame1" onchange="this.value = numFormat(this.value)" onkeyup="this.blur();this.focus()">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="s">
							 <div class="form-group">
							  <select name="noe_melk" class="form-control arz" id="sel1">
                                  <?php
                                  $sql = "select * from `noe_melk`";
                                  $data = array();
                                  $res = $amlak->select($sql,$data);
                                  foreach ($res as $noe){
                                      echo '<option>'.$noe['name'].'</option>';
                                  }
                                  ?>


							  </select>
							</div>
							</div>
						</div>
					</div>
					<!--/row-->
					
					<!--row-->
					<div class="row">
						<div class="col-md-12">
							<div class="textarea">
								<div class="form-group">
								  <textarea name="tozih" class="form-control" rows="5" id="comment" placeholder="توضیحات تکمیلی از ملک خود را بنویسید..."></textarea>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<hr>
					<div class="row">
						<!--kharid-->
						<div class="col-md-8">
							<!--kharid_forosh-->
							<div id="forosh">
								  <select name="gheymat_kharid" class="form-control select_rahn" id="sel1">
									<option>قیمت هرمتر مربع</option>
									<option>قیمت کل</option>
								  </select>
								
								<div class = "input-group" style="width: 34% !important;">
									   <span class = "input-group-btn" style="float: left !important;">
										  <button class = "btn btn-default" type = "button">
											تومان
										  </button>
									   </span>
									   <input id="number1" name="gheymat" type = "text" class = "form-control input-groupedame1" onchange="this.value = numFormat(this.value)" onkeyup="this.blur();this.focus()">
								</div>
							</div>
							<!--/kharid_forosh-->
							
							<div class="row">
								<div class="col-md-6">
								<div class="rahn" style="display: none;">
									<div class = "input-group" style="margin-top: 5px;">
									   <span class = "input-group-btn" style="float: left !important;">
										  <button class = "btn btn-default" type = "button">
											تومان
										  </button>
									   </span>
										<input name="rahn" type = "text" class = "form-control input-groupedame1" placeholder="رهن">
									</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="rahn" style="display: none;">
										<div class = "input-group" style="margin-top: 5px;">
											<span class = "input-group-btn" style="float: left !important;">
											  <button class = "btn btn-default" type = "button">
												تومان
											  </button>
											</span>
											<input name="ejare" type = "text" class = "form-control input-groupedame1" placeholder="اجاره">
										</div>
									</div>
								
								</div>
								
							</div>
							
						</div>
						<!--/kharid-->
						
						<div class="col-md-4">
							<div class="radio" style="margin-right: 74px;">
							  <label><input id="radio1" type="radio" name="op1" class="radio" value="1" checked="checked">خرید و فروش</label>
							</div>
							
							<div class="radio" style="margin-right: 74px;">
							  <label><input id="radio2" type="radio" name="op1" class="radio" value="2">رهن واجاره</label>
							</div>
						</div>
						
						
					</div>
					<hr>
					
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<div class="form-group row" style="width: 67%; margin-right: 2px;">
							  
								<input name="tel" class="form-control" id="number2" type="text" placeholder="تلفن همراه">
							  
							 </div>
						</div>
						
						<div class="col-sm-4 col-xs-4">
							<div class="form-group row" style="width: 67%;margin-right: 42px;">
							  
								<input name="malek" class="form-control" id="ex1" type="text" placeholder="نام مالک">
							  
							 </div>
						</div>
						
						<div class="col-sm-4 col-xs-4"></div>
					</div>
					<!--<input type="submit" name="sabt" id="sabt">-->
					<a onclick="sabt_melk();" class="btn btn-default" id="sabt">ثبت نام</a>
					
				</div>
				<!--/col-md-8-->
				
				
				<div class="col-md-4">
					<div class="right_title">
						<h1>اضافه کردن ملک<h1>
					</div>
				</div>
		</div>
	
		</div>
		<!--/back-->
		</form>
	
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
    <script src="js/jquery.slider.js"></script>
    <script src="js/select2.min.js"></script>
	
    <?php
    global $hooks;
    $hooks->do_action('footer');
    ?>

	
</body>
<script>


    //for tel
    addEvent(document.getElementById('number2'),'keyup',validate);
    addEvent(document.getElementById('number2'),'mouseover',validate);

    //function valid number
    function validate(event){

        var str=this.value;

        var charsAllowed="0123456789";
        var allowed;

        for(var i=0;i<this.value.length;i++){

            allowed=false;

            for(var j=0;j<charsAllowed.length;j++){
                if( this.value.charAt(i)==charsAllowed.charAt(j) ){ allowed=true; }
            }

            if(allowed==false){ this.value = this.value.replace(this.value.charAt(i),""); i--; }
        }

        return true;
    }

    function addEvent(obj,type,fn) {

        if (obj.addEventListener) {
            obj.addEventListener(type,fn,false);
            return true;
        } else if (obj.attachEvent) {
            obj['e'+type+fn] = fn;
            obj[type+fn] = function() { obj['e'+type+fn]( window.event );}
            var r = obj.attachEvent('on'+type, obj[type+fn]);
            return r;
        } else {
            obj['on'+type] = fn;
            return true;
        }
    }




    //joda kardan ba comma
    function intFormat(number) {
        var regex = /(\d)((\d{3},?)+)$/;
        number = number.split(',').join('');

        while(regex.test(number)){
            number = number.replace(regex, '$1,$2');
        }
        return number;
    }

    function numFormat(number) {
        var pointReg = /([\d,\.]*)\.(\d*)$/, f;
        if(pointReg.test(number)){
            f = RegExp.$2;
            return intFormat(RegExp.$1) + '.' + f;
        }
        return intFormat(number);
    }


</script>

</html>
