<div>
    <input type="text" wire:model="name">
    <button wire:click="save()">Save</button>

    <div class="flex mt-5">
        <input type="text" wire:model="update_name">
        <button wire:click="update()">Update</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td><button wire:click="select_category('{{$category->id}}','{{$category->name}}')">Update</button></td>
                <td><button wire:click="delete_category({{$category}})">Delete</button></td>
            </tr>
            @foreach ($category->items->all() as $item)
                <tr>
                    <td>{{$item->name}} Category = {{$item->category->name}}</td>
                    <td>{{$item->price}}</td>
                </tr>
            @endforeach
            @empty
                <td>No record found</td>
            @endforelse
        </tbody>
    </table>
</div>
