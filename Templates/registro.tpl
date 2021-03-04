<!DOCTYPE HTML>

<head>
    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
    <div id="login">
        <h3 id="titulo-login">Registro</h3>
        <form action="doRegistro.php" method="POST">
            <table>
                <tr>
                  <td align="right">Usuario:</td>
                  <td align="left"><input type="text" name="usuario" required></td>
                </tr>
                <tr>
                  <td align="right">Email:</td>
                  <td align="left"><input type="email" name="email" required></td>
                </tr>
                <tr>
                  <td align="right">Clave:</td>
                  <td align="left"><input id="clave" type="password" name="clave" required oninput="verificarSeguridad()" minlength="8"></td>
                </tr>
                <tr>
                <script>
                    function verificarSeguridad(){
                        
                        var clave = document.getElementById("clave").value;
                        var lyn = 0;
                        var mym = 0;
                        var l = 0;
                        const regex1 = /(?=.*\d)(?=.*\D)/gm;
                        if(clave.match(regex1))
                        {
                            lyn = 40; 
                        }
                        if(clave.match(/(?=.*[a-z])(?=.*[A-Z])/gm))
                        {
                            mym = 40;
                        }
                        if(clave.length >= 10)
                        {
                            l = 20;
                        }
                        document.getElementById("seguridad-clave").value = lyn+mym+l;
                        var aux = lyn+mym+l + "";
                        document.getElementById("porcentaje").innerHTML = "Seguridad de la contraseña: " + aux +"%";
                    }
                </script>
                
                </tr>
            </table>
            <div id="porcentaje-clave">
                <label id="porcentaje">Seguridad de la contraseña</label><br>
                <meter id="seguridad-clave" min="0" max="100"></meter><br>
            </div>
            <input id="boton-ingresar" type="submit" value="Ingresar"/>
        </form>
    </div>
</body>
