<?php
/* Smarty version 3.1.33, created on 2020-01-28 19:37:35
  from 'C:\xampp\htdocs\zespoly\app\views\BookBand.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e307f6f301419_99222506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '746d4919f7a4f7808892d6cfd45404694bd87df5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\BookBand.tpl',
      1 => 1580236413,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e307f6f301419_99222506 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11139977395e307f6f2f8c15_96533191', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20365662025e307f6f2fbcb8_76266365', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_11139977395e307f6f2f8c15_96533191 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_11139977395e307f6f2f8c15_96533191',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BandList">
	<legend>Zarezerwuj zespol</legend>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_20365662025e307f6f2fbcb8_76266365 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_20365662025e307f6f2fbcb8_76266365',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>wybierz datę</th>
		<th>Rezerwacja</th>
	</tr>
</thead>
<tbody>
<form action= "<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
ConfirmBookBand" method = "post" class="pure-form pure-form-aligned">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bands']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>

<tr><td><?php echo $_smarty_tpl->tpl_vars['b']->value["name"];?>
</td><td><input id="date" type="date" name="date" value=""/></td><td><input type="submit" class="button-small pure-button button-secondary" value="Rezerwuj"></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</form>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
