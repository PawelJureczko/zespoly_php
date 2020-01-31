{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}BandList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="rodzaj muzyki" name="sf_musictype" value="{$searchForm->musictype}" /><br />
		<button type="submit" class="btn btn-info">Filtruj</button>
	</fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="btn btn-success" href="{$conf->action_root}BandNew">+ Dodaj zespol</a>
</div>

<table id="tab_people" class="table table-striped table-darkk table-bordered">
<thead>
	<tr>
		<th scope="col">nazwa</th>
		<th scope="col">typ muzyki</th>
		<th scope="col">opcje</th>
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
			<a class="btn btn-success" href="{$conf->action_url}BookBand/{$b['idband']}">Rezerwuj</a>
			&nbsp;
			<a class="btn btn-info" href="{$conf->action_url}BandEdit/{$b['idband']}">Edytuj</a>
			&nbsp;
			<a class="btn btn-danger" href="{$conf->action_url}BandDelete/{$b['idband']}">Usuń</a>

		{else}
			<a class="btn btn-success" href="{$conf->action_url}BookBand/{$b['idband']}">Rezerwuj</a>
			{/if}
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
