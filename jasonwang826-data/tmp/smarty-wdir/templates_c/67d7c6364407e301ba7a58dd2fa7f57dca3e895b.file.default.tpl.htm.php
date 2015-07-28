<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 04:21:05
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/pager/default.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:17242428355b692b14f66c3-43851864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67d7c6364407e301ba7a58dd2fa7f57dca3e895b' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/pager/default.tpl.htm',
      1 => 1438023279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17242428355b692b14f66c3-43851864',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pager' => 0,
    'i' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55b692b17e7bb5_25399860',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b692b17e7bb5_25399860')) {function content_55b692b17e7bb5_25399860($_smarty_tpl) {?><ul class="pager">
	<li class="total-rownum">共 <?php echo $_smarty_tpl->tpl_vars['pager']->value->rowNum;?>
 筆資料 /</li>
	<li class="total">共 <?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum;?>
 頁 /</li>
	<li class="jump">
		第
		<select class="goto-page">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pager']->value->pageNum+1 - (1) : 1-($_smarty_tpl->tpl_vars['pager']->value->pageNum)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value-1;?>
"<?php if (($_smarty_tpl->tpl_vars['i']->value-1)==$_smarty_tpl->tpl_vars['pager']->value->pageNo){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
			<?php }} ?>
		</select>
		頁 /
	</li>
	<li class="first<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo==0){?> disable<?php }?>" pageno="0">頂頁</li>
	<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo>0){?><li class="prev" pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNo-1;?>
">上頁</li><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNum<=10){?>
		<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int)ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['pager']->value->pageNum+1 - (1) : 1-($_smarty_tpl->tpl_vars['pager']->value->pageNum)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0){
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++){
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
			<li<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo==$_smarty_tpl->tpl_vars['p']->value-1){?> class="current active"<?php }?> pageno="<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</li>
		<?php }} ?>
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo<5){?>
			
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int)ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? 7+1 - (1) : 1-(7)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0){
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++){
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
				<li<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo==$_smarty_tpl->tpl_vars['p']->value-1){?> class="current active"<?php }?> pageno="<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</li>
			<?php }} ?>
			<li>...</li>
			<li pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-2;?>
"><?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-1;?>
</li>
			<li pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-1;?>
"><?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum;?>
</li>
		<?php }elseif($_smarty_tpl->tpl_vars['pager']->value->pageNo>$_smarty_tpl->tpl_vars['pager']->value->pageNum-6){?>
			
			<li pageno="0">1</li>
			<li pageno="1">2</li>
			<li>...</li>
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int)ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['pager']->value->pageNum+1 - ($_smarty_tpl->tpl_vars['pager']->value->pageNum-6) : $_smarty_tpl->tpl_vars['pager']->value->pageNum-6-($_smarty_tpl->tpl_vars['pager']->value->pageNum)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0){
for ($_smarty_tpl->tpl_vars['p']->value = $_smarty_tpl->tpl_vars['pager']->value->pageNum-6, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++){
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
				<li<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo==$_smarty_tpl->tpl_vars['p']->value-1){?> class="current active"<?php }?> pageno="<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</li>
			<?php }} ?>
		<?php }else{ ?>
			
			<li pageno="0">1</li>
			<li pageno="1">2</li>
			<li>...</li>
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int)ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['pager']->value->pageNo+3+1 - ($_smarty_tpl->tpl_vars['pager']->value->pageNo-1) : $_smarty_tpl->tpl_vars['pager']->value->pageNo-1-($_smarty_tpl->tpl_vars['pager']->value->pageNo+3)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0){
for ($_smarty_tpl->tpl_vars['p']->value = $_smarty_tpl->tpl_vars['pager']->value->pageNo-1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++){
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
				<li<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo==$_smarty_tpl->tpl_vars['p']->value-1){?> class="current active"<?php }?> pageno="<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</li>
			<?php }} ?>
			<li>...</li>
			<li pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-2;?>
"><?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-1;?>
</li>
			<li pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-1;?>
"><?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum;?>
</li>
		<?php }?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo+1<$_smarty_tpl->tpl_vars['pager']->value->pageNum){?><li class="next" pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNo+1;?>
">下頁</li><?php }?>
	<li class="last<?php if ($_smarty_tpl->tpl_vars['pager']->value->pageNo+1>=$_smarty_tpl->tpl_vars['pager']->value->pageNum){?> disable<?php }?>" pageno="<?php echo $_smarty_tpl->tpl_vars['pager']->value->pageNum-1;?>
">末頁</li>
</ul>
<?php }} ?>