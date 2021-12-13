/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
  $(function(){

    // Trigger Nice Scroll Plugin
    $("html").niceScroll({
      cursorcolor: "#ff8b38",
      cursorborder: "none",
      cursorborderradius: "0px"
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
function showing(){
	document.getElementById("suggestion").style.display = "b";
}
function suggestion(){
	document.getElementById("suggestion").style.display = "none";
}

function showUser(str) {
    if (str == "") {
        document.getElementsByClassName("show").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("get","means.php?input_mean="+str,true);
        xmlhttp.send();
    }
}

function showResult(str) {
    var suggestion   = document.getElementById("suggestion");//.style.display = 'block';
    var input_search = document.getElementById("input_search");//.style.display = 'block';
    if (str.length==0) {
		suggestion.style.display = "back";
        document.getElementById("search-word").innerHTML="";
        //suggestion.style.display = 'none';
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            suggestion.innerHTML=xmlhttp.responseText;

            document.getElementById("search-word").innerHTML= str;
            if (suggestion.value ===  " "){
                suggestion.style.display = "none";
            } else {
                suggestion.style.display = "block";
            }

        }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();

}
function login() {
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            suggestion.innerHTML=xmlhttp.responseText;
            document.getElementById("card-box").innerHTML= str;
        }
    }
    xmlhttp.open("GET","login.php?user="+user+"&pass="+pass,true);
    xmlhttp.send();

}
function user(value) {
    if (value.length <= 4){
        document.getElementById("user-error").innerText = "عفوا اسم المستخدم يجب ان يكون اكبر من 4 حروف"
    } else if(value = " "){
        document.getElementById("user-error").innerText = "فارغ"
    }
}
function validate(id,place,type) {
    var pass   = document.getElementById(id);
    var msgE   = document.getElementById(place);
    if (type === "password") {
        if (pass.value.length < 6) {
            msgE.innerHTML = "عفوا كلمة المرور يجب ان تكون اكبر من 6 احروف";
        } else if (pass.value.length >= 6) {
            msgE.style.display = "none";
        } else if (pass.value.length == 0) {
            msgE.innerHTML = "عفوا لايجب ترك كلمة المرور فارغة";
        } else if (pass.value.empty()){
            msgE.innerHTML = "عفوا لايجب ترك كلمة المرور فارغة";
        }
    } else if (type === "username"){
        if (pass.value.length < 4) {
            msgE.innerHTML = "عفوا اسم المستخدم يجب ان يكون اكبر من 4 احروف";
        } else if (pass.value.length >= 4) {
            msgE.style.display = "none";
        } else if (pass.value.length === 0) {
            msgE.innerHTML = "عفوا لايجب ترك اسم المستخدم فارغا";
        } else if (pass.value.empty()){
            msgE.innerHTML = "عفوا لايجب ترك اسم المستخدم فارغة";
        }
    } else if(type === "name"){
        if (pass.value.length === 0){
            msgE.innerHTML = "عفوا لايجب ترك الاسم فارغا";
        }
    }
}
function identicalPass() {
    var pass   = document.getElementById("pass");
    var rePass = document.getElementById("rePass");
    if (pass.value === rePass.value){
        pass.style.background   = "green";
        rePass.style.background = "green";
    } else{
        pass.style.background   = "red";
        rePass.style.background = "red";
    }

}


$(document).ready(function(){

    $(".label-in-input").focusin(function(){
        $(".label-added").addClass("label-in-input");
        $(".custom-input-mean").addClass("class-added");
        $("#suggestion").show();
    });
    $(".custom-input-mean").focusin(function(){
        $(".label-added").addClass("label-in-input");
        $(".custom-input-mean").addClass("class-added");
        $("#suggestion").show();
    });
    $(".custom-input-mean").focusout(function() {
      //  $("#suggestion").hide();
    });
    if ($(".custom-input-mean").length > 0){
        $(".label-added").addClass("label-in-input");
        $(".custom-input-mean").addClass("class-added");
    } else{
        $(".custom-input-mean").focusout(function(){
            $("#suggestion").hide();
            $(".label-added").removeClass("label-in-input");
            $(".custom-input-mean").removeClass("class-added");
        });
    }
});
/*
 top: -15px;
 position: absolute;
 z-index: 3;
 font-size: 13px;
 padding-right: 6px;
 color: #5fbeaa;
 */