function formValidationforLogin(){
    // const btn= document.querySelector('#submit');
    var uid=document.forms['LogForm']["uid"].value;
    var IITG_Webmail=document.forms['LogForm']["email"].value;
    var setpass=document.forms['LogForm']["pass"].value;
    var User_type=document.forms['LogForm']["options"].value;

    
    if(IITG_Webmail==""){
        document.getElementById("demo").innerHTML="Please enter your Webmail.";
            document.getElementById("demo").style.color="Red";
            return false;
        }
    else if(uid==""){
        document.getElementById("demo").innerHTML="Please enter your UID.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    else if(setpass==""){
        document.getElementById("demo").innerHTML="Please enter your Password.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    else if(User_type==""){
        document.getElementById("demo").innerHTML="Please enter your User_type.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    else {
        return true;
    }





}