<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>
    <div class="add-category" >
        <form action="{{ route('updatecategory',$category->category_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="category_nm">
                <input type="text" name="category_name" placeholder="Enter Category" value="{{ $category->category_name }}" required/>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>