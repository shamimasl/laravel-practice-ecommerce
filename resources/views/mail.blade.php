Name: {{ $addCat['category_name'] }} <br>
Added By: {{ App\Models\User::find($addCat['added_by'])->name }}
