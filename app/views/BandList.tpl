{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}BandList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa zespolu" name="sf_name" value="{$searchForm->name}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}bandNew">+ Nowa osoba</a>
</div>

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>typ muzyki</th>
		<th>czy zajety</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $bands as $b}
{strip}
	<tr>
		<td>{$b["name"]}</td>
		<td>{$b["musictype"]}</td>
		<td>{$b["ishired"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}BandEdit/{$b['idband']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}BandDelete/{$b['idband']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
