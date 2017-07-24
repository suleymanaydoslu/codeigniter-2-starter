{extends 'panel/layout/master2.tpl'}

{block name=extracss}
<link rel="stylesheet" type="text/css" href="{base_url('assets/panel/css/jquery.datetimepicker.css')}"/ >
{/block}

{block name=content}
  <section id="container">
    <section id="main-content">
      <section class="wrapper" style="min-height:545px">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 alert alert-info text-center"><strong>AYAR DÜZENLE</strong></div>
        </div>
        {if isset($errorMessage)}
            <div class="alert alert-danger">{$errorMessage}</div>
        {/if}
        <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                  Ayar Düzenle
              </header>
              <div class="panel-body">
                <form class="form-horizontal" id="default" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="csrf_base" value="{$csrf_token}">
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Ayar Adı: </label>
                      <div class="col-lg-10">
                          <input type="text" name="title" class="form-control" value="{$setting->title}" required disabled="disabled">
                      </div>
                  </div>

                  {if $setting->key == 'banner'}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Mevcut Görsel: </label>
                        <div class="col-lg-10">
                            <img src="{base_url($setting->value)}" class="img img-responsive" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Görsel: <br> <small>(Değiştirmek isterseniz)</small> </label>
                        <div class="col-lg-10">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                  {else}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Değer: </label>
                        <div class="col-lg-10">
                            <textarea name="value" class="form-control">{$setting->value}</textarea>
                        </div>
                    </div>
                  {/if}

                  <input type="submit" class="finish btn btn-danger" value="GÜNCELLE"/>
                </form>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
  </section>
{/block}

{block name=extrajs}
  <script src="{base_url('assets/panel/js/jquery-1.8.3.min.js')}"></script>
  <script src="{base_url('assets/panel/js/bootstrap.min.js')}"></script>
  <script class="include" type="text/javascript" src="{base_url('assets/panel/js/jquery.dcjqaccordion.2.7.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.scrollTo.min.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.nicescroll.js')}" type="text/javascript"></script> 
  <script src="{base_url('assets/panel/js/common-scripts.js')}"></script>
{/block}