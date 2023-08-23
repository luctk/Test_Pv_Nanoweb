@if($paginator->hasPages())
    <ul class="pagination">
        @if($paginator->onFirstPage())
            <li class="disabled"><span>&lt;&lt;</span></li>
        @else
            <li><a href="{{$paginator->url($paginator->currentPage()-3)}}" rel="prev">&lt;&lt;</a></li>
        @endif
        @foreach(range(1,$paginator->lastPage()) as $i)
            @if($i>=$paginator->currentPage()-1 && $i<=$paginator->currentPage()+1 )
                @if($i==$paginator->currentPage())
                    <li class="active"><span>{{$i}}</span></li>
                @else
                    <li><a href="{{$paginator->url($i)}}">{{$i}}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->hasMorePages())
            <li><a href="{{$paginator->url($paginator->currentPage()+3)}}" rel="prev">&gt;&gt;</a></li>
        @else
            <li class="disabled"><span>&gt;&gt;</span></li>
        @endif

    </ul>
@endif
