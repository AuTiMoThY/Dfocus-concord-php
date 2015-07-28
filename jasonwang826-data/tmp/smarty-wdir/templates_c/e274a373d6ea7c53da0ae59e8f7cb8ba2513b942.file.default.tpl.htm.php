<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 04:20:42
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/vercode/default.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:93761478155b6929a61a626-01703590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e274a373d6ea7c53da0ae59e8f7cb8ba2513b942' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/vercode/default.tpl.htm',
      1 => 1438023279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93761478155b6929a61a626-01703590',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'id' => 0,
    'value' => 0,
    'class' => 0,
    'style' => 0,
    'case_sensitive' => 0,
    'length' => 0,
    'instance_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55b6929a770ef3_65379631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b6929a770ef3_65379631')) {function content_55b6929a770ef3_65379631($_smarty_tpl) {?><table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<input name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" placeholder="驗證碼" class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" style="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
<?php if ($_smarty_tpl->tpl_vars['case_sensitive']->value=='N'){?>text-transform: uppercase;<?php }?>" size="<?php echo $_smarty_tpl->tpl_vars['length']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['length']->value;?>
" autocomplete="off" />
			<input name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
_instance_id" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_instance_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['instance_id']->value;?>
" autocomplete="off" />
		</td>
		<td>&nbsp;</td>
		<td>
			<img src="/jasonwang826/images/vercode.php?instance_id=<?php echo $_smarty_tpl->tpl_vars['instance_id']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_image"  align="absmiddle" border="0" style="cursor:pointer; border:solid 1px gray; padding:1px;" onclick="this.src='/jasonwang826/images/vercode.php?instance_id=<?php echo $_smarty_tpl->tpl_vars['instance_id']->value;?>
&t='+(new Date().getTime())+Math.random();" title="點選此連結重新產生新的驗證碼" />
		</td>
	</tr>
</table>
<?php }} ?>