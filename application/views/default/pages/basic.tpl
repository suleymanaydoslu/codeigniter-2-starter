{extends 'default/layout/master.tpl'}

{block name=content}
<section>
  <article>
    <div class="row">
      <div class="col-lg-12">
        <div class="thumbnail">
           {$page_data->content}
        </div>
      </div>
    </div>
  </article>
</section>
{/block}