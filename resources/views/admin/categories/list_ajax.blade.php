@if(!empty($categories))
    @foreach($categories as $key => $row)
        <tr>
            <td>
                {{ $key + 1 }}
            </td>
            <td>
                {{ $row->name }}
            </td>
            <td>
                <a onclick="edit_category(<?= $row->id ?>)" href="#">Edit</a> | <a onclick="delete_category(<?= $row->id ?>)" href="#">Delete</a>
            </td>
        </tr>
    @endforeach
@endif

