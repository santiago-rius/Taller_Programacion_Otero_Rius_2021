<div id="bloque-comentarios">
<h3>Comentarios:</h3>
    {include file="tarjeta_agregar_comentario.tpl"}
    <div id="comentarios-juego">
     {foreach from=$comentarios item=com}
        {include file = "tarjeta_comentario.tpl" comentario=$com}
    {/foreach} 
    </div>
    <div id="botones_anteriores_siguientes">
        <button class="boton-chico" id="comentarios-ant"{if ($paginaComentarios <= 0)} disabled {/if}>Anterior</button>
        <button class="boton-chico" id="comentarios-sig"{if ($paginaComentarios >= $ultimaPagina)} disabled {/if}>Siguiente</button>
    </div>
</div>
