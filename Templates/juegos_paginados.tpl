{if $categoria}
    <h2>{$categoria.nombre}</h2>
{/if}
    {foreach from=$juegos item=jueg}
        {include file="tarjeta_juego.tpl" jueg=$jueg}
    {/foreach}

    <div id="botones_ant_sig">
        <button id="anterior"{if ($pagina <= 0)} disabled {/if} class="boton-chico">Anterior</button>
        <button id="siguiente"{if ($pagina >= $ultimaPagina)} disabled {/if} class="boton-chico">Siguiente</button>
    </div>

