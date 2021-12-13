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
        $('.nice-scroll-aside').niceScroll({
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
function showResult(str) {
    var suggestion   = document.getElementById("suggestion");//.style.display = 'block';
    var input_search = document.getElementById("input_search");//.style.display = 'block';
    if (str.length===0) {
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
            var MA_Result = xmlhttp.responseText;
            if (MA_Result === false){
                suggestion.style.display = "none";
            } else{
                suggestion.style.display = "block";
                suggestion.innerHTML=xmlhttp.responseText;
            }
        }
    }
    console.log(xmlhttp);
    xmlhttp.open("GET","MA-Content/MA-Means-Search.php?q="+str,true);
    xmlhttp.send();

}

function MA_AJAX_FUNC() {
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
    xmlhttp.open("GET","MA-Content/MA-Ajax-Files/MA-Validate-Login-User.php?user="+user+"&pass="+pass,true);
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
    var REpass = document.getElementById(id);
    var msgE   = document.getElementById(place);
    if (type === "password") {
        if (pass.value.length < 6) {
            msgE.innerHTML = "عفوا كلمة المرور يجب ان تكون اكبر من 6 احروف";
        } else if (pass.value.length >= 6) {
            msgE.style.display = "none";
        } else if (pass.value.length === 0) {
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
    if ((pass.value.length <= 6) || (rePass.value.length <= 6) || (pass.value === "") || (rePass.value === "")){
      //  pass.style.background = "red";
        //errorPass.innerText = "عفوا ";
    }else {
        if ((pass.value === rePass.value) && (pass.value.length >= 5) && (rePass.value.length >= 5) && (pass.value !== "") && (rePass.value !== "")) {
            pass.style.background = "green";
            rePass.style.background = "green";
            //console.log(pass);
        } else {
            pass.style.background = "red";
            rePass.style.background = "red";
        }
    }
}
var not;
not = new Notification('New Message From Me',{
    body: 'Hello! World I am Mohamed',
    icon: 'MA-Includes/MA-Assets/MA-Img/avatar-1.jpg',
    tag: 'Mohamed'
});
not.onClick = function(){
    window.location = 'MA-Chat.php?Message=' + this.tag;
    console.log(this);
};

$(document).ready(function(){
    var $search_Sug     = $("#suggestion").hide();
    var $search_input   = $(".MA_Search_inp");
    var $search_Button  = $(".MA_Search_Btn");
    $search_Button.click(function () {
        if ($search_input.val().length <= 0){
            return SweetAlert('عفوا برجاء إدخال كلمة لإجاد معناها','error');
            //return confirm("عفوا برجاء إدخال كلمة لإجاد معناها");
        }
    });

    $search_input.focusin(function(){
        if($search_input.val().length > 0) {
            $search_Sug.show();
        } else{
            $search_Sug.hide();
        }
    });
    $(".custom-input-mean").focusout(function() {
       if ($search_input.val().length > 0) {
           $search_Sug.show();
       } else{
           $search_Sug.hide();
       }
    });
});

