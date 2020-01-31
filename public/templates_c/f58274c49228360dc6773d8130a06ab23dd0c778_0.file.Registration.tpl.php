<?php
/* Smarty version 3.1.33, created on 2020-01-31 23:19:58
  from 'C:\xampp\htdocs\zespoly\app\views\Registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e34a80ea25b02_33437041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f58274c49228360dc6773d8130a06ab23dd0c778' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\Registration.tpl',
      1 => 1580509196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e34a80ea25b02_33437041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7242940265e34a80ea225f5_21090823', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_7242940265e34a80ea225f5_21090823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_7242940265e34a80ea225f5_21090823',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registrationSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wypelnij formularz rejestracji:</legend>
		<div class="pure-control-group">
            <label for="login">login</label>
            <input id="name" type="text" placeholder="login" name="login" value="">
        </div>
		<div class="pure-control-group">
            <label for="password">haslo</label>
            <input id="password" type="password" placeholder="haslo" name="password" value="">
        </div>
		<div class="pure-control-group">
            <label for="passwordrepeated">powtorz haslo</label>
            <input id="passwordrepeated" type="password" placeholder="powtorz haslo" name="passwordrepeated" value="">
        </div>
        <div class="pure-control-group">
            <label for="name">imie</label>
            <input id ="name" name ="name" placeholder="imie" value="">
        </div>
        <div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id ="surname" name ="surname" placeholder="nazwisko" value="">
        </div>
        <div class="pure-control-group">
            <label for="email">adres email</label>
            <input id ="email" name ="email" placeholder="e-mail" value="">
        </div>
		<div class="pure-control-group">
            <label for="phone">numer telefonu</label>
            <input id ="phone" name ="phone" placeholder="numer telefonu" value="">
        </div>
		<div class="pure-controls">
			<input type="submit" class="btn btn-success" value="Zapisz"/>
			<a class="btn btn-info" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Powrót</a>
		</div>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
