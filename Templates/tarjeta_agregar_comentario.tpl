<!doctype html>
<div class="dejar-comentario">
    <form action="doAgregarComentario.php" method="POST" id="ingresoComentario" enctype="multipart/form-data">
    <h4>Deja tu comentario aquí</h4>
    <div class="select-personalizado">
        <textarea id="texto-comentario" name="textoComentario" required></textarea>
        <p>Puntaje:</p>
        <select list="puntaje" name="puntaje"> 
                <option value=5>5/5</option>
                <option value=4>4/5</option>
                <option value=3>3/5</option>                
                <option value=2>2/5</option>
                <option value=1>1/5</option>
        </select>
    </div>
        <button type="submit" id="boton-comentario" class="boton-chico"  name="boton-agregar-comentario" value="{$id_juego}">Comentar</button>
    </form>
    {if $err}
        <label class="mensaje-error">
            Aviso: Usted ya ha comentado en este juego.
        </label>
        {/if}
    
</div>
