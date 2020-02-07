{extends file="main.tpl"}


{block name=bottom}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}BookedBandList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa kapeli" name="sf_bandname" value="" /><br />
		<button type="submit" class="btn btn-info">Filtruj</button>
	</fieldset>
</form>
</div>

<table id="tab_people" class="table table-striped table-darkk table-bordered">
<thead>
	<tr>
		<th>id wydarzenia</th>
		<th>nazwa kapeli</th>
		<th>login zamawiającego</th>
		<th>termin wydarzenia</th>
		<th>miejsce wydarzenia</th>
		<th>data złożenia rezerwacji</th>

         {if $currentRole eq 'admin'}
		<th>opcje</th>
        {/if}
	</tr>
</thead>
<tbody>
{foreach $calendary as $b}
{strip}
	<tr>
		<td>{$b["idcalendary"]}</td>
		<td>{$b["name"]}</td>
		<td>{$b["login"]}</td>
		<td>{$b["date"]}</td>
		<td>{$b["city"]}</td>
		<td>{$b["reservationDate"]}</td>

		{if $currentRole eq 'admin'}
        <td>
			<a class="btn btn-danger" href="{$conf->action_url}CalendaryDelete/{$b['idcalendary']}">Usuń</a>
		</td>
        {/if}
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
