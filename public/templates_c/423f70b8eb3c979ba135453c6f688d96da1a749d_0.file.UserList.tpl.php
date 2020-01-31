<?php
/* Smarty version 3.1.33, created on 2020-01-31 23:06:59
  from 'C:\xampp\htdocs\zespoly\app\views\UserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e34a5037605a7_78915345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '423f70b8eb3c979ba135453c6f688d96da1a749d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\UserList.tpl',
      1 => 1580508418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e34a5037605a7_78915345 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7086346005e34a503752b46_10136901', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2769696415e34a503755e76_77263318', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_7086346005e34a503752b46_10136901 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_7086346005e34a503752b46_10136901',
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
		<button type="submit" class="btn btn-info">Filtruj</button>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_2769696415e34a503755e76_77263318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_2769696415e34a503755e76_77263318',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<table id="tab_people" class="table table-striped table-darkk table-bordered">
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
</td><?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?><td><a class="btn btn-info" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserProfileEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['idclient'];?>
">Edytuj</a>&nbsp;<a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
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
