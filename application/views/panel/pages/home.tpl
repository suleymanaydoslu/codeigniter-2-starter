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
          <strong>SAYFALARI LİSTELE</strong> <small>{if $count<1} (Toplam:0) {else} (Toplam:{$count}) {/if}</small>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12">
          {if isset($errorMessage)}
              <div class="alert alert-danger">{$errorMessage}</div>
          {elseif isset($successMessage)}
              <div class="alert alert-success">{$successMessage}</div>
          {/if}
          {if $pages}
          <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="example">
              <thead>
              <tr>
                <th>#</th>
                <th>Sayfa Adı</th>
                <th>Sayfu URL'i</th>
                <th>Eklenme Tarihi</th>
                <th>İşlem</th>
              </tr>
              </thead>
              <tbody>
              {foreach $pages key=k item=page}
                <tr>
                  <td>{$k+1}</td>
                  <td>{$page->title}</td>
                  <td>{$page->slug}</td>
                  <td>{$page->created_at}</td>
                  <td width="70">
                    <a class="btn btn-primary btn-xs" href="{base_url('panel/page/edit')}/{$page->id}" data-toggle="tooltip" data-placement="bottom" title="Düzenle"><i class="icon-pencil"></i></a>
                    {if $page->is_stocked!=1}
                    <a class="btn btn-danger btn-xs" href="{base_url('panel/page/delete')}/{$page->id}" data-toggle="tooltip" data-placement="bottom" title="Sil"><i class="icon-trash "></i></a>
                    {/if}
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
                  <th>#</th>
                  <th>Sayfa Adı</th>
                  <th>Sayfu URL'i</th>
                  <th>Eklenme Tarihi</th>
                  <th>İşlem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="4" class="alert alert-danger"> KAYIT YOK </td>
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