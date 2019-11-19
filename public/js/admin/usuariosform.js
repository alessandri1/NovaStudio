

var Flags = {
    name:false,
    apellido:false,
    username:false,
    password:false,
    passwordRepeat: false,
    usernameAsync: false
}


const errorMessage = {
    checkName: "Debe ingresar solo letras o vocales",
    password: "Debe ser de un largo de 8, tener 1 caracter mayuscula, 1 caracter minuscula, 1 caracter especial",
    passwordConfirm: "Las contraseñas deben coincidir"
}

checkName($("#name-user"));
checkName($("#apellido"));
checkName($("#username"));

$("#username").keyup(function() {
    const username = $(this).val();
    const editing = $("#user-form").attr("action") === "/webmaster/admin/updateUser";
    if(editing) Flags.usernameAsync = true;
    if(Flags.username && !editing){
        $.ajax({
            url: '/webmaster/admin/checkUserExistence?username='+username,
            method: 'GET',
            success: function(data) {
                const dataObject = tryParseJson(data);
                const { code, response } = dataObject;
                $(`#username-message`).text(response);
                console.log(code, response);
                if (code === 1) {
                    console.log = "here";
                    Flags.usernameAsync = false;
                    $("#username").css("border-color","red");
                    $("#username").css("box-shadow","0 0 0 0.2rem rgba(255,0,0,.25)");
                } else {
                    Flags.usernameAsync = true;
                    $("#username").css("border-color","rgb(0,255,0)");
                    $("#username").css("box-shadow","0 0 0 0.2rem rgba(0,255,0,.25)");
                }
            }
        });
    }
    checkFlags();
})

$('#password').keyup(function () {
    const result = checkPasswordRules($(this).val());
    checkPasswordConfirm();
    if(!result) {
        $(this).css("border-color","red");
        $(this).css("box-shadow","0 0 0 0.2rem rgba(255,0,0,.25)");
    } else {
        $(this).css("border-color","rgb(0,255,0)");
        $(this).css("box-shadow","0 0 0 0.2rem rgba(0,255,0,.25)");
    }

    const error = result ? "" : errorMessage.password;
    $("#password-message").text(error);
    Flags.password = result;
    checkFlags();
    return;
})

$("#password-repeat").keyup(checkPasswordConfirm);

function checkPasswordConfirm(){
    /**Function to compare the value of 
     * passwords fields everytime is called
     */

    const passwordVal = $("#password").val();
    let text= $("#password-repeat").val();
    Flags.passwordRepeat = passwordVal === text;
    const color = Flags.passwordRepeat ? "rgb(0,255,0)" : "red";
    const shadowColor = Flags.passwordRepeat ? "rgba(0,255,0,.25)" : "rgba(255,0,0,.25)";
    const x = Flags.passwordRepeat ? "" : errorMessage.passwordConfirm;
    $("#password-reapeat-message").text(x);
    $("#password-repeat").css("border-color", color);
    $("#password-repeat").css("box-shadow", shadowColor);
    
    checkFlags();
}

// $("#user-form").on("submit", function(e) {
//     e.preventDefault();
//     const username = $("#username").val();
    
// })

function checkName(element){
    
    /**this function is used to check rules from first and
     * last name that are the same.
     */
    element.keyup(()=>{

        var regex = RegExp("[^A-Za-z]");
        var text = element.val().toLowerCase();
        const id = element.attr("id");
        if(regex.test(text) || text==""){
            switch (id) {
                case "name-user":
                    Flags.name = false;
                    break;
                case "apellido":
                    Flags.apellido = false;
                    break;
                case "username":
                    Flags.username = false;
                    break;
                default:
                    break;
            }
            $(`#${id}-message`).text(errorMessage.checkName);
            element.css("border-color","red");
            element.css("box-shadow","0 0 0 0.2rem rgba(255,0,0,.25)");
        }
        else{
            switch (element.attr("id")) {
                case "name-user":
                    Flags.name = true;
                    break;
                case "apellido":
                    Flags.apellido = true;
                    break;
                case "username":
                    Flags.username = true;
                    break;
                default:
                    break;
        }
            $(`#${id}-message`).text("");
            element.css("border-color","rgb(0,255,0)");
            element.css("box-shadow","0 0 0 0.2rem rgba(0,255,0,.25)");
        }
        checkFlags();
    });
}

function checkFlags(){
    /**Function to activate or desactivate the
     *Submit Button
     */
    console.log(Flags);
    for (const i in Flags) {
        if (Flags[i]==false) {
            $("#submit").attr("disabled","");
            return false;
        }
    }
    
    $("#submit").removeAttr("disabled");
    return true;
}

function checkPasswordRules(val){

    /**Function used to determine if the rules of the
     * password are ok
     */

    var regex = RegExp('[/*-._;<>!"#$%&=?¡¿]',"g");
    var regexMayus = RegExp("[A-Z]","g");
    var regexMin = RegExp("[a-z]","g");
    const result = val.match(regex)!=null && val.match(regexMayus)!=null && val.match(regexMin)!=null;
    console.log(result);
    if(val.match(regex)!=null && val.match(regexMayus)!=null && val.match(regexMin)!=null)
    {    
        if(val.match(regex).length >= 1 && val.length>8 && val.match(regexMayus).length>=1 && val.match(regexMin).length>=1){
            return true;
        }
        else
            return false;
        } else {
            return false;
        }
}

function tryParseJson(data) {
    try {
      const o = JSON.parse(data);
      
      if (o && typeof o === "object") {
        return o;
      }
    } catch (error) {
      
    }
    return false;
  }
