<!-- BREADCRUMB-->
<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">You are here:</span>
                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                            <li class="list-inline-item ">
                                <a href="{{$parentMenu ? route($route) : '#'}}"> {{  ucwords($parentMenu) }}</a>
                            </li>
                            @if (Request::segment(2))
                            <li class="list-inline-item seprate">
                                <span>/</span>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route($routeList) }}">
                                    {{ ucwords(str_replace('-',' ',Request::segment(2))) }}
                                </a>
                            </li>
                            @endif
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
