function signup() {
    window.location = "signup.php";
}

function signupt() {
    window.location = "signinteacher.php";
}

function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {
    //alert("ok1");
    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");
    var gr = document.getElementById("gr");

    // alert(f.value);
    // alert(l.value);
    // alert(e.value);
    // alert(p.value);
    // alert(m.value);
    // alert(g.value);
    // alert(gr.value);


    var fd = new FormData();
    fd.append("f", f.value);
    fd.append("l", l.value);
    fd.append("e", e.value);
    fd.append("p", p.value);
    fd.append("m", m.value);
    fd.append("g", g.value);
    fd.append("gr", gr.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    };
    r.open("POST", "Signupprocess.php", true);
    r.send(fd);
}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");



    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", remember.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };


    r.open("POST", "signinprocess.php", true);
    r.send(f);

}
var bm;

function forgotpassword() {




    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {

    var email = document.getElementById("email2");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                bm.hide();
                alert("Password reset success");

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}

function Logout() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                //window.location =  "home.php";
                window.location.reload();
            } else {
                alert(t);

            }

        }
    }
    r.open("GET", "signoutprocess.php", true);
    r.send();
}

function proImage() {

    var view = document.getElementById("proviewImage");
    var file = document.getElementById("proimg");

    file.onchange = function() {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function imagesave() {
    var image = document.getElementById("proimg");

    var f = new FormData();
    f.append("image", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            t = r.responseText;
            if (t == "success") {
                alert("Save image Success");
                window.location.reload();
            } else {
                alert(t);
            }


        }
    };
    r.open("POST", "Profileimagechange.php", true);
    r.send(f);

}

function saveprofiledetails() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var district = document.getElementById("district");
    var province = document.getElementById("province");
    var pcode = document.getElementById("pcode");

    // alert(fname.value);
    // alert(lname.value);
    // alert();
    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(district.value);
    // alert(province.value);
    // alert(pcode.value);

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("line1", line1.value);
    f.append("line2", line2.value);
    f.append("city", city.value);
    f.append("district", district.value);
    f.append("province", province.value);
    f.append("pcode", pcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }


    r.open("POST", "Updateprofileprocess.php", true);
    r.send(f);
}

function savenew() {

    var sub = document.getElementById("subject").value;
    var typ = document.getElementById("type").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Your new subject and class type added successfull");
                window.location = "home.php";
            } else {
                alert(t);
            }

        }
    }
    r.open("GET", "addnewsub.php?sub=" + sub + "&type=" + typ, true);
    r.send();

}

function payNow(id) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;


            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["price"];

            if (t == "1") {
                alert(t);
                alert("Please log in or sign up");


            } else {

                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    // Note: validate the payment and show success or failure page to the customer
                };


                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221509", // Replace your Merchant ID
                    "return_url": "http://localhost/my/joinprocess.php?id" + id,
                    "cancel_url": "http://localhost/my/joinprocess.php?id" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["lesson_name"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": "1000",
                    "city": "43574",
                    "country": "Sri Lanka",
                    "delivery_address": "hb",
                    "delivery_city": "b",
                    "delivery_country": "b",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function(e) {
                payhere.startPayment(payment);


                // };


            }
        }
    };

    r.open("GET", "buyNowProcess.php?id=" + id, true);
    r.send();

}

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    };

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}

function deleteFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alert("Product removed from cart");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();
}

function sendcode() {
    var email = document.getElementById("email");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var signUpBox = document.getElementById("signin");
                var signInBox = document.getElementById("signin1");

                signUpBox.classList.toggle("d-none");
                signInBox.classList.toggle("d-none");
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "sendcode.php?e=" + email.value, true);
    r.send();
}

function change() {


    var signUpBox = document.getElementById("signin");
    var signInBox = document.getElementById("signin1");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");


}

function codeconfirm() {
    var concode = document.getElementById("concode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "admindash.php";
            } else { alert(t); }



        }
    };

    r.open("GET", "confirmattioncodeprocess.php?c=" + concode.value, true);
    r.send();
}

function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                window.location = "adminsignin.php";


            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "asignoutProcess.php", true);
    r.send();

}

var bm;

function assiment() {
    var m = document.getElementById("assiment");
    bm = new bootstrap.Modal(m);
    bm.show();
}

function addlessonnote() {
    var m = document.getElementById("lessonnote");
    bm = new bootstrap.Modal(m);
    bm.show();



}

function m() {
    var r = new XMLHttpRequest();
    r.open("")
}