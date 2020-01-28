<?php
/* Smarty version 3.1.33, created on 2020-01-28 20:35:02
  from 'C:\xampp\htdocs\zespoly\app\views\BandList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e308ce63a4fb9_61528219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9b9ca3a21ae1e86d82a00e7e8f116ee7bf529f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\BandList.tpl',
      1 => 1580240099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e308ce63a4fb9_61528219 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7815024965e308ce6395b56_17805897', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13843109745e308ce6399b85_66885138', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_7815024965e308ce6395b56_17805897 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_7815024965e308ce6395b56_17805897',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BandList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="rodzaj muzyki" name="sf_musictype" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->musictype;?>
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
class Block_13843109745e308ce6399b85_66885138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_13843109745e308ce6399b85_66885138',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BandNew">+ Dodaj zespol</a>
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bands']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['b']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["musictype"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BandEdit/<?php echo $_smarty_tpl->tpl_vars['b']->value['idband'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BandDelete/<?php echo $_smarty_tpl->tpl_vars['b']->value['idband'];?>
">Usuń</a><a class="button-small pure-button button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BookBand/<?php echo $_smarty_tpl->tpl_vars['b']->value['idband'];?>
">Rezerwuj</a><?php } else { ?><a class="button-small pure-button button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BookBand/<?php echo $_smarty_tpl->tpl_vars['b']->value['idband'];?>
">Rezerwuj</a><?php }?></td></tr>
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
