<x-app-layout>

     <div class="TableBd" style="padding-top: 8rem;min-width: 731px">
            <div class="card">
                <div class="card-header border-bottom" style="background-color: white;margin-bottom: 1rem;">
                    <div class=" d-flex justify-content-between">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" >All dishs</h5>
                        </div>
                        <div class="justify-content-end">
                            <button class="btn  add-btn rounded-pill btn-success px-lg-3" data-bs-toggle="modal" data-bs-target="#modal"><i class="uil-plus mr-2"></i>Add dishs</button>
                        </div>
                    </div>
                </div>
                <table id="dish-table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>name</th>
                        <th>description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @forelse ($dishes as $dish)
                            <tr>
                                    <td>{{++$i}}</td>
                                    <td><img id="image-dish" src="{{ asset('image/'.$dish['image']) }}" width="100px"></td>
                                    <td>{{$dish['name']}}</td>
                                    <td>{{$dish['description']}}</td>
                                    <td>{{$dish['created_at']}}</td>
                                    <td style="display: flex">
                                        <a class="edit-btn btn btn-sm btn-success" href="{{ route('dishes.edit', [ 'dish' => $dish['id']])}}"><i class="uil uil-edit"></i></a>
                                        <form method="POST" action="{{ route('dishes.destroy',['dish' => $dish['id']])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" style="background-color: rgb(191, 41, 41)" name="adddish"><i class="uil uil-trash-alt"></i></button>
                                        </form>
                                    </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 id="modal-title">Add dish</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="validation-input-dish">
                        <div>
                            <i class="bx bx-error-circle"></i>
                        </div>
                        <div class="message-content">
                            <h4>vous pouvez pas ajouter a dish</h4>
                            <p>Veuillez remplir les champs ci-dessous.</p>
                        </div>
                    </div>
                    <div id="modal-body-dish" class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name dish</label>
                            <input type="text" value="" class="form-control" name="name" id="modal-dish-title"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description dish</label>
                            <input type="text" value="" class="form-control" name="description" id="modal-dish-content"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image dish</label>
                            <input type="file" value="" class="form-control" id="pictureInput" name="image"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button  type="submit" name="savedish" class="btn btn-primary task-action-btn" style="background-color: #0E4BF1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
