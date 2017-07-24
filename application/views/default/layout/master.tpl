<!DOCTYPE html>
<html lang="en">
  <head>
    {include 'default/blocks/head.tpl'}
    {block name=extracss}{/block}
  </head>
  <body>
			{include 'default/blocks/header.tpl'}
      
      {include 'default/blocks/sidebar.tpl'}

      {block name=content}{/block} 
      
      {include 'default/blocks/footer.tpl'}
    	{include 'default/blocks/scripts.tpl'}
      
      {block name=extrajs}{/block}
  </body>
</html>