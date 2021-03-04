<div id="login">
    <h3 id="titulo-login">Inicio de Sesión</h3>
    <form action="doLogin.php" method="POST">
        <table>
            <tr>
              <td align="right">Email:</td>
              <td align="left"><input type="text" name="email" required></td>
            </tr>
            <tr>
              <td align="right">Clave:</td>
              <td align="left"><input type="password" name="clave" required></td>
            </tr>
        </table>
        <input id="boton-ingresar" type="submit" value="Ingresar"/>
    </form>
        {if $error}
            <label class="mensaje-error">Usuario o clave incorrectos.</label>
        {/if}
</div>
