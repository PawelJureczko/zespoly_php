{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}BandSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane zespolu</legend>
		<div class="pure-control-group">
            <label for="name">nazwa</label>
            <input id="name" type="text" placeholder="nazwa" name="name" value="{$form->name}">
        </div>
		<div class="pure-control-group">
            <label for="surname">typ muzyki</label>
            <input id="surname" type="text" placeholder="typ muzyki" name="musictype" value="{$form->musictype}">
        </div>
		<div class="pure-control-group">
            <label for="ishired">czy zajety</label>
            <select id ="ishired" name ="ishired" value="{$form->ishired}">
                <option>tak</option>
                <option>nie</option>
            </select>
        </div>
		<div class="pure-controls">
			<input type="submit" class="btn btn-success" value="Zapisz"/>
			<a class="btn btn-link btn btn-outline-dark" href="{$conf->action_root}BandList">Powrót</a>
		</div>
	</fieldset>
<input type="hidden" name="idband" value="{$form->idband}">
</form>
</div>

{/block}
