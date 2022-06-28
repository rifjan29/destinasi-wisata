<!-- BREADCRUMB-->
<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">You are here:</span>
                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                            <li class="list-inline-item active">
                                <a @if(Request::segment(1) != 'backoffice') onclick="window.history.back()" @endif >
                                    @if(Request::segment(1)!='backoffice') <span class="fa fa-arrow-left btn-rgb-primary fa-sm p-2 "></span> @endif </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                {{ ucwords(str_replace('-',' ',Request::segment(1))) }}
                            </li>
                            <li class="list-inline-item seprate">
                                <span>/</span>
                            </li>
                            <li class="list-inline-item"> {{$pageTitle}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
