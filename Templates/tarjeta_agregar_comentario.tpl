<!doctype html>
<div class="dejar-comentario">
    <form action="doAgregarComentario.php" method="POST" id="ingresoComentario" enctype="multipart/form-data">
    <h4>Deja tu comentario aquí</h4>
        <textarea id="texto-comentario" name="textoComentario" required></textarea>
        <select list="puntaje" name="puntaje"> 
                <option value=5>5</option>
                <option value=4>4</option>
                <option value=3>3</option>                
                <option value=2>2</option>
                <option value=1>1</option>
        </select>
        <span>caca: {$comentarios}</span>
        <button type="submit" id="boton-comentario" class="boton-chico"  name="boton-agregar-comentario" value="{$comentarios}">Comentar</button>
    </form>
</div>
