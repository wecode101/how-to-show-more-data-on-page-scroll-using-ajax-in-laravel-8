@foreach($posts as $post)
    <div class=" col-6 mx-auto mt-3" >
        <div class="card">
            <div class="card-header">
                Student
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td>{{$post->name}}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>:</td>
                        <td>{{$post->id_badge}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endforeach
