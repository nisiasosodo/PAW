{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
        <ol class="err" style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #ff6666; width:100%; opacity: 0.8;">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}
{if $msgs->isInfo()}
	<h4 style="margin-bottom: -5px;">Informacje: </h4>
	<ol class="inf" style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #F9F; width:100%; opacity: 0.8;">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}
