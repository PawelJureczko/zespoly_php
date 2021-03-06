<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Rezerwacja terminow zespolow</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>

<body style="margin: 20px; background-color: #F9F8F8;" >

<div class="pure-menu pure-menu-horizontal bottom-margin">
{if count($conf->roles)>0}
	<a href="{$conf->action_root}userProfile" class="pure-menu-heading pure-menu-link">Moj profil</a>
	<a href="{$conf->action_root}BandList" class="pure-menu-heading pure-menu-link">Lista Zespolow</a>
	<a href="{$conf->action_root}UserList" class="pure-menu-heading pure-menu-link">Lista uzytkownikow</a>
	<a href="{$conf->action_root}BookedBandList" class="pure-menu-heading pure-menu-link">Lista rezerwacji</a>
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
	<a class="pure-menu-heading">Zalogowany jako&nbsp:&nbsp&nbsp&nbsp{$currentUser}</a>

{/if}

</div>

{block name=top} {/block}

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}

</body>

</html>