@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Disponibilité</h3>
        <form method="POST" action="{{ route('etudiants.disponibilite') }}" id="frm_new_compte_etudiant">
            @csrf
            <div class="infos">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Jour</th>
                          <th scope="col">Heure de début</th>
                          <th scope="col">Heure de fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="jour jour-1">
                            <td>Lundi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ1">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ1">
                            </td>
                        </tr>
                        <tr class="jour jour-2">
                            <td>Mardi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ2">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ2">
                            </td>
                        </tr>
                        <tr class="jour jour-3">
                            <td>Mercredi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ3">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ3">
                            </td>
                        </tr>
                        <tr class="jour jour-4">
                            <td>Jeudi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ4">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ4">
                            </td>
                        </tr>
                        <tr class="jour jour-5">
                            <td>Vendredi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ5">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ5">
                            </td>
                        </tr>
                        <tr class="jour jour-6">
                            <td>Samedi</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ6">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ6">
                            </td>
                        </tr>
                        <tr class="jour jour-7">
                            <td>Dimanche</td>
                            <td>
                                <input class="form-control" type="time" name="heureDJ7">
                            </td>
                            <td>
                                <input class="form-control" type="time" name="heureFJ7">
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br>
        </form>
    </div>
    <br><br><br>
@endsection
