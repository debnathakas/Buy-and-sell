


function formValidation(){
    // const btn= document.querySelector('#submit');
    var name=document.forms['RegForm']["name"].value;
    var uid=document.forms['RegForm']["uid"].value;
    var IITG_Webmail=document.forms['RegForm']["email"].value;
    var setpass=document.forms['RegForm']["setpass"].value;
    var address=document.forms['RegForm']["address"].value;
    var Occupation=document.forms['RegForm']["options"].value;
    var user_type=document.forms['RegForm']["options1"].value;
    var contact=document.forms['RegForm']["phone"].value;

    if(name==""){
        // window.alert("Enter your name");
        document.getElementById("demo").innerHTML="Please enter your name.";
            document.getElementById("demo").style.color="Red";
            return false;
        }
    if(uid==""){
        document.getElementById("demo").innerHTML="Please enter your UID.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(uid.length<4){
        document.getElementById("demo").innerHTML="UID must be atlest 4 Characters.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(IITG_Webmail==""){
        document.getElementById("demo").innerHTML="Please enter your IITG_Webmail.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(IITG_Webmail.search(/[@]/)==-1){
        document.getElementById("demo").innerHTML="IITG_Webmail must be contain '@' Characters.";
        document.getElementById("demo").style.color="Red";
        return false;
    }

    if(setpass==""){
        document.getElementById("demo").innerHTML="Please enter your Password.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(setpass.length<8){
        document.getElementById("demo").innerHTML="Password must be atlest 8 Characters.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(setpass.search(/[0-9]/)==-1){
        document.getElementById("demo").innerHTML="Password must be contain atlest one Number.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(setpass.search(/[A-Z]/)==-1){
        document.getElementById("demo").innerHTML="Password must be contain atlest one Capital Letter Alphabet.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(setpass.search(/[a-z]/)==-1){
        document.getElementById("demo").innerHTML="Password must be contain atlest one Small Letter Alphabet.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(setpass.search(/[!\#\$\@\&\*\%\_\.\+\(\)\:\;\,]/)==-1){
        document.getElementById("demo").innerHTML="Password must be contain atlest one Special Characters.";
        document.getElementById("demo").style.color="Red";
        return false;
    }





    if(address==""){
        document.getElementById("demo").innerHTML="Please enter your Address.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(Occupation==""){
        document.getElementById("demo").innerHTML="Please enter your Occupation.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(user_type==""){
        document.getElementById("demo").innerHTML="Please enter your User_type.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    
    if(contact.toString().length>10|| contact.toString().length<10){
        document.getElementById("demo").innerHTML="Phone Number must be 10 length.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
    if(contact.search(/[0-9]/)==-1){
        document.getElementById("demo").innerHTML="Phone Number must be contain Number.";
        document.getElementById("demo").style.color="Red";
        return false;
    }
   
    // swal({
    //     title: "Good job!",
    //     text: "You clicked the button!",
    //     icon: "success",
    //     button: "Aww yiss!",
    //   });
    //  window.alert("Successful Registation");
    return true;
    

}



// </script>