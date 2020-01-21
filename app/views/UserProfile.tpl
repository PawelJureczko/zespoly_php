{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}registrationSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wypelnij formularz rejestracji:</legend>
		<div class="pure-control-group">
            <label for="login">login</label>
            <input id="name" type="text" placeholder="login" name="login" value="{$form->login}">
        </div>
		<div class="pure-control-group">
            <a href="{$conf->action_root}changePassword">Zmień hasło</a>
        </div>
        <div class="pure-control-group">
            <label for="name">imie</label>
            <input id ="name" name ="name" placeholder="imie" value="">
        </div>
        <div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id ="surname" name ="surname" placeholder="nazwisko" value="">
        </div>
        <div class="pure-control-group">
            <label for="email">adres email</label>
            <input id ="email" name ="email" placeholder="e-mail" value="">
        </div>
		<div class="pure-control-group">
            <label for="phone">numer telefonu</label>
            <input id ="phone" name ="phone" placeholder="numer telefonu" value="">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}loginShow">Powrót</a>
		</div>
	</fieldset>
</form>
</div>

{/block}
