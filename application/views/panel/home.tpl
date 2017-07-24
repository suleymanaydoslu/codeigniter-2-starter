{extends 'panel/layout/master2.tpl'}

{block name=content}
  <section id="container" >
    <section id="main-content">
      <section class="wrapper" style="min-height:545px">
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                        {if $user_count}
                          {$user_count}
                        {else}
                          0
                        {/if}
                        </h1>
                        <p>Üye Sayısı</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-info text-center">
                <strong>SON GELEN 5 MESAJ</strong>
              </div>
              <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Gönderen</th>
                  <th>Konu</th>
                  <th>Tarih</th>
                  <th>İşlem</th>
                </thead>
                <tbody>
                  {if $messages}
                    {foreach from=$messages key=k item=message}
                      <tr>
                        <td>{$k+1}</td>
                        <td>{$message->firstname} {$message->lastname}</td>
                        <td>{$message->topic}</td>
                        <td>{$message->created_at}</td>
                        <td><a href="{base_url('panel/message/show')}/{$message->id}" class="btn btn-primary"><i class="icon icon-search"></i> Görüntüle</a></td>
                      </tr>
                    {/foreach}
                  {else}
                    <tr class="text-center">
                      <td colspan="5"><strong>Gelen Kutusu Boş</strong></td>
                    </tr>
                  {/if}
                </tbody>
              </table>
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