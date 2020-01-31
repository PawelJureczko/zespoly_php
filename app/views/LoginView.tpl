{extends file="main.tpl"}

{block name=top}
<form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login" value="{$form->login}"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Zaloguj" class="btn btn-success"/>
			<a class="btn btn-info" href="{$conf->action_url}registrationShow">Rejestracja</a>
		</div>

	</fieldset>
</form>

{/block}
