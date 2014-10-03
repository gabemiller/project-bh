@extend('_frontend.master')
@section('breadcrumb')
{{-- HTML::decode(Breadcrumbs::render('')) --}}
@stop
@section('content')
<div class="documents">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{Form::open(array('url' => URL::route('dokumentumok.index',array()),'class'=>'form-inline','method'=>'POST'))}}
            <div class="form-group">
                    {{Form::label('category', 'Kategória:',array())}}
                    {{Form::selection('category', $categories,array('class'=>'form-control'),$catId)}}
            </div>
            {{Form::submit('Szűrés',array('class'=>'btn btn-default'))}}
            {{Form::close()}}
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-middle">
            <thead>
                <tr>
                    <th colspan="2">
                        Letölthető dokumentumok
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
                        {{HTML::decode(HTML::link($doc->path,'Letöltés',array('class'=>'btn btn-small btn-tardona-yellow','target'=>'_blank')))}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop