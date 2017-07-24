{extends 'panel/layout/master.tpl'}

{block name=content}
  <div class="container">
    <form class="form-signin" action="{base_url('panel/login')}" method="post">
      <h2 class="form-signin-heading">CODEIGNITER 2 STARTER PROJECT</h2>
      <div class="login-wrap">
        {if isset($errorMessage)}
          <div class="alert alert-danger">{$errorMessage}</div>
        {/if}
        <input type="hidden" name="csrf_base" value="{$csrf_token}">
        <input type="text" name="email" class="form-control" placeholder="Email Adresi" autofocus>
        <input type="password" name="password" class="form-control" placeholder="Şifre">
        <button class="btn btn-lg btn-login btn-block" type="submit">Giriş Yap</button>
        <p class="block-help">ADMIN PANEL</p>
      </div>
    </form>
  </div>
{/block}
