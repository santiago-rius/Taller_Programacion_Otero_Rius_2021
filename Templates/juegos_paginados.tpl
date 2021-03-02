{if $categoria}
    <h3>{$categoria.nombre}</h3>
    {foreach from=$juegos item=prod}
        {include file="tarjeta_juegos.tpl" jueg=$jueg}
    {/foreach}
    <div>
        <button id="anterior"{if ($pagina <= 0)} disabled {/if}>Anterior</button>
        <button id="siguiente"{if ($pagina >= $ultimaPagina)} disabled {/if}>Siguiente</button>
    </div>
{else}
     <h3>Juego Inexistente</h3>
{/if}

