{extends file="main.tpl"}

{block name=content}
<div class="container">
  <div class="left">
     <div class="animation a2">
         <a href="{$conf->action_url}logout" style="margin: 20px; margin-left: 0px; margin-right: 0px; padding: 10px; border-radius: 20px; background-color: #cccccc; color:white; opacity:70%">Wyloguj</a>
         <p style="color: #999999; float:right; font-size:15px; text-align:right;">
            Użytkownik: {$user->login} <br> 
            Rola: {$user->role}</p>
        </div> 
    <div class="header">
      <h2 class="animation a1">{$page_header}</h2>
      <h4 class="animation a2">{$page_description}</h4>
    </div>
    <div class="form">
        <form action="{$conf->action_url}calcCompute" method="post">
      
            <input id="id_kwota" type="text" name="kwota" class="form-field animation a3" placeholder="Kwota kredytu" value="{$form->kwota}">
            <input id="id_lata" type="text" name="lata" class="form-field animation a4" placeholder="Liczba lat" value="{$form->lata}">
            <input id="id_proc" type="text" name="proc" class="form-field animation a5" placeholder="Oprocentowanie" value="{$form->proc}"><br>
              <button type="submit" class="animation a6">Oblicz</button> <br>
        </form>
    </div> 

<div class="messages">
{include file='messages.tpl'}
</div>

{if !empty($result->result) && $result->result != null}
	<h4 style="margin-bottom: -10px;">Miesięczna rata kredytu: </h4>
	<p style="margin: 20px; margin-left: 0px; margin-right: 0px; padding: 10px; border-radius: 5px; background-color: #cc99cc; width:100%; opacity: 1; color: white;">
	{$result->result} zł
	</p>
{/if}



{if empty($result)}
<div class="right"></div>   
{/if}       
</div>
{if !empty($result)}
<div class="right"></div>   
{/if} 
</div>
    
{/block}
