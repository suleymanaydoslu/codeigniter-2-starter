{extends 'panel/layout/master2.tpl'}

{block name=content}
<section id="container" >
  <section id="main-content">
    <section class="wrapper" style="min-height:545px">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 alert alert-info text-center"><strong>SAYFA DÜZENLEME</strong></div>
        <div class="clearfix"></div>
        {if isset($errorMessage)}
          <div class="col-sm-12"> 
            <div class="alert alert-danger">{$errorMessage}</div>
          </div>
        {else if isset($errorMessage_image)}
          <div class="col-sm-12"> 
            <div class="alert alert-danger">{$errorMessage_image['error']}</div>
          </div>
        {/if}
      </div>
      <div class="row">
        <div class="col-sm-12">
          <section class="panel">
            <header class="panel-heading">
                Sayfa Düzenle
            </header>
            <div class="panel-body">
              <form class="form-horizontal" id="default" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_base" value="{$csrf_token}">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Sayfa Title'ı:</label>
                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control" value="{$page->title}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Meta Keywords</label>
                    <div class="col-lg-10">
                        <input type="text" name="meta_keywords" class="form-control" value="{$page->keywords}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Meta Description</label>
                    <div class="col-lg-10">
                        <input type="text" name="meta_description" class="form-control" value="{$page->description}">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-lg-2 control-label">Sayfa İçeriği</label>
                    <div class="col-lg-10">
                        <textarea name="content" class="ckeditor">{$page->content}</textarea>
                    </div>
                </div>     

                <input type="submit" class="finish btn btn-danger" value="DÜZENLE"/>
              </form>
            </div>
          </section>
          <div class="alert alert-warning">
            <i class="icon icon-warning-sign"></i> <strong> Sayfanızın adresi "sayfa adı" kısmından türetilecektir. (Örneğin; deneme yazarsanız
            http://www.siteadresi.com/deneme olacaktır.) Lütfen daha önce var olan bir sayfa adı girmemeye dikkat ediniz.</strong>
          </div>
        </div>
      </div>
    </section>
  </section>
</section>

{/block}

{block name=extrajs}
  <script src="{base_url('assets/panel/assets/ckeditor-office/ckeditor.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery-1.8.3.min.js')}"></script>
  <script class="include" type="text/javascript" src="{base_url('assets/panel/js/jquery.dcjqaccordion.2.7.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.scrollTo.min.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.nicescroll.js')}" type="text/javascript"></script> 
  <script src="{base_url('assets/panel/js/common-scripts.js')}"></script>

{/block}