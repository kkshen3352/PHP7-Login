<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>旅歷Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>

<body>
    <aside>
        <div class="backall">
            <div class="boxinit wrapper d-flex">
                <div class="innhbox">
                    <img class="d-flex" src="images/logo1.png" alt="" />
                </div>
                <div class="textbox d-flex">
                    <form action="">
                        <table class="">
                            <th class="">
                                <div class="trmag d-flex">
                                    <tr class="d-flex ">
                                        <label for="email">信箱:</label>
                                        <input type="text" id="email" name="email" required >
                                        <img src="images/person-24px.svg" alt="" />
                                    </tr>
                                </div>

                                <div class="decoration"></div>

                                <div class="trmag">
                                    <tr class="d-flex">
                                        <label for="pas">密碼:</label><input type="pas" id="pas" name="pas" required>
                                        <img src="images/vpn_key-24px.svg" alt="" />
                                    </tr>
                                </div>

                                <div class="decoration"></div>

                                <div class="trmag">
                                    <t class="d-flex"><input class="button" type="submit" value="登入" onclick="doLogin()" /></t>
                                </div>
                            </th>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>

<script>
    function doLogin() {
        let email = document.getElementById("email").value;
        let pas = document.getElementById("pas").value;
        $.ajax({
                method: "POST",
                url: "doLogin.php",
                dataType: "json",
                data: {
                    email: email,
                    pas: pas
                }
            })
            .done(function(response) {
                console.log(response)
                if (response.status == 0) {
                    alert(response.message);
                } else {
                    alert(response.message);
                    location.href = "loginSuccess.php";
                    //接回主頁連結
                }

            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });
    }
</script>
</body>
</html>