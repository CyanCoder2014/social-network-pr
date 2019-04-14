@extends('layouts.layout')

@section('content')



    <ul role="tablist" class="nav nav-tabs panel-tab-btn">
        <li class="active"><a data-toggle="tab" role="tab" data-target="#panel-tab1"><i class="ti-email"></i><span>Your Emails</span></a></li>
        <li><a data-toggle="tab" role="tab" data-target="#panel-tab2"><i class="ti-settings"></i><span>Your Setting</span></a></li>
    </ul>
    <div class="tab-content panel-tab">
        <div id="panel-tab1" class="tab-pane fade in active">
            <div class="recent-mails-widget">
                <form><div id="searchMail"></div></form>
                <h3>Recent Emails</h3>
                <ul id="mail-list" class="mail-list">
                    <li>
                        <div class="title">
                            <span><img src="http://placehold.it/40x40" alt="" /><i class="online"></i></span>
                            <h3><a href="javascript:void(0)" title="">Kim Hostwood</a><span>5 min ago</span></h3>
                            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="ti-clip"></i></a>
                        </div>
                        <h4>Themeforest Admin Template</h4>
                        <p>This product is so good that i manage to buy.</p>
                    </li>
                    <li>
                        <div class="title">
                            <span><img src="http://placehold.it/40x40" alt="" /><i class="online"></i></span>
                            <h3><a href="javascript:void(0)" title="">John Doe</a><span>2 hours ago</span></h3>
                            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="ti-clip"></i></a>
                        </div>
                        <h4>Themeforest Admin Template</h4>
                        <p>This product is so good that i manage to buy.</p>
                    </li>
                    <li>
                        <div class="title">
                            <span><img src="http://placehold.it/40x40" alt="" /><i class="offline"></i></span>
                            <h3><a href="javascript:void(0)" title="">Jonathan Doe</a><span>8 min ago</span></h3>
                            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="ti-clip"></i></a>
                        </div>
                        <h4>Themeforest Admin Template</h4>
                        <p>This product is so good that i manage to buy.</p>
                    </li>
                </ul>
                <a href="#/pages/inbox" title="" class="red-bg">View All Messages</a>
            </div><!-- Recent Email Widget -->

            <div class="file-transfer-widget">
                <h3>FILE TRANSFER</h3>
                <div class="toggle">
                    <ul>
                        <li>
                            <i class="ti-file"></i><h4>my-excel.xls<i>20 min ago</i></h4>
                            <div class="progress">
                                <div style="width: 90%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar red-bg">
                                    90%
                                </div>
                            </div>
                            <div class="file-action-btn">
                                <a href="javascript:void(0)" title="Approve" class="green-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)" title="Cancel" class="red-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-close"></i></a>
                            </div>
                        </li>
                        <li>
                            <i class="ti-zip"></i><h4>my-cv.pdf<i>8 min ago</i></h4>
                            <div class="progress">
                                <div style="width: 40%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar blue-bg">
                                    40%
                                </div>
                            </div>
                            <div class="file-action-btn">
                                <a href="javascript:void(0)" title="Approve" class="green-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)" title="Cancel" class="red-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-close"></i></a>
                            </div>
                        </li>
                        <li>
                            <i class="ti-files"></i><h4>portfolio-shoot.mp4<i>12 min ago</i></h4>
                            <div class="progress">
                                <div style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar green-bg">
                                    70%
                                </div>
                            </div>
                            <div class="file-action-btn">
                                <a href="javascript:void(0)" title="Approve" class="green-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)" title="Cancel" class="red-bg" data-toggle="tooltip" data-placement="bottom"><i class="ti-close"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- File Transfer -->
        </div>
        <div id="panel-tab2" class="tab-pane fade">
            <div class="setting-widget">
                <form>
                    <h3>Accounts</h3>
                    <div class="toggle-setting">
                        <span>Office Account</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>Personal Account</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>Business Account</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                </form>

                <form>
                    <h3>General Setting</h3>
                    <div class="toggle-setting">
                        <span>Notifications</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>Notification Sound</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>My Profile</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>Show Online</span>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                    <div class="toggle-setting">
                        <span>Public Profile</span>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span data-unchecked="Off" data-checked="On"></span>
                        </label>
                    </div>
                </form>
            </div><!-- Setting Widget -->
        </div>
    </div>



    <ul class="breadcrumbs">
        <li><a href="javascript:void(0)" title="">Home</a></li>
        <li>Task Simple</li>
    </ul>
    <div class="main-content-area">
        <div class="row">
            <div class="col-md-12">
                <div class="tdl-holder">
                    <div class="tdl-content">
                        <ul>
                            <li><label><input type="checkbox"><i></i><span>get up</span><a href='#'>–</a></label></li>
                            <li><label><input type="checkbox" checked><i></i><span>stand up</span><a href='#'>–</a></label></li>
                            <li><label><input type="checkbox"><i></i><span>don't give up the fight.</span><a href='#'>–</a></label></li>
                            <li><label><input type="checkbox" checked><i></i><span>save the world.</span><a href='#'>–</a></label></li>
                        </ul>
                    </div>
                    <input type="text" class="tdl-new" placeholder="Write new item and hit 'Enter'...">
                </div>
            </div>
        </div>
    </div>




    <script src="<?= Url('assets/js/jquery2.min.js'); ?>"></script>
    <script src="<?= Url('assets/js/message-chat.js'); ?>"></script>


      @endsection