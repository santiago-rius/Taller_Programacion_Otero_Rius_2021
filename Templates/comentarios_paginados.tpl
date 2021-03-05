
     {foreach from=$comentarios item=com}
        {include file = "tarjeta_comentario.tpl" comentario=$com}
    {/foreach} 

    <div id="botones_anteriores_siguientes">
        <button id="comentarios-ant"{if ($paginaComentarios <= 0)} disabled {/if}>Anterior</button>
        <button id="comentarios-sig"{if ($paginaComentarios >= $ultimaPagina)} disabled {/if}>Siguiente</button>
    </div>
