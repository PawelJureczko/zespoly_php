{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}savePassword" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Zmiana hasła:</legend>
		<div class="pure-control-group">
            <label for="currentpassword">Obecne haslo:</label>
            <input id="currentpassword" type="password" placeholder="Wpisz obecne haslo" name="currentpassword" value="">
        </div>
        <div class="pure-control-group">
            <label for="newpassword">Nowe haslo:</label>
            <input id="newpassword" type="password" placeholder="Wpisz nowe haslo" name="newpassword" value="">
        </div>
		<div class="pure-control-group">
            <label for="newpasswordrepeated">Powtorz nowe haslo</label>
            <input id="newpasswordrepeated" type="password" placeholder="Powtorz nowe haslo" name="newpasswordrepeated" value="">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}userProfile">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>
</div>

{/block}
