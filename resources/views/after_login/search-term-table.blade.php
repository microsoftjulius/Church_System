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
                    <!--table -->
                    <div class="row">
                        <div class="col-lg-12">
                    @include('layouts.message')
                            <section class="box col-lg-12 col-sm-12 col-md-12 mt-3">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">No.</th>
                                            <th class="th-sm">Search Term</th>
                                            <th class="th-sm">Created by</th>
                                            <th class="th-sm">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                            @foreach ($contacts as $i => $contact)
                                            @if($contacts->currentPage()>1)
                                            @php($page_number = $contacts->currentPage()-1 . $i+1)
                                            @else
                                            @php($page_number = $i+1)
                                            @endif
                                            <tr>
                                                <form action="/delete-search-term/{{ $search_term->category_id }}" method="POST">
                                                    @csrf
                                                    <td hidden><input type="hidden" name="index_to_delete" id="" value="{{ $i }}"></td>
                                                <td>{{$page_number}}</td>
                                                <td>{{ $contact->search_term }}</td>
                                                <td>{{ $search_term->email }}</td>
                                                <td><button class="btn btn-danger" type="submit">Delete</button></td>
                                                </form>
                                            </tr>
                                            @endforeach
                                            <form action="/save-search-term/{{ $search_term->category_id }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td></td>
                                                    <td><input type="text" name="search_term" value="" class="form-control"required></td>
                                                    <td><input type="text" name="created_by" value="{{ auth()->user()->email }}" class="form-control" disabled></td>
                                                    <td><button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button></td>
                                                </tr>
                                                <button class="btn btn-primary pull-right" type="submit">Save</button>
                                            <a href="/add-search-term/{{$search_term->category_id}}"><button type="button" class="btn btn-primary pull-right"><i class="" aria-hidden="true"></i> Back</i></button></a>
                                                @include('layouts.breadcrumbs')
                                                <span class="text-primary">After inputing a search term, press enter to save it</span>
                                            </form>
                                        </tbody>
                                </table>
                                @if(isset($search_query))
                            {{ $contacts->appends(['group_name' => $search_query])->links() }}
                            @else
                            {{ $contacts->links() }}
                            @endif
                            </section>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                @include('layouts.footer')
                <!-- /footer content -->
            </div>
        </div>
        @include('layouts.javascript')
    </body>
</html>
