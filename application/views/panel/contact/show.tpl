{extends 'panel/layout/master2.tpl'}

{block name=content}
<section id="container" >
  <section id="main-content">
    <section class="wrapper" style="min-height:545px">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 alert alert-success text-center"><strong>MESAJ OKU</strong> <small> </div>
        {if isset($errorMessage)}
            <div class="alert alert-danger">{$errorMessage}</div>
        {/if}
      </div>
      <div class="row">
        <div class="col-sm-12">
         	<div class="panel panel-primary">
						<div class="panel-heading">
							<strong>Gönderen :</strong> {$message->firstname} {$message->lastname} <br>
              <strong>Konu :</strong> {$message->topic}<br>
              <strong>Email :</strong> {$message->email}<br>
              <strong>Telefon : </strong> {$message->phone}<br>
              <strong>Tarih : </strong> {$message->created_at}
						</div>
						<div class="panel-body">
							<strong>Mesaj:</strong> <br>
								<h4>{$message->message}</h4>	
						</div>
						<div class="panel-footer text-center">
							<a href="{base_url('panel/contact/delete')}/{$message->id}"><button class="btn btn-md btn-danger">BU MESAJI SİL</button></a>
						</div>
					</div>
        </div>
      </div>
    </section>
  </section>
</section>

{/block}

{block name=extrajs}
  <script src="{base_url('assets/panel/js/jquery-1.8.3.min.js')}"></script>
  <script class="include" type="text/javascript" src="{base_url('assets/panel/js/jquery.dcjqaccordion.2.7.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.scrollTo.min.js')}"></script>
  <script src="{base_url('assets/panel/js/jquery.nicescroll.js')}" type="text/javascript"></script> 
  <script src="{base_url('assets/panel/js/common-scripts.js')}"></script>
{/block}