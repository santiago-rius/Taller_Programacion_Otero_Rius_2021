<!DOCTYPE html>

<div class="juego">
    <a juegId={$jueg.id} href="juego.php?id={$jueg.id}">
        <img src={$jueg.poster} alt="Imagen" />
    <span class="nombre-producto">
    {$jueg.nombre} </span>
    <p> {$jueg.resumen}</p>
    </a>
</div>
