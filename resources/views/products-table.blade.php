@php
if(gettype($data) == "object" || is_array($data))
{
foreach ($data as $k => $v) {
product($v);
}
}
else
product($data);

function product($p){
empty($p->label) ? $p->label = [] : false;
empty($p->img) ? $p->img = [] : false;
@endphp
<tr class="text-center">
    <td><b>{{ !empty($p->short)?$p->short : $p->id }}</b></td>
    <td><a target="_blank" class="font-bold text-secondary" href="{{ url('products/'.$p->id) }}">{{ $p->name }}</a></td>
    <td>{{ $p->brand }}</td>
    <td>
        @php
        foreach ($p->img as $k => $v) {
        echo '<img width="100px" src="'.$v.'" alt="Gambar Product">';
        }
        @endphp
    </td>
    <td>
        <button class="edit-product btn my-1 mx-1 btn-sm btn-warning" data-id="{{ $p->id }}">
            Edit <i class="fas fa-pencil-alt mr-1"></i></button>
        <button class="delete-product btn my-1 mx-1 btn-sm btn-danger" data-id="{{ $p->id }}">
            Hapus <i class="fas fa-trash mr-1"></i></button>
    </td>
</tr>
@php
}
@endphp
