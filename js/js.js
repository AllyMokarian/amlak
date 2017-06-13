$(document).ready(function () {


    $('ul.tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');


    });




    $('#myCarousel').carousel({
        interval: 4000
    });

    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function () {
        clickEvent = true;
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');
    }).on('slid.bs.carousel', function (e) {
        if (!clickEvent) {
            var count = $('.nav').children().length - 1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if (count == id) {
                $('.nav li').first().addClass('active');
            }
        }
        clickEvent = false;
    });


    //slider
    $(".slider-melk .content-slider").jCarouselLite({

        // auto: 2000,
        //speed: 1000,

        btnNext: ".slider-melk .makhfi-right",
        btnPrev: ".slider-melk .makhfi-left"
    });




    //modal login
    $("#login").click(function () {
        $("#myModal").modal();
    }) 
    



    //chosen select
    /*$(".gg").chosen({
        search_contains: true,
        no_results_text: "Oops, nothing found!",
        width: "50%"
    });*/

    $('.box-sabt .text-box').find('.checked input').click(function () {

        var checked = $(this).prop('checked');
        if (checked == true) {
            //$('.makhfi').css('display','block');
            $('.makhfi').slideDown();
        } else {
            //$('.makhfi').css('display','none');
            $('.makhfi').slideUp();
        }

    });

    //load wow
    // wow.init();



    //selct in sabt_melk
    $('.select').select2({
        placeholder: "شهرستان",
        width: "170px",
        margin: "0 38px 0 0"

    });

    //selct in sabt_melk
    $('.select1').select2({
        placeholder: "شهر",
        width: "96%"

    });


    //sabt_melk radio button
    $('.radio label').find('#radio1').change(function () {

        var t = $(this).is(':checked');
        if (t == true) {
            $('#forosh').css('display', 'block');
            $('.rahn').css('display', 'none');
        }

    });

    $('.radio label').find('#radio2').change(function () {

        var tt = $(this).is(':checked');
        if (tt == true) {
            $('#forosh').css('display', 'none');
            $('.rahn').css('display', 'block');
        }

    });

    var edame_address = "";
    var shahr = "";
    var counter = 0;

    $('#shahr').change(function () {

        if (counter == 0) {
            edame_address = $(".edame_address #add button").text();
            counter++;
        }

        shahr = $('#shahr option:selected').text();
        $('.edame_address #add button').text(edame_address + '-' + shahr);

    });




    var id_ostan;
    //load city
    $('#ostan ').change(function () {

        //var id = ($(this).val());
        id_ostan = $('#ostan option:selected').attr("data-id");

        counter = 0;

        $('.edame_address #add button span').remove();

        var text = $('#ostan option:selected').text();

        $('.edame_address #add button').text("ادامه ادرس :" + text);


        $('#box_select select option').remove();

        search_city(id_ostan);

    });



    //load city in takmili
    $('#ostan_tak').change(function () {

       // var url = "../../city1/run";
        id_ostan = $('#ostan_tak option:selected').attr('id');


        counter=0;
        var text = $('#ostan_tak option:selected').text();
        $('.adress_nahaie').text(text);

        //alert(text);

        $('#box_select select option').remove();


        search_city(id_ostan);

    });



















    //safhe etelaat takmili

    $('#noe').change(function () {
        var x = $('#noe option:selected').val();

        if (x == 2) {
            $('.makhfi1').css('display', 'block');
            $('.makhfi4').css('display', 'none');

            //alert(x);
        } else {
            x == 1;
            $('.makhfi1').css('display', 'none');
            $('.makhfi4').css('display', 'block');
        }

    });

    //radio vam
    $('#vam').click(function () {
        var vam = $(this).is(':checked');
        if (vam == true) {
            $('.makhfi6').css('display', 'block');
        }
        //alert(vam);
    });

    //radio vam1
    $('#vam1').click(function () {
        var vam1 = $(this).is(':checked');
        if (vam1 == true) {
            $('.makhfi6').css('display', 'none');
        }
        //alert(vam);
    });



    //pish_forosh1 pish_forosh1
    $('#pish_forosh1').click(function () {
        var pish_forosh1 = $(this).is(':checked');
        if (pish_forosh1 == true) {
            $('.makhfi7').css('display', 'block');
        }
        //alert(vam);
    });

    //pish_forosh2
    $('#pish_forosh2').click(function () {
        var pish_forosh2 = $(this).is(':checked');
        if (pish_forosh2 == true) {
            $('.makhfi7').css('display', 'none');
        }
        //alert(vam);
    });

    //moaveze1
    $('#moaveze1').click(function () {
        var moaveze1 = $(this).is(':checked');
        if (moaveze1 == true) {
            $('.makhfi5').css('display', 'block');
        }
        //alert(vam);
    });

    //moaveze2
    $('#moaveze2').click(function () {
        var moaveze2 = $(this).is(':checked');
        if (moaveze2 == true) {
            $('.makhfi5').css('display', 'none');
        }
        //alert(vam);
    });

    //parking
    $('#parking').click(function () {
        var parking = $(this).is(':checked');
        if (parking == true) {
            $('#tedad_parking').css('display', 'block');
        }
    });

    //parking
    $('#parking1').click(function () {
        var parking1 = $(this).is(':checked');
        if (parking1 == true) {
            $('#tedad_parking').css('display', 'none');
        }
    });

    //khat_telefon
    $('#tel').click(function () {
        var tedad_khat = $(this).is(':checked');
        if (tedad_khat == true) {
            $('#tedad_khat').css('display', 'block');
        }
    });

    //khat_telefon
    $('#tel1').click(function () {
        var tedad_khat1 = $(this).is(':checked');
        if (tedad_khat1 == true) {
            $('#tedad_khat').css('display', 'none');
        }
    });

    var edame="";
    var shar= "";
    $('#shar').change(function () {

        address = $('#address').val();
        mantaghe = $('#mantaghe').val();
        if(counter == 0){
             edame = $('.adress_nahaie').text();
            counter++;
        }

          shar = $('#shar option:selected').text();
        $('.adress_nahaie').text(edame+'-'+shar+'-'+mantaghe+'-'+address);

    });
    var mantaghe = "";
    $('#mantaghe').keyup(function () {

         mantaghe = $('#mantaghe').val();
        $('.adress_nahaie').text(edame+'-'+shar+'-'+mantaghe+'-'+address);

    });

    var address = "";
    $('#address').keyup(function () {


        address = $('#address').val();
        $('.adress_nahaie').text(edame+'-'+shar+'-'+mantaghe+'-'+address);

    });


    
    

 
  
    



}); //document







function sabt_melk() {
    formdata = $('#sabt_melk').serialize();

    $.ajax({
        url: "sabtmelk/run",
        type: "POST",
        data: formdata,
        beforeSend: function () {
            $("#err_melk").fadeOut();
            $("#sabt").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> در حال ارسال');
        },
        success: function (data) {
            alert(data);
            var obj = JSON.parse(data);
            if (obj.ok == "true") {
                window.location.href = "Views/sabtmelk/takmili";
                //location.reload();

            } else {
                //alert(obj.message);
                $("#err_melk").fadeIn(1000, function () {
                    $("#err_melk").html(' <i class="fa fa-lock"></i> ' + obj.message + ' !');
                    $("#sabt").html('ورود');
                });
            }

        }
    });
}


function sabt_takmili() {
    formdata = $('#sabt_takmili').serialize();

    $.ajax({
        url: "../../takmili/run",
        type: "POST",
        data: formdata,
        beforeSend: function () {
            $("#err_melk").fadeOut();
            $("#sabt_zaruri").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> در حال ارسال');
        },
        success: function (data) {
            alert(data);
            var obj = JSON.parse(data);
            if (obj.ok == "true") {
                window.location.href = "test/propertise";
                //location.reload();

            } else {
                //alert(obj.message);
                $("#err_melk").fadeIn(1000, function () {
                    $("#err_melk").html(' <i class="fa fa-lock"></i> ' + obj.message + ' !');
                    $("#sabt_zaruri").html('ورود');
                });
            }

        }
    });
}



function propertise() {
    formdata = $('#sabt_takmili').serialize();

    $.ajax({
        url: "../../properties/run",
        type: "POST",
        data: formdata,
        beforeSend: function () {
            $("#err_melk").fadeOut();
            $("#sabt_zaruri").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> در حال ارسال');
        },
        success: function (data) {
            alert(data);
            var obj = JSON.parse(data);
            if (obj.ok == "true") {
                //window.location.href = ;
                location.reload();

            } else {
                //alert(obj.message);
                $("#err_melk").fadeIn(1000, function () {
                    $("#err_melk").html(' <i class="fa fa-lock"></i> ' + obj.message + ' !');
                    $("#sabt_zaruri").html('ورود');
                });
            }

        }
    });
}








var searchcondition = 0;

function dosearch() {
    if (searchcondition == 0) {
        document.getElementById('content').style.height = "340px";
        document.getElementById('arrow').className = "fa fa-angle-up";
        searchcondition = 1;
        setTimeout(settoauto, 800);
    } else {
        setTimeout(settonum, 1);
        document.getElementById('content').style.height = "340px";
        document.getElementById('arrow').className = "fa fa-angle-down";
        searchcondition = 0;
    }
}

function settoauto() {
    document.getElementById('content').style.height = "auto";
}

function settonum() {
    document.getElementById('content').style.height = "0";
}



function sendForm() {
    formdata = $('#sendForm').serialize();

    $.ajax({
        url: "login/run",
        type: "POST",
        data: formdata,
        //dataType: "json",
        data: formdata,
        beforeSend: function () {


            $("#error").fadeOut();
            $("#send").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> در حال ارسال');

        },
        success: function (data) {
            //alert(data);
            var x = JSON.parse(data);
            if (x.ok == "true") {
                window.location.href = "Index";
                //location.reload();
            } else {
                $("#error").fadeIn(1000, function () {
                    $("#error").html(' <i class="fa fa-lock"></i>   ' + x.message + ' !');
                    $("#send").html('<span><i class="fa fa-key"></i></span>ورود');
                });
            }

        }
    });
}



function sendForm1() {
    formdata = $('#sendForm1').serialize();

    $.ajax({
        url: "register/run",
        type: "POST",
        data: formdata,
        //dataType: "json",
        beforeSend: function () {


            $("#error_register").fadeOut();
            $("#ersal").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> در حال ارسال');

        },
        success: function (data) {
            alert(data);
            var k = JSON.parse(data);

            if (k.ok == "true") {
                $("#error_register").fadeIn(4000, function () {
                    $("#error_register").html(' ' + k.message + ' ');
                    location.reload();
                });
                //window.location.href = "register.php?abbass=yes";
                //location.reload();
            } else {
                //alert(k.message);
                $("#error_register").fadeIn(1000, function () {
                    $("#error_register").html(' ' + k.message + ' ');
                    $("#ersal").html('ثبت نام');
                });
            }

        }
    });
}





/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";

}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";

}

//search_address

 var searchbox = new google.maps.places.SearchBox(document.getElementById('search_address'));
	google.maps.event.addListener(searchbox,'places_changed',function(){
		var places=searchbox.getPlaces();
		var i,place;
		for(i=0;place=places[i];i++){
			console.log(place);
			//var text = json_decode(place);
			//alert(text);
			//alert();
		}; 
	});




//DrobDown menu
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}


function search_city(id_ostan){

    $.ajax({
        url: "city/run",
        type: "post",
        dataType: "json",
        data: {
            id_ostan:id_ostan
        },
        success: function (data) {

            $.each(data, function (index, value) {
                //alert(value['province_id']);
                $('#box_select select').append('<option>' + value["name"] + '</option>');

            }); //each
        }
    }); //ajax
}


function search_city1(id_ostan){

    $.ajax({
        url: "../../city/run",
        type: "post",
        dataType: "json",
        data: {
            id_ostan:id_ostan
        },
        success: function (data) {

            $.each(data, function (index, value) {
               // alert(value['province_id']);
                $('#box_select select').append('<option>' + value["name"] + '</option>');

            }); //each
        }
    }); //ajax
}