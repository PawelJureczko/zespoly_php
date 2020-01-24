<?php
/* Smarty version 3.1.33, created on 2020-01-24 17:56:26
  from 'C:\xampp\htdocs\zespoly\app\views\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2b21ba3a5802_83290741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '423f70b8eb3c979ba135453c6f688d96da1a749d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\UserList.tpl',
      1 => 1579884984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2b21ba3a5802_83290741 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19391372315e2b21ba2e82c0_11251326', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5510483355e2b21ba338923_98326756', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_19391372315e2b21ba2e82c0_11251326 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_19391372315e2b21ba2e82c0_11251326',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_5510483355e2b21ba338923_98326756 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_5510483355e2b21ba338923_98326756',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registrationShow">+ Dodaj uzytkownika</a>
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["email"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["phone"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserProfileEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['idclient'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['idclient'];?>
">Usuń</a></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
