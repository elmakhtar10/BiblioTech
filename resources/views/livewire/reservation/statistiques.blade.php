<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Rang</th>
            <th scope="col">Couverture</th>
            <th scope="col">Titre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Nombre de Reservations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <img src="{{ asset('storage/' . $book->image) }}"
                         alt="Photo auteur"
                         style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
                </td>
                <td>{{$book->titre}}</td>
                <td>{{$book->prenom." ".$book->nom}}</td>
               <td>{{$book->nombre_reservation}}</td>

            </tr>
        @endforeach

        </tbody>
    </table>
</div>
