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
        <div class="col-sm-10 col-sm-offset-1 alert alert-info text-center">
          <strong>MESAJLARI LİSTELE</strong> <small>{if $count<1} (Toplam:0) {else} (Toplam:{$count}) {/if}</small>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12">
          {if isset($errorMessage)}
              <div class="alert alert-danger">{$errorMessage}</div>
          {elseif isset($successMessage)}
              <div class="alert alert-success">{$successMessage}</div>
          {/if}
          {if $messages}
          <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="example">
              <thead>
              <tr>
                <th>No</th>
                <th>Gönderen</th>
                <th>Konu</th>
                <th>Gönderim Tarihi</th>
                <th>İşlem</th>
              </tr>
              </thead>
              <tbody>
              {foreach from=$messages key=k item=message}
                <tr>
                  <td>{$k+1}</td>
                  <td>{$message->firstname} {$message->lastname}</td>
                  <td>{$message->topic}</td>
                  <td>{$message->created_at}</td>
                  <td width="70">
                    <a class="btn btn-primary btn-xs" href="{base_url('panel/message/show')}/{$message->id}" data-toggle="tooltip" data-placement="bottom" title="Oku"><i class="icon-search"></i></a>
                    <a class="btn btn-danger btn-xs" href="{base_url('panel/message/delete')}/{$message->id}" data-toggle="tooltip" data-placement="bottom" title="Sil"><i class="icon-trash "></i></a>
                  </td>
                </tr>
              {/foreach}
              </tbody>
            </table>
          </div> 
          {else}
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gönderen</th>
                  <th>Konu</th>
                  <th>Gönderim Tarihi</th>
                  <th>İşlem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="5" class="alert alert-danger"> KAYIT YOK </td>
                </tr>
              </tbody>
            </table>
          {/if}
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
  <script type="text/javascript" language="javascript" src="{base_url('assets/panel/assets/advanced-datatable/media/js/jquery.dataTables.js')}"></script>
  <script type="text/javascript" charset="utf-8">

    $(document).ready(function() {
        $('#example').dataTable({
            "aaSorting": [[ 0, "asc" ]],
            "oLanguage": {
              "sSearch":"ARAMA",
              "sLengthMenu": "HER SAYFADA _MENU_ KAYIT GÖSTER",
              "sZeroRecords": "HİÇ BİR SONUÇ BULUNAMADI",
              "sInfo": "Toplam _TOTAL_ kayıttan _START_ ile _END_  arası gösteriliyor ",
              "sInfoEmpty": "0 Kayıt Bulunmakta",
              "sInfoFiltered": "(_MAX_ KAYIT İÇERİSİNDEN FİLTRELENDİ)",
              "oPaginate": {
                "sFirst": "İlk",
                "sLast": "Son",
                "sNext": "Sonraki",
                "sPrevious": "Önceki"
              }
            },
        });
        
        $('[data-toggle="tooltip"]').tooltip();
     });
  </script>
{/block}