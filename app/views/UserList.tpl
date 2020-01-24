{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}UserList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="{$searchForm->surname}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}registrationShow">+ Dodaj uzytkownika</a>
</div>

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>login</th>
		<th>imie</th>
		<th>nazwisko</th>
		<th>email</th>
		<th>numer telefonu</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $clients as $c}
{strip}
	<tr>
		<td>{$c["login"]}</td>
		<td>{$c["name"]}</td>
		<td>{$c["surname"]}</td>
		<td>{$c["email"]}</td>
		<td>{$c["phone"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}UserProfileEdit/{$c['idclient']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}UserDelete/{$c['idclient']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
