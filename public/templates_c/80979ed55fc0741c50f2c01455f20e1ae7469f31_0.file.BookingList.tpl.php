<?php
/* Smarty version 3.1.33, created on 2020-01-31 22:28:48
  from 'C:\xampp\htdocs\zespoly\app\views\BookingList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e349c10566226_06213621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80979ed55fc0741c50f2c01455f20e1ae7469f31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\BookingList.tpl',
      1 => 1580506126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e349c10566226_06213621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19866091745e349c10556441_87488733', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_19866091745e349c10556441_87488733 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_19866091745e349c10556441_87488733',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>id wydarzenia</th>
		<th>id kapeli</th>
		<th>id klienta</th>
		<th>data</th>

         <?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?>
		<th>opcje</th>
        <?php }?>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendary']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['b']->value["idcalendary"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["idband"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["idclient"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["date"];?>
</td><?php if ($_smarty_tpl->tpl_vars['currentRole']->value == 'admin') {?><td><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
CalendaryDelete/<?php echo $_smarty_tpl->tpl_vars['b']->value['idcalendary'];?>
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
