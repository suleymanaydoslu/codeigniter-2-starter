{extends 'panel/layout/master2.tpl'}
{block name=extracss}
  <link href="{base_url('assets/panel/assets/advanced-datatable/media/css/demo_page.css')}" rel="stylesheet" />
  <link href="{base_url('assets/panel/assets/advanced-datatable/media/css/demo_table.css')}" rel="stylesheet" />
{/block}

{block name=content}
<section id="container" >
  <section id="main-content">
    <section class="wrapper" style="min-height:545px">
      <div class="row">
        <div class="col-sm-12">
          <aside class="profile-info col-lg-12">
          <section class="panel">
            <div class="bio-graph-heading">
                Kullanıcı Bilgileri
            </div>
            <div class="panel-body bio-graph-info">
                <h1>Profil Bilgileri</h1>
                <div class="row">
                  <div class="bio-row">
                      <p><span>Ad</span>: {$user->firstname}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Soyad</span>: {$user->lastname}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email</span>: {$user->email}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Telefon</span>: {$user->phone}</p>
                  </div>
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