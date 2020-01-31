{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}BandList">
	<legend>Zarezerwuj zespol</legend>
</form>
</div>

{/block}

{block name=bottom}

<table id="tab_people" class="table table-striped table-darkk table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>wybierz datę</th>
		<th>Rezerwacja</th>
	</tr>
</thead>
<tbody>
<form action= "{$conf->action_url}ConfirmBookBand" method = "post" class="pure-form pure-form-aligned">
{foreach $bands as $b}

{strip}
	<tr>
		<td>{$b["name"]}</td>
		<td><input id="date" type="date" name="date" value=""/></td>
		<td>
			<input type="submit" class="btn btn-success" value="Rezerwuj">
		</td>
	</tr>
{/strip}
{/foreach}
</form>
</tbody>
</table>

{/block}
