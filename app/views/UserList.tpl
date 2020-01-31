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

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>login</th>
		<th>imie</th>
		{if $currentRole eq 'admin'}
		<th>nazwisko</th>
		<th>numer telefonu</th>
		{/if}
		<th>email</th>
		{if $currentRole eq 'admin'}
		<th>opcje</th>
		{/if}
	</tr>
</thead>
<tbody>
{foreach $clients as $c}
{strip}
	<tr>
		<td>{$c["login"]}</td>
		<td>{$c["name"]}</td>
		{if $currentRole eq 'admin'}
		<td>{$c["surname"]}</td>
		<td>{$c["phone"]}</td>
		{/if}
		<td>{$c["email"]}</td>
		{if $currentRole eq 'admin'}
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}UserProfileEdit/{$c['idclient']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}UserDelete/{$c['idclient']}">Usuń</a>
		</td>
		{/if}
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
