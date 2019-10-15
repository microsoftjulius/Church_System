<!DOCTYPE html>
<html lang="en">
    @include('layouts.styling')
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <!-- sidebar menu -->
                        @include('layouts.sidebar')
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                @include('layouts.topnav')
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <!--Setupform-->
                    @foreach ($category as $cats)
                    <form class="col-md-offset-3 col-sm-6" style="border-width: 4px 4px 4px 4px; padding :1em; background-color:white;" action="/edit-category-term/{{ $cats->id }}" method="POST">
                        @csrf
                        @include('layouts.message')
                    <div class="panel-heading text-center"><h4>Edit message category</h4>
                    <hr>
                    </div>
                            <div class="form-group row md-form">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Category name</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="new_category_title" id="materialFormCardNameEx" placeholder="search term" value="{{ $cats->title }}" required>
                                </div>
                            </div>
                            {{-- <div class="form-group row md-form">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Choose</label>
                            <div class="col-sm-8">
                                <div class="btn-group">
                                    <a href="#"  class=" dropdown-toggle btn-block" data-toggle="dropdown">
                                    Select search term category &nbsp;<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="padding: 5px;" id="myDiv">
                                        <li><input type="checkbox" id="select_all"/> All categories</li>
                                        <li><input type="checkbox" id="select_all"/> Prayer request</li>
                                        <li><input type="checkbox" id="select_all"/> bible study</li>
                                        <li><input type="checkbox" id="select_all"/> Baptism</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row md-form">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" name="">search term list</label>
                                <div class="col-sm-8">
                                <a href="/search-term-list"><button type="button" class="btn btn-info btn-block" name="search_terms_list"><i class="fa fa-table"></i> list of search terms</button></a>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <div class="text-center py-4 mt-3 ">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</i></button></a>
                                </div>
                            </div>

                    <div class="row">
                    </div>
                </div>
            </form>
            @endforeach
                <!-- /page content -->
                <!-- footer content -->
                @include('layouts.footer')
                <!-- /footer content -->
            </div>
        </div>
        @include('layouts.javascript')
    </body>
</html>
