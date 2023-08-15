<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add student data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        add student
    </button>

    {{-- show table  --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">desc</th>
                <th scope="col">img</th>
            </tr>
        </thead>
        <tbody id="list-todo">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>

        </tbody>
    </table>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" name="name" placeholder="enter your name">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" class="form-control" name="desc"
                                placeholder="enter the description">
                        </div>
                        <div class="form-group">
                            <label>category</label>
                            <input type="text" class="form-control" name="cat" placeholder="enter the category">
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <input type="text" class="form-control" name="img" placeholder="enter your img type">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save student data</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#addForm').on('submit', function(e) {
                e.preventDefault();

                console.log($('#addForm').serialize())
                $.ajax({
                    type: 'POST',
                    url: "{{ route('store') }}",
                    data: $('#addForm').serialize(),
                    success: function(response) {
                        console.log(response)
                        $('#exampleModal').modal('hide')
                        alert('data saved');
                    },
                    error: function(error) {
                        console.log(error)
                        alert('data not saved');


                    }
                });


            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>
