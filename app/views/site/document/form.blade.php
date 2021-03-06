@extend('_frontend.master')
@section('breadcrumb')
{{-- HTML::decode(Breadcrumbs::render('')) --}}
@stop
@section('content')
<div class="documents">

    <h2>Letölthető dokumentumok</h2>
    <div class="table-responsive">
        <table class="table table-striped table-middle">
            <thead>
                <tr>
                    <th>
                        Cím
                    </th>
                    <th class="table-col-xs">
                        Művelet
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $doc)
                <tr>
                    <td>
                        <h4>{{$doc->name}}</h4>
                        <p>{{$doc->description}}</p>
                    </td>
                    <td>
                        {{HTML::decode(HTML::linkRoute('nyomtatvanyok.download','Letöltés',array(explode('/',$doc->path)[2]),array('class'=>'btn btn-small btn-tardona-yellow','target'=>'_blank')))}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center">
        {{$documents->links();}}
    </div>
</div>
@stop