{if $categoria}
    <h3>{$categoria.nombre}</h3>
    {foreach from=$juegos item=jueg}
        {include file="tarjeta_juego.tpl" jueg=$jueg}
    {/foreach}
    
{else}    
        <h3> Categoría Inexistente</h3>
{/if}
    <div id="botones_ant_sig">
        <button id="anterior"{if ($pagina <= 0)} disabled {/if} class="boton-chico">Anterior</button>
        <button id="siguiente"{if ($pagina >= $ultimaPagina)} disabled {/if} class="boton-chico">Siguiente</button>
    </div>

