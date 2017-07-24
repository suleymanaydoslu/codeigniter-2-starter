{extends 'panel/layout/master2.tpl'}

{block name=content}
<section id="container" >
  <section id="main-content">
    <section class="wrapper" style="min-height:545px">
      <div class="row">
        <div class="col-sm-12">
          <aside class="profile-info col-lg-10 col-lg-offset-1">
            {if isset($errorMessage)}
              <div class="alert alert-danger">{$errorMessage}</div>
            {elseif isset($successMessage)}
              <div class="alert alert-success">{$successMessage}</div>
            {/if}
            <section class="panel">
                <div class="bio-graph-heading">
                    
                </div>
                <div class="panel-body bio-graph-info">
                    <h1> PROFİL BİLGİLERİ GÜNCELLEME </h1>
                    <form class="form-horizontal" role="form" method="post" action="{base_url('panel/profile')}">
                      <input type="hidden" name="csrf_base" value="{$csrf_token}">
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Adı:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="firstname" value="{$user->firstname}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Soyadı:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="lastname" value="{$user->lastname}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Telefonu</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="telephone" value="{$user->telephone}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Email Adresi</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" value="{$user->email}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-success btn-block" name="profile_update" value="GÜNCELLE">GÜNCELLE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section>
              <div class="panel panel-primary">
                  <div class="panel-heading"> ŞİFRE GÜNCELLEME</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="post" action="{base_url('panel/profile')}">
                        <input type="hidden" name="csrf_base" value="{$csrf_token}">
                          <div class="form-group">
                              <label  class="col-lg-2 control-label">Yeni Şifre</label>
                              <div class="col-lg-10">
                                  <input type="password" class="form-control" name="pass" id="n-pwd">
                              </div>
                          </div>
                          <div class="form-group">
                              <label  class="col-lg-2 control-label">Yeni Şifreyi Tekrar Girin</label>
                              <div class="col-lg-10">
                                  <input type="password" class="form-control" name="pass_again" id="rt-pwd">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                  <button type="submit" class="btn btn-info btn-block" name="pass_update" value="GÜNCELLE">GÜNCELLE</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
            </section>
          </aside>
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