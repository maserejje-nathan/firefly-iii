<table class="table table-striped" id="sortable">
    <tbody>
@foreach($piggyBanks as $piggyBank)
    <tr data-id="{{$piggyBank->id}}">
        <td style="width:60px;">
            <i class="fa fa-fw fa-bars handle"></i>
            <i class="loadSpin"></i>
        </td>
        <td style="width:100px;">
            <div class="btn-group btn-group-xs">
                <a href="{{route('piggy-banks.edit',$piggyBank->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil fa-fw"></i></a>
                <a href="{{route('piggy-banks.delete',$piggyBank->id)}}" class="btn btn-default btn-xs"><i class="fa fa-trash fa-fw"></i></a>
            </div>
        </td>
        <td>
            <a href="{{route('piggy-banks.show',$piggyBank->id)}}" title="{{{$piggyBank->order}}}">{{{$piggyBank->name}}}</a>
        </td>
        <td>
            <span title="Saved so far">{!! Amount::format($piggyBank->savedSoFar,true) !!}</span>
        </td>
        <td style="text-align:right;width:40px;">
            @if($piggyBank->savedSoFar > 0)
                <a href="{{route('piggy-banks.removeMoney',$piggyBank->id)}}" class="btn btn-default btn-xs removeMoney" data-id="{{{$piggyBank->id}}}"><span data-id="{{{$piggyBank->id}}}" class="glyphicon glyphicon-minus"></span></a>
            @endif
        </td>

        <td>
            <div class="progress progress-striped" style="margin-bottom:0;">
                <div
                @if($piggyBank->percentage == 100)
                    class="progress-bar progress-bar-success"
                    @else
                    class="progress-bar progress-bar-info"
                    @endif
                    role="progressbar" aria-valuenow="{{$piggyBank->percentage}}" aria-valuemin="0" aria-valuemax="100" style="min-width: 40px;width: {{$piggyBank->percentage}}%;">
                    {{$piggyBank->percentage}}%
                </div>
            </div>
        </td>


        <td style="width:40px;">
            @if($piggyBank->leftToSave > 0)
                <a href="{{route('piggy-banks.addMoney',$piggyBank->id)}}" class="btn btn-default btn-xs addMoney" data-id="{{{$piggyBank->id}}}"><span data-id="{{{$piggyBank->id}}}" class="glyphicon glyphicon-plus"></span></a>
            @endif
        </td>
        <td style="width:200px;">
            <span title="Target amount">{!! Amount::format($piggyBank->targetamount,true) !!}</span>
            @if($piggyBank->leftToSave > 0)
                <span title="Left to save">({!! Amount::format($piggyBank->leftToSave) !!})</span>
            @endif
        </td>
    </tr>
@endforeach
    </tbody>
</table>