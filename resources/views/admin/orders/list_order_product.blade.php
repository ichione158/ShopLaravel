<style>
    .media-object{
        width: 100px;
        height: 100px;
        margin-right:5px;
    }

    .product{
        float: left;
    }
</style>

<table>
    @if(!$orders->isEmpty())
        @foreach($orders as $row)
            <tr>
                <td>
                    <a class="product" href="{{ route('product.detail', $row->product_slug) }}">
                        <img class="media-object" src="{{ URL::asset($row->path.$row->image) }}" alt="#">  <p>{{ $row->product_name }}</p>
                    </a>
                </td>
                <td>
                    SL: {{ $row->quantity }} áo
                </td>
            </tr>
        @endforeach
    @endif
</table>