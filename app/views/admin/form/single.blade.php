<tr>
    <td class="text-center">{{Form::input('checkbox','delete',$document->id,array('data-url'=> URL::route('admin.nyomtatvany.destroy',array('id'=>$document->id))))}}</td>
    <td>{{$document->id}}</td>
    <td>{{$document->name}}</td>
    <td>{{explode('/', $document->path)[2]}}</td>
    <td>{{str_replace('-','.',$document->created_at)}}</td>
    <td class="text-center">{{HTML::decode(HTML::linkRoute('admin.nyomtatvany.edit','<i class="fa fa-edit"></i> Módosítás',array('id'=>$document->id),array('class'=>'btn btn-sm btn-default')))}}</td>
</tr>