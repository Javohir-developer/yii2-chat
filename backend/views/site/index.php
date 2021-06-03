
<?php
$user = \Yii::$app->user->identity;
?>
<input type="hidden" class="user_id" value="<?=$user->id; ?>">
<div class="main-container sidebar-closed sbar-open" id="container">


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="chat-section layout-top-spacing">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="chat-system">
                            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                            <div class="user-list-box">
                                <div class="search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    <input type="text" class="form-control" placeholder="Search" />
                                </div>
                                <div class="people">
                                    <?php foreach ($users as $user1):?>
                                        <input type="hidden" class="partner_id" value="<?=$user1->id;?>">
                                    <div class="person" data-chat="person<?=$user1->id;?>">
                                        <div class="user-info">
                                            <div class="f-head">
                                                <img src="<?=\yii\helpers\Url::to(["admin/assets/img/diffa.png"], true)?>" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-info">
                                                    <span class="user-name" data-name="Sean Freeman"><?=$user->full_name;?></span>
<!--                                                    <span class="user-meta-time">2:09 PM</span>-->
                                                </div>
                                                <span class="preview">salom<?=$user1->id?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="chat-box">

                                <div class="chat-not-selected">
                                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Click User To Chat</p>
                                </div>
                                <div class="chat-box-inner">
                                    <div class="chat-meta-user">
                                        <div class="current-chat-user-name"><span><img src="<?=\yii\helpers\Url::to(["admin/assets/img/diffa.png"], true)?>" alt="dynamic-image"><span class="name"></span></span></div>

                                        <div class="chat-action-btn align-self-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone  phone-call-screen"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video video-call-screen"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle" href="apps_chat.html#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> Share</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-conversation-box">
                                        <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                                            <?php foreach ($users as $user1):?>
                                                <div class="chat" data-chat="person<?=$user1->id;?>">
                                                    <?php foreach ($posts as $post):?>
                                                        <?php
                                                            if ($user->id == $post->user_id){
                                                        ?>
                                                        <div class="bubble me"><?= $post->body.$post->user_id; ?></div>
                                                        <?php
                                                            }elseif ($user->id == $post->partner_id){
                                                        ?>
                                                        <div class="bubble you"><?= $post->body.$post->user_id; ?></div>
                                                        <?php
                                                            }
                                                        ?>
                                                    <?php endforeach;?>
                                                </div>
                                            <?php endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                <?php if($user->rule != 'User'): ?>
                                    <div class="chat-footer">
                                        <div class="chat-input">
                                            <form class="chat-form" action="javascript:void(0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                                <input type="text" class="mail-write-box messeng-text form-control" placeholder="Message"/>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>


