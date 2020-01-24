<?php
/* Smarty version 3.1.33, created on 2020-01-24 17:11:08
  from 'C:\xampp\htdocs\zespoly\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2b171cbc00d8_02667447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36eeba7d53b32ca3f88400c6049f5cbf8cf6706c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\LoginView.tpl',
      1 => 1579688613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2b171cbc00d8_02667447 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8298248715e2b171cbbca12_78394586', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_8298248715e2b171cbbca12_78394586 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_8298248715e2b171cbbca12_78394586',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registrationShow" class="pure-form pure-form alighed bottom-margin">
	<div class="pure-controls">
	<input type="submit" value="rejestracja" class="pure-button pure-button-primary">
	</div>
</form>
<?php
}
}
/* {/block 'top'} */
}
