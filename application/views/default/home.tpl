{extends 'default/layout/master.tpl'}

{block name=content}
	<p>Sayfa contenti : {$page_data->content}</p>
	<p>Dil denemesi : {lang('deneme')}</p>
	<a href="{base_url('changeLang/english')}">English</a>
	<a href="{base_url('changeLang/turkish')}">Türkçe</a>
{/block}