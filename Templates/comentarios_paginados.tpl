<div id="bloque-comentarios">
<h3>Comentarios:</h3>

    {include file="tarjeta_agregar_comentario.tpl" id_juego=$id_juego}
    <div id="comentarios-juego">
    {foreach from=$comentarios item=com}
        {include file = "tarjeta_comentario.tpl" comentario=$com}
    {/foreach} 
    </div>
    <div id="botones_anteriores_siguientes">
        <button class="boton-chico" id="comentarios-ant"{if ($pagina <= 0)} disabled {/if}>Anterior</button>
        <button class="boton-chico" id="comentarios-sig"{if ($pagina >= $ultimaPagina)} disabled {/if}>Siguiente</button>
    </div>
    
</div>
