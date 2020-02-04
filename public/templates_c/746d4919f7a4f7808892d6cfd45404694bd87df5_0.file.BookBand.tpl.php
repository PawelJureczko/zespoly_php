<?php
/* Smarty version 3.1.33, created on 2020-02-04 11:27:07
  from 'C:\xampp\htdocs\zespoly\app\views\BookBand.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3946fb73b295_87449732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '746d4919f7a4f7808892d6cfd45404694bd87df5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\BookBand.tpl',
      1 => 1580812026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3946fb73b295_87449732 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15367506125e3946fb732e60_86547870', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10857534165e3946fb735d81_41551959', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_15367506125e3946fb732e60_86547870 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_15367506125e3946fb732e60_86547870',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
BandList">
	<legend>Zarezerwuj zespół</legend>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_10857534165e3946fb735d81_41551959 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_10857534165e3946fb735d81_41551959',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<table id="tab_people" class="table table-striped table-darkk table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Wybierz datę</th>
		<th>Miejscowość</th>
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
</td><td><input id="date" type="date" name="date" value=""></td><td><input id="city" typ="text" name="city" placeholder="nazwa miasta" value=""></td><td><input type="submit" class="btn btn-success" value="Rezerwuj"></td></tr>
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
