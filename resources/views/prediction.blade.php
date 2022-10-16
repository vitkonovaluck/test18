    @extends('layouts.app')

    @section('content')

        <main class="px-3">
            <div class="container">
                <div class="row">
                    <div class="col"><h2>Загрузка предсказаний</h2></div>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="{{route('load')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col"><input type="file" id="files" class="files" name="files"></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="submit" value="Загрузить"></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </main>

    @endsection
