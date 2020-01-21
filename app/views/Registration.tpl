{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}userSaveChanges" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wypelnij formularz rejestracji:</legend>
		<div class="pure-control-group">
            <label for="login">login</label>
            <input id="name" type="text" placeholder="login" name="login" value="">
        </div>
		<div class="pure-control-group">
            <label for="password">haslo</label>
            <input id="password" type="password" placeholder="haslo" name="password" value="">
        </div>
		<div class="pure-control-group">
            <label for="passwordrepeated">powtorz haslo</label>
            <input id="passwordrepeated" type="password" placeholder="powtorz haslo" name="passwordrepeated" value="">
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
