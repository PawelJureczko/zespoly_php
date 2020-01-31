{extends file="main.tpl"}


{block name=bottom}

<table id="tab_people" class="table table-striped table-darkk table-bordered">
<thead>
	<tr>
		<th>id wydarzenia</th>
		<th>id kapeli</th>
		<th>id klienta</th>
		<th>data</th>

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
		<td>{$b["idband"]}</td>
		<td>{$b["idclient"]}</td>
		<td>{$b["date"]}</td>

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
