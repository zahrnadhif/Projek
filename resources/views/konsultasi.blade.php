@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pertanyaan</th>
                                    <th>Jawab</th>
                                    <th>Jawab</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Apakah terdapat goresan pada part ?</td>
                                    <form action="">
                                        @csrf
                                        <td>
                                            <input type="radio" id="html" name="fav_language" value="HTML">
                                            <label for="html">Ya</label><br>
                                        </td>
                                        <td>
                                            <input type="radio" id="html" name="fav_language" value="HTML">
                                            <label for="html">Tidak</label><br>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection