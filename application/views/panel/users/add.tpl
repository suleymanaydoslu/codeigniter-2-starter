{extends 'panel/layout/master2.tpl'}

{block name=content}
  <section id="container">
    <section id="main-content">
      <section class="wrapper" style="min-height:545px">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 alert alert-info text-center"><strong>ÜYE EKLE</strong></div>
        </div>
        {if isset($errorMessage)}
            <div class="alert alert-danger">{$errorMessage}</div>
        {/if}
        <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                  Üye Ekle
              </header>
              <div class="panel-body">
                <form class="form-horizontal" id="default" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="csrf_base" value="{$csrf_token}">
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Tc Kimlik No: </label>
                      <div class="col-lg-10">
                          <input type="text" name="tc_kimlik" class="form-control" value="{if isset($input_old)} {$input_old['tc_kimlik']} {else} {set_value('tc_kimlik')} {/if}" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Ad: </label>
                      <div class="col-lg-10">
                          <input type="text" name="firstname" class="form-control" value="{if isset($input_old)} {$input_old['firstname']} {else} {set_value('firstname')} {/if}" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Soyad: </label>
                      <div class="col-lg-10">
                          <input type="text" name="lastname" class="form-control" value="{if isset($input_old)} {$input_old['lastname']} {else} {set_value('lastname')} {/if}" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Email: </label>
                      <div class="col-lg-10">
                          <input type="text" name="email" class="form-control" value="{if isset($input_old)} {$input_old['email']} {else} {set_value('email')} {/if}" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-lg-2 control-label">Telefon: </label>
                      <div class="col-lg-10">
                          <input type="text" name="phone" class="form-control" value="{if isset($input_old)} {$input_old['phone']} {else} {set_value('phone')} {/if}">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-lg-2 control-label">Avatar: </label>
                      <div class="col-lg-10">
                          <input type="file" name="avatar" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-lg-2 control-label">Üyelik Tipi: </label>
                      <div class="col-lg-10">
                        <select name="type" class="form-control" required>
                          <option value="">Seçiniz</option>
                          <option value="1">Üye</option>
                          <option value="2">Yönetici</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-lg-2 control-label">Şifre </label>
                      <div class="col-lg-10">
                          <input type="password" name="password" class="form-control">
                      </div>
                  </div>

                  <input type="submit" class="finish btn btn-danger" value="Kaydet"/>
                </form>
              </div>
            </section>
            <div class="alert alert-warning">
              <i class="icon icon-warning-sign"></i> <strong>Lütfen varolan bir T.C. Kimlik numarası veya email adresi ile kullanıcı eklemeye çalışmayınız. Kullanıcı tipi seçiminiz çok önemlidir. Yanlışlıkla bir üyeye yönetici yetkisi vermek durumuyla karşı karşıya kalabilirsiniz.</strong>
            </div>
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