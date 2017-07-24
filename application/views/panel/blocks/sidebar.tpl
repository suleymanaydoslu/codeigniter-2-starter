<aside>
  <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" id="nav-accordion">
      <li>
          <a {if $yol=='panel'} class="active" {/if} href="{base_url('panel')}">
              <i class="icon-dashboard"></i>
              <span>Anasayfa</span>
          </a>
      </li>
      <li class="sub-menu">
        <a {if ($yol=='user' || $yol=='users')} class="active" {/if} href="javascrpt:;">
            <i class="icon-user"></i>
            <span>Üyeler</span>
        </a>
        <ul class="sub">
            <li><a href="{base_url('panel/users')}">Üyeleri Listele</a></li>
            <li><a href="{base_url('panel/user/add')}">Üye Ekle</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a {if ($yol=='messages' || $yol=='message')} class="active" {/if} href="javascrpt:;">
            <i class="icon-envelope"></i>
            <span>Mesajlar</span>
        </a>
        <ul class="sub">
            <li><a href="{base_url('panel/messages')}">Mesajları Listele</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a {if ($yol=='pages' || $yol=='page')} class="active" {/if} href="javascrpt:;">
            <i class="icon-file"></i>
            <span>Sayfalar</span>
        </a>
        <ul class="sub">
            <li><a href="{base_url('panel/pages')}">Sayfaları Listele</a></li>
            <li><a href="{base_url('panel/page/add')}">Sayfa Ekle</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a {if ($yol=='settings' || $yol=='setting')} class="active" {/if} href="javascrpt:;">
            <i class="icon-cog"></i>
            <span>Ayarlar</span>
        </a>
        <ul class="sub">
            <li><a href="{base_url('panel/settings')}">Ayarları Listele</a></li>
        </ul>
      </li>
      <li class="menu">
        <a href="{base_url()}">
            <i class="icon-mail-forward"></i>
            <span>Siteye Git</span>
        </a>
      </li>
    </ul>
  </div>
</aside>