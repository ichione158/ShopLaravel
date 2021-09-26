<style>
    .media-object{
        width: 50px;
        height: 50px;
        margin-right:5px;
    }
</style>

<table>
    @if(!$orders->isEmpty())
        @foreach($orders as $row)
            <tr>
                <td>
                    <a href="{{ route('product.detail', $row->product_slug) }}">
                        <img class="media-object" src="{{ URL::asset($row->path.$row->image) }}" alt="#">  {{ $row->product_name }}
                    </a>
                </td>
                <td class="col-sm-2 col-md-2">
                    SL: {{ $row->quantity }}
                </td>
                <td class="col-sm-2 col-md-2">
                    {{ number_format($row->product_price) }} VNĐ
                </td>
            </tr>
        @endforeach
    @endif
</table>