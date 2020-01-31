<?php
/* Smarty version 3.1.33, created on 2020-01-31 22:33:55
  from 'C:\xampp\htdocs\zespoly\app\views\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e349d432a4a96_50748950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '423f70b8eb3c979ba135453c6f688d96da1a749d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\UserList.tpl',
      1 => 1580506433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e349d432a4a96_50748950 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11319453695e349d432971a1_02883847', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2601818005e349d4329a703_79339821', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_11319453695e349d432971a1_02883847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_11319453695e349d432971a1_02883847',
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
class Block_2601818005e349d4329a703_79339821 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_2601818005e349d4329a703_79339821',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>login</th>
		<th>imie</th>
		<?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?>
		<th>nazwisko</th>
		<th>numer telefonu</th>
		<?php }?>
		<th>email</th>
		<?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?>
		<th>opcje</th>
		<?php }?>
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
</td><?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?><td><?php echo $_smarty_tpl->tpl_vars['c']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["phone"];?>
</td><?php }?><td><?php echo $_smarty_tpl->tpl_vars['c']->value["email"];?>
</td><?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserProfileEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['idclient'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['idclient'];?>
">Usuń</a></td><?php }?></tr>
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
