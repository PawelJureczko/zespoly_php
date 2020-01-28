{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}BandList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="rodzaj muzyki" name="sf_musictype" value="{$searchForm->musictype}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}BandNew">+ Dodaj zespol</a>
</div>

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>typ muzyki</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $bands as $b}
{strip}
	<tr>
		<td>{$b["name"]}</td>
		<td>{$b["musictype"]}</td>
		<td>
		{if $currentRole eq 'admin'}
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}BandEdit/{$b['idband']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}BandDelete/{$b['idband']}">Usuń</a>
			<a class="button-small pure-button button-primary" href="{$conf->action_url}BookBand/{$b['idband']}">Rezerwuj</a>
		{else}
			<a class="button-small pure-button button-primary" href="{$conf->action_url}BookBand/{$b['idband']}">Rezerwuj</a>
			{/if}
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
