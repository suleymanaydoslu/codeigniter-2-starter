{extends 'panel/layout/master2.tpl'}

{block name=content}
    <section id="container">
        <section id="main-content">
            <section class="wrapper" style="min-height:545px">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 alert alert-info text-center"><strong>POST DÜZENLE</strong></div>
                </div>
                {if isset($errorMessage)}
                    <div class="alert alert-danger">{$errorMessage}</div>
                {/if}
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Post Düzenle
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal" id="default" action="{base_url('panel/post/update')}/{$post->id}"
                                      method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="csrf_base" value="{$csrf_token}">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Başlık: </label>
                                        <div class="col-lg-10">
                                            <input type="text" name="title" class="form-control"
                                                   value="{$post->title}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Açıklama: </label>
                                        <div class="col-lg-10">
                                            <input type="text" name="description" class="form-control"
                                                   value="{$post->description}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Yayın Durumu: </label>
                                        <div class="col-lg-10">
                                            <select name="status" class="form-control">
                                                <option value="">Seç</option>
                                                <option value="0" {if $post->status == 0} selected {/if}>Pasif</option>
                                                <option value="1" {if $post->status == 1} selected {/if}>Taslak</option>
                                                <option value="2" {if $post->status == 2} selected {/if}>Yayında
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Yayın Durumu: </label>
                                        <div class="col-lg-10">
                                            <textarea name="content" id="ckeditor" class="ckeditor"
                                                      rows="10">{htmlspecialchars($post->content)}</textarea>
                                        </div>
                                    </div>

                                    <input type="submit" class="finish btn btn-danger" value="Kaydet"/>
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
    <script class="include" type="text/javascript"
            src="{base_url('assets/panel/js/jquery.dcjqaccordion.2.7.js')}"></script>
    <script src="{base_url('assets/panel/js/jquery.scrollTo.min.js')}"></script>
    <script src="{base_url('assets/panel/js/jquery.nicescroll.js')}" type="text/javascript"></script>
    <script src="{base_url('assets/panel/js/common-scripts.js')}"></script>
    <script src="{base_url('assets/panel/assets/ckeditor-office/ckeditor.js')}"></script>
    <script>
        CKEDITOR.replace('ckeditor',{
            height: '300px',
            extraPlugins: 'codesnippet',
            codeSnippet_theme: 'solarized_dark'
        });
    </script>
{/block}