
@extends('layouts.admin')

@section('admin_content')

<? echo 'fdhfg';  ?>

    <!--PAGE CONTENT -->
    <div id="content">

        <div class="inner" style="min-height: 700px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1> داشبورد </h1>
                </div>
            </div>
            <hr />
            <!--BLOCK SECTION -->
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center;">

                        <a class="quick-btn" href="#">
                            <i class="icon-check icon-2x"></i>
                            <span> محصولات</span>
                            <span class="label label-danger">2</span>
                        </a>

                        <a class="quick-btn" href="#">
                            <i class="icon-envelope icon-2x"></i>
                            <span>پیغام ها</span>
                            <span class="label label-success">456</span>
                        </a>
                        <a class="quick-btn" href="#">
                            <i class="icon-signal icon-2x"></i>
                            <span>سود</span>
                            <span class="label label-warning">+25</span>
                        </a>
                        <a class="quick-btn" href="#">
                            <i class="icon-external-link icon-2x"></i>
                            <span>ارزش</span>
                            <span class="label btn-metis-2">3.14159265</span>
                        </a>
                        <a class="quick-btn" href="#">
                            <i class="icon-lemon icon-2x"></i>
                            <span>وظایف</span>
                            <span class="label btn-metis-4">107</span>
                        </a>
                        <a class="quick-btn" href="#">
                            <i class="icon-bolt icon-2x"></i>
                            <span>تیکت ها</span>
                            <span class="label label-default">20</span>
                        </a>



                    </div>

                </div>

            </div>
            <!--END BLOCK SECTION -->
            <hr />
            <!-- CHART & CHAT  SECTION -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ترافیک
                        </div>


                        <div class="demo-container">
                            <div id="placeholderRT" class="demo-placeholder"></div>
                        </div>

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            چت
                            <div class="btn-group pull-left">
                                <button type="button" data-toggle="dropdown">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="icon-refresh"></i> تازه کردن
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> در دسترس
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> مشغول
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> بیرون
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> خارج شدن
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/admin/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"> محمدرضا </strong><br />
                                            <small class="text-muted">
                                                <i class="icon-time"></i> 12 دقیقه پیش
                                            </small>
                                        </div>
                                        <p>
                                            متن تستی برای چت و ... مت تستی برای چت
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/admin/img/2.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"> علیرضا</strong><br />
                                            <small class=" text-muted">
                                                <i class="icon-time"></i> 13 دقیقه پیش</small>
                                        </div>
                                        <p>
                                            متن چت متن چت متن چت متن چت متن چت متن چت متن چت
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/admin/img/3.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"> متین </strong><br />
                                            <small class="text-muted">
                                                <i class="icon-time"></i> 12 دقیقه پیش
                                            </small>
                                        </div>
                                        <br />
                                        <p>
                                            متن چت متن چت متن چت متن چت متن چت متن چت متن چت
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/admin/img/4.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class=" primary-font"> حسین</strong><br />
                                            <small class=" text-muted">
                                                <i class="icon-time"></i> 13 دقیقه پیش</small>
                                        </div>
                                        <br />
                                        <p>
                                            متن چت متن چت متن چت متن چت متن چت متن چت متن چت
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="Text1" type="text" class="form-control input-sm" placeholder="متن خود را تایپ کنید ..." />
                                <span class="input-group-btn">
                                        <button class="btn btn-warning btn-sm" id="Button1">
                                            ارسال
                                        </button>
                                    </span>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <!--END CHAT & CHAT SECTION -->
            <!-- COMMENT AND NOTIFICATION  SECTION -->
            <div class="row">
                <div class="col-lg-7">

                    <div class="chat-panel panel panel-success">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            کامنت های جدید

                        </div>

                        <div class="panel-body">
                            <ul class="chat">
                                <li class="right clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/admin/img/1.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header clearfix">
                                            <strong class="primary-font pull-left"> محمدرضا </strong>
                                            <small class="pull-right text-muted label label-danger">
                                                <i class="icon-time"></i> 12 دقیقه پیش
                                            </small>
                                        </div>
                                        <p>
                                            تست متن کامنت ، تست متن تست متن کامنت ، تست متن تست متن کامنت ، تست متن
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/admin/img/2.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header clearfix">
                                            <strong class="pull-right primary-font"> علیرضا</strong>
                                            <small class="pull-left text-muted label label-info">
                                                <i class="icon-time"></i> 13 دقیقه پیش</small>
                                        </div>
                                        <p>
                                            تست متن کامنت ، تست متن تست متن کامنت ، تست متن تست متن کامنت ، تست متن
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="assets/admin/admin/img/3.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header clearfix">
                                            <strong class="pull-left primary-font"> محمدرضا </strong>
                                            <small class="pull-right text-muted label label-warning">
                                                <i class="icon-time"></i> 12 دقیقه قبل
                                            </small>
                                        </div>
                                        <p>
                                            تست متن کامنت ، تست متن تست متن کامنت ، تست متن تست متن کامنت ، تست متن
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="assets/admin/img/4.png" alt="User Avatar" class="img-circle" />
                                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header clearfix">
                                            <strong class="pull-right primary-font"> متین</strong>
                                            <small class="pull-left  text-muted label label-primary">
                                                <i class="icon-time"></i> 13 دقیقه قبل</small>
                                        </div>
                                        <p>
                                            تست متن کامنت ، تست متن تست متن کامنت ، تست متن تست متن کامنت ، تست متن
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="کامنت خود را بنویسید ...." />
                                <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" id="btn-chat">
                                            ارسال
                                        </button>
                                    </span>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-lg-5">

                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-bell"></i> پنل هشدار اطلاعیه ها
                        </div>

                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class=" icon-comment"></i> کامنت جدید
                                    <span class="pull-left text-muted small"><em> 4 دقیقه پیش</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="icon-twitter"></i> 3 دنبال کننده جدید
                                    <span class="pull-left text-muted small"><em> 12 دقیقه پیش</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="icon-envelope"></i> ارسال پیام
                                    <span class="pull-left text-muted small"><em> 27 دقیقه پیش</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="icon-tasks"></i> وظایف جدید
                                    <span class="pull-left text-muted small"><em>43 دقیقه پیش</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="icon-upload"></i> زمان ریبوت شدن سرور
                                    <span class="pull-left text-muted small"><em>11:32 ق.ظ</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="icon-warning-sign"></i> زمان کرش شدن سرور
                                    <span class="pull-left text-muted small"><em>11:13 ق.ظ</em>
                                    </span>
                                </a>

                                <a href="#" class="list-group-item">
                                    <i class="icon-ok"></i> قرار جدید
                                    <span class="pull-left text-muted small"><em>9:49 ق.ظ</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class=" icon-money"></i> پرداخت
                                    <span class="pull-left text-muted small"><em>دیروز</em>
                                    </span>
                                </a>
                            </div>

                            <a href="#" class="btn btn-default btn-block btn-primary">مشاهده همه اعلان ها</a>
                        </div>

                    </div>



                </div>
            </div>
            <!-- END COMMENT AND NOTIFICATION  SECTION -->




            <!--  STACKING CHART  SECTION   -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            نمودار
                        </div>

                        <div class="panel-body">

                            <div class="demo-container">
                                <div id="placeholderStack" class="demo-placeholder"></div>
                            </div>
                            <p class="stackControls">
                                <button class="btn btn-primary" >With stacking</button>
                                <button class="btn btn-primary">Without stacking</button>
                            </p>

                            <p class="graphControls">
                                <button class="btn btn-primary">Bars</button>
                                <button class="btn btn-primary">Lines</button>
                                <button class="btn btn-primary">Lines with steps</button>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
            <!--END STACKING CHART SCETION  -->

            <!--TABLE, PANEL, ACCORDION AND MODAL  -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="box">
                        <header>
                            <h5>جدول نمونه</h5>
                            <div class="toolbar">
                                <div class="btn-group">
                                    <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                        </header>
                        <div id="sortableTable" class="body collapse in">
                            <table class="table table-bordered sortableTable responsive-table">
                                <thead>
                                <tr>
                                    <th>#<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                    <th>نام<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                    <th>نام خانوادگی<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                    <th>نمره<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr>
                                    <td>1</td>
                                    <td>محمدرضا</td>
                                    <td>پورمحمد</td>
                                    <td>50</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>علیرضا</td>
                                    <td>ابراهیمی</td>
                                    <td>94</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>متین</td>
                                    <td>یوسفی</td>
                                    <td>80</td>
                                </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading ">
                            پنل  آکاردئون
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">عنوان آیتم 1</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            متن آیتم اول<br>
                                            متن دلخواه برای آیتم اول، دوم یا سوم، یا برای ایتم های مختلف متن دلخواه اینجا نوشته شود
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">عنوان آیتم 2</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            متن آیتم دوم<br>
                                            متن دلخواه برای آیتم اول، دوم یا سوم، یا برای ایتم های مختلف متن دلخواه اینجا نوشته شود
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">عنوان آیتم 3</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            متن آیتم سوم<br>
                                            متن دلخواه برای آیتم اول، دوم یا سوم، یا برای ایتم های مختلف متن دلخواه اینجا نوشته شود
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            پنل
                        </div>
                        <div class="panel-body">
                            <p>یک پنل ساده برای درج اعلان یا متن مورد نظر یک پنل ساده برای درج اعلان یا متن مورد نظر یک پنل ساده برای درج اعلان یا متن مورد نظر </p>
                        </div>
                        <div class="panel-footer">
                            فوتر پنل
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            کاربرد کلاس ها
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>نام کاربری</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="success">
                                        <td>1</td>
                                        <td>محمدرضا</td>
                                        <td>پورمحمد</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr class="info">
                                        <td>2</td>
                                        <td>علیرضا</td>
                                        <td>ابراهیمی</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>3</td>
                                        <td>متین</td>
                                        <td>یوسفی</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>4</td>
                                        <td>مهدی</td>
                                        <td>عباسپور</td>
                                        <td>@jsmith</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            نمونه مودال
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                نمایش دموی مودال
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">عنوان مودال</h4>
                                        </div>
                                        <div class="modal-body">
                                            متن تستی برای مودال در این قسمت میتوان فرم یا جدول یا نمودار یا مواردی از این قبیل قرار داد  متن تستی برای مودال در این قسمت میتوان فرم یا جدول یا نمودار یا مواردی از این قبیل قرار داد  متن تستی برای مودال در این قسمت میتوان فرم یا جدول یا نمودار یا مواردی از این قبیل قرار داد
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">ذخیره تغییرات</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->


        </div>

    </div>
    <!--END PAGE CONTENT -->

    <!-- RIGHT STRIP  SECTION -->
    <div id="left">


        <div class="well well-small">
            <ul class="list-unstyled">
                <li>بازدیدکنندگان : <span>23,000</span></li>
                <li>کاربران : <span>53,000</span></li>
                <li>ثبت نام کنندگان : <span>3,000</span></li>
            </ul>
        </div>
        <div class="well well-small">
            <button class="btn btn-block"> راهنما </button>
            <button class="btn btn-primary btn-block"> تیکت ها</button>
            <button class="btn btn-info btn-block"> تازه ها </button>
            <button class="btn btn-success btn-block"> کاربران </button>
            <button class="btn btn-danger btn-block"> سود </button>
            <button class="btn btn-warning btn-block"> فروش </button>
            <button class="btn btn-inverse btn-block"> موجودی </button>
        </div>
        <div class="well well-small">
            <span>سود</span><span class="pull-left"><small>20%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
            </div>
            <span>فروش</span><span class="pull-left"><small>40%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
            </div>
            <span>در حال انتظار</span><span class="pull-left"><small>60%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
            </div>
            <span>خلاصه</span><span class="pull-left"><small>80%</small></span>

            <div class="progress mini">
                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
            </div>
        </div>




    </div>
    <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->


@endsection