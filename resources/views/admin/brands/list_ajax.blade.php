@foreach($brands as $key => $row)
    <tr>
        <td>
            {{ $key + 1 }}
        </td>
        <td>
            {{ $row->name }}
        </td>
        <td>
            <a onclick="edit_brand(<?= $row->id ?>)" href="#">Edit</a> | <a href="">Delete</a>
        </td>
    </tr>
@endforeach

