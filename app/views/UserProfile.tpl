{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}userSaveChanges" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wypelnij formularz edycji:</legend>
			<div class="pure-control-group">
            <label for="name">imie</label>
            <input id ="name" name ="name" placeholder="imie" value="{$form->name}">
        </div>
        <div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id ="surname" name ="surname" placeholder="nazwisko" value="{$form->surname}">
        </div>
        <div class="pure-control-group">
            <label for="email">adres email</label>
            <input id ="email" name ="email" placeholder="e-mail" value="{$form->email}">
        </div>
		<div class="pure-control-group">
            <label for="phone">numer telefonu</label>
            <input id ="phone" name ="phone" placeholder="numer telefonu" value="{$form->phone}">
        </div>

		<div class="pure-controls">
			<input type="submit" class="btn btn-success" value="Zapisz"/>
            <a class="btn btn-info" href="{$conf->action_root}changePassword">Zmień hasło</a>
		</div>
        <div class="pure-controls">
        <a class="btn btn-link btn btn-outline-dark" href="{$conf->action_root}loginShow">Powrót</a>
        </div>
	</fieldset>
</form>
</div>

{/block}
