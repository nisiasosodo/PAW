{extends file="main.tpl"}
{block name=content}
    
{*<form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	*}

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Strona logowania</h2>
      <h4 class="animation a2">Kalkulator kredytowy</h4>
    </div>
    <div class="form">
        <form action="{$conf->action_root}login" method="post">
      
            <input id="id_login" type="text" name="login" class="form-field animation a3" placeholder="Login"/>
            <input id="id_pass" type="password" name="pass" class="form-field animation a4" placeholder="Hasło"/>
            <button type="submit" class="animation a6">Zaloguj</button> <br>
        </form>
    </div> 
{include file='messages.tpl'}

</div>
<div class="right"></div> 

{/block}