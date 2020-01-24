<?php
/* Smarty version 3.1.33, created on 2020-01-24 17:27:09
  from 'C:\xampp\htdocs\zespoly\app\views\BandEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2b1addca2762_08510931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df699d5f5eda13b3545da3087b93322fd8b49a28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\BandEdit.tpl',
      1 => 1579883100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2b1addca2762_08510931 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3919542325e2b1addc9e3e2_06410537', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_3919542325e2b1addc9e3e2_06410537 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_3919542325e2b1addc9e3e2_06410537',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BandSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane zespolu</legend>
		<div class="pure-control-group">
            <label for="name">nazwa</label>
            <input id="name" type="text" placeholder="nazwa" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="surname">typ muzyki</label>
            <input id="surname" type="text" placeholder="typ muzyki" name="musictype" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->musictype;?>
">
        </div>
		<div class="pure-control-group">
            <label for="ishired">czy zajety</label>
            <select id ="ishired" name ="ishired" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ishired;?>
">
                <option>tak</option>
                <option>nie</option>
            </select>
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
BandList">Powrót</a>
		</div>
	</fieldset>
<input type="hidden" name="idband" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idband;?>
">
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
