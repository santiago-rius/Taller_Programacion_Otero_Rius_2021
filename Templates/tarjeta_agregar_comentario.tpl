<!doctype html>
<div class="dejar-comentario">
    <form action="doAgregarComentario.php">
    <h4>Deja tu comentario aquí</h4>
        <textarea id="texto-comentario" name="texto-comentario" required></textarea>
        <select list="puntuacion" name="puntaje" required > 
            <datalist id="puntuacion">
                <option value=5>5</option>
                <option value=4>4</option>
                <option value=3>3</option>                
                <option value=2>2</option>
                <option value=1>1</option>
            </datalist> 
        </select>
        <input type="submit" class="boton-chico" id="boton-comentario" value="Guardar">
    </form>
</div>
